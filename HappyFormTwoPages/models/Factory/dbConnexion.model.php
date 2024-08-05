<?php
/**
 * Cette class abstraite n'est accessible que si étendue par les class des modèles: elle sert à se connecter à la base de donnée.
 * Il est possible que selon votre système vous deviez changer le mot de passe "root" par un autre ou rien.
 */
abstract class DbConnexion
{
    private static PDO $pdo;
    private static string $host;
    private static string $dbName;
    private static string $userName;
    private static string $password;

    private static function setBdd()
    {
        self::$pdo = new PDO("mysql:host=" . self::$host=getenv('DB_HOST') . ";dbname=" . self::$dbName=getenv('DB_DATABASE'), self::$userName=getenv('DB_USERNAME'), self::$password=getenv('DB_PASSWORD'));
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}
