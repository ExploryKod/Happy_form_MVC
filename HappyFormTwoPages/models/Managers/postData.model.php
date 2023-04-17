<?php
require_once("../Factory/dbConnexion.model.php");
require_once("../Entities/Customers.php");

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

    public function deleteClientData()
    {

        if (isset($_POST["delete"])) {
            $id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

            $id_client = $_GET["id"];
            $reqDropClient = $this->getBdd()->prepare("DELETE FROM clients WHERE id = :id");

            $reqDropClient->execute([
                ":id" => $id_client
            ]);

            http_response_code(302);
            header('Location: accueil');
            exit();
        }
    }

    public function modifyClientData($client_datas)
    {
        $client_datas = [...$_POST];
        if (isset($_POST['modify'])) {
            $datas = new Customers($client_datas);

//            $id = filter_input(INPUT_POST, "client-id");
//            $last_name = filter_input(INPUT_POST, "last_name");
//            $first_name = filter_input(INPUT_POST, "first_name");
//            $address = filter_input(INPUT_POST, "address");
//            $tel = filter_input(INPUT_POST, "tel");
//            $meeting = filter_input(INPUT_POST, "meeting");

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
                ":meeting" => $datas->getMeeting()
            ]);

            http_response_code(302);
            header('Location: accueil');
            exit();
        };
    }
}
