<?php 
require_once "db_connexion.php";

$reqDisplayClients = $pdo->prepare("SELECT id, `last_name`, `first_name`, `address`, `telephone`, DATE_FORMAT(meeting_date, '%d/%m/%Y') as meeting, DATE_FORMAT(created, '%d/%m/%Y') as createdDate FROM clients");
$reqDisplayClients->execute();

$clients = $reqDisplayClients->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "clients" => $clients
]);

exit();



