<?php
class PathMaker {

    private string $basePath;
    private string $rootDirectory;
    private array $fileTypes = [];
    private array $intermediateDirectories = [];

    public function __construct(string $basePath = null) {
        if (!$basePath) {
            $basePath = realpath(__DIR__ . '/../');
        }

        $this->basePath = $basePath;
        $this->rootDirectory = $basePath;


        // Ajouter le répertoire racine et ses parents à la liste des types de fichiers
        $currentDirectory = $basePath;
        while (true) {
            $this->addFileType('php', str_replace($this->rootDirectory . '/', '', $currentDirectory));
            $parentDirectory = dirname($currentDirectory);
            if ($parentDirectory == $currentDirectory) {
                break;
            }
            $currentDirectory = $parentDirectory;
        }
    }


    public function addFileType(string $fileType, string $directoryName) {
        $this->fileTypes[$fileType] = $directoryName;
    }

    public function addDirPath(string $directoryPath, string $directoryCategory) {
        $this->intermediateDirectories[$directoryCategory] = $directoryPath;
    }

    public function getFilePath(string $fileName, ?string $fileCategory = "", ?string $fileType = null, ?string $baseDirectory = null) : string {
        if (!$baseDirectory) {
            $baseDirectory = $this->basePath;
        }
        $array_parent_path = [];
        $array_categories = [];
        foreach($this->intermediateDirectories as $key => $value) {
            $array_categories[] = $key;
            $array_parent_path[] = $value;
        }
        if(!in_array($fileCategory, $array_categories) ) {
            $errorMsg = sprintf("Category de fichier non-reconnu : %s. Voici les catégories: %s. Les chemins possibles: %s.\n", $fileCategory, implode(',', array_map('htmlspecialchars', $array_categories)), implode('  ', array_map('htmlspecialchars', $array_parent_path)));
            error_log($errorMsg, 3, __DIR__.'/error.log');
            throw new Exception('Nous ne trouvons pas la catégorie '. $fileCategory . '. Plus d\'explications dans les logs.');
        }

        foreach($this->intermediateDirectories as $key => $value) {

            if($key == $fileCategory) {
                $baseDirectory .= DIRECTORY_SEPARATOR . $value;
            } else  {
                $baseDirectory .= "";
            }
        }

        if (!$fileType) {
            $filePath = $baseDirectory . DIRECTORY_SEPARATOR . $fileName;
        } else {
            if (!isset($this->fileTypes[$fileType])) {
                throw new Exception('Type de fichier non-reconnu : ' . $fileType);
            }
            $filePath = $baseDirectory . DIRECTORY_SEPARATOR . $this->fileTypes[$fileType] . DIRECTORY_SEPARATOR . $fileName;
        }

        $realPath = realpath($filePath);

        if (!$realPath) {
            throw new Exception('Fichier non-trouvé: ' . $filePath);
        }

        $rootDirectory = realpath($this->rootDirectory);
        $realPath = str_replace($rootDirectory, $this->rootDirectory, $realPath);

        return $realPath;
    }

}


