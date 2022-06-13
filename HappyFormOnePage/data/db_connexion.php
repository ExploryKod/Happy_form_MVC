<?php 
// Variables clés qui compose ensuite l'objet PDO utilisé pour se connecter à la base de donnée
// Vous pouvez ici changer les paramètres de mot de passe ou le nom de la base de donnée si importation de celle-ci sous un autre nom. 
$dbname = "db_clients_homeclik_exercice";
$username = "root";
$password = "root";
$pdo = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
        
     


 


