<?php 
// Variables clés qui compose ensuite l'objet PDO utilisé pour se connecter à la base de donnée
// Vous pouvez ici changer les paramètres de mot de passe ou le nom de la base de donnée si importation de celle-ci sous un autre nom. 
$dbname = getenv('DB_DATABASE') ?? "db";
$username = getenv('DB_USERNAME') ?? "root";
$password = getenv('DB_PASSWORD') ?? "root";
$host = getenv('DB_HOST')?? "localhost";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
     


 


