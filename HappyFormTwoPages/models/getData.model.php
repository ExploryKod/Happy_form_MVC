<?php 
require_once("dbConnexion.model.php");

class getData extends DbConnexion
{

    public function getDatas()
    {
        $req = $this->getBdd()->prepare("SELECT id, `last_name`, `first_name`, `address`, `telephone`, DATE_FORMAT(meeting_date, '%d / %m / %Y') as meeting, DATE_FORMAT(created, '%d/%m/%Y') as createdDate FROM clients");
        $req->execute();
        $clients = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $clients;
    }

    public function getClientData()
    {
        $id_client = 0;
        if(isset($_GET["id"]))    {
            $id_client = $_GET["id"];
        }
        $reqDisplayClient = $this->getBdd()->prepare("SELECT id, `last_name`, `first_name`, `address`, `telephone`, 
                                        DATE_FORMAT(meeting_date, '%Y-%m-%d') as meeting, DATE_FORMAT(created, '%d/%m/%Y') as createdDate 
                                        FROM clients 
                                        WHERE id =:id");
        $reqDisplayClient->execute([
            ":id" => $id_client
        ]);

        $client = $reqDisplayClient->fetchAll(PDO::FETCH_ASSOC);
        $reqDisplayClient->closeCursor();
        return $client;
    }
}