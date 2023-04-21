<?php
require_once __DIR__ . '/../Factory/dbConnexion.model.php';
require_once __DIR__ . '/../Entities/Customers.php';

class PostData extends DbConnexion
{

    public function CreateClient(array $client_datas = ["" => ""])
    {
        $datas = new Customers($client_datas);
        $RegisterClientReq = $this->getBdd()->prepare("INSERT INTO `clients` (`last_name`, `first_name`, `address`, telephone, meeting_date) 
                                        VALUES (:last_name, :first_name , :address, :tel, :meeting)");

        $RegisterClientReq->execute([
            ":last_name" => $datas->getLastName(),
            ":first_name" => $datas->getFirstName(),
            ":address" => $datas->getAddress(),
            ":tel" => $datas->getTel(),
            ":meeting" => $datas->getMeeting()
        ]);

        http_response_code(302);
        header('Location: accueil');
        exit();
    }

    public function deleteClientData($client_datas)
    {
        if (isset($_POST["delete"])) {
            $data = new Customers($client_datas);
            $reqDropClient = $this->getBdd()->prepare("DELETE FROM clients WHERE id = :id");

            $reqDropClient->execute([
                ":id" => $data->getIdClient()
            ]);

            http_response_code(302);
            header('Location: accueil');
            exit();
        }
    }

    public function modifyClientData($client_datas)
    {
        if (isset($_POST['modify'])) {
            $datas = new Customers($client_datas);

            $query =  $this->getBdd()->prepare(
                "UPDATE clients 
                SET `last_name`= :last_name, first_name = :first_name, `address` = :address, `telephone` = :tel, `meeting_date` = :meeting
                WHERE id=:id"
            );

            $query->execute([
                ":last_name" => $datas->getLastName(),
                ":first_name" => $datas->getFirstName(),
                ":address" => $datas->getAddress(),
                ":tel" => $datas->getTel(),
                ":meeting" => $datas->getMeeting(),
                ":id" => $datas->getIdClient()
            ]);

            http_response_code(302);
            header('Location: accueil');
            exit();
        };
    }
}


