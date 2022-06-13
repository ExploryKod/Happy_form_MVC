<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  
    <?php if(!empty($page_css)) : ?>
        <?php foreach($page_css as $fichier_css) : ?>
            <link href="public/CSS/<?= $fichier_css ?>" rel="stylesheet" />
        <?php endforeach; ?>
    <?php endif; ?>
    <meta name="description" content="<?= $page_description; ?>">
    <title><?= $page_title; ?></title>
   
</head>
<body>
    
<?= $page_content; ?>

<?php if(!empty($page_javascript)) : ?>
        <?php foreach($page_javascript as $fichier_javascript) : ?>
            <script src="public/JavaScript/<?= $fichier_javascript ?>?<?php echo time(); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>