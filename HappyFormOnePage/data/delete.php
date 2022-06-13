
<?php
    // Efface un client de la base de donnée selon son id.
    
    $id = filter_input(INPUT_POST, "client-id");
    
    require_once("db_connexion.php");
   
    $dropClientReq = $pdo->prepare("DELETE FROM clients WHERE id = :id");

    $dropClientReq->execute([ ":id" => $id ]);
   
    exit(); 
