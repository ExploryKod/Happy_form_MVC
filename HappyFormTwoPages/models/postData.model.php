<?php
require_once("dbConnexion.model.php");

class PostData extends DbConnexion
{

    public function CreateClient()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST['register'])) {

                // Nous récupérons les entrées utilisateur via la méthode POST.  
                $last_name = filter_input(INPUT_POST, "last_name");
                $first_name = filter_input(INPUT_POST, "first_name");
                $address = filter_input(INPUT_POST, "address");
                $tel = filter_input(INPUT_POST, "tel");
                $meeting = filter_input(INPUT_POST, "meeting");

                // Nous vérifions qu'aucune entrée n'est vide
                if (!empty($last_name) && !empty($first_name) && !empty($address) && !empty($tel) && !empty($meeting)) {

                    // Pour chaque entrée utilisateur : retirer les balises HTML/PHP et encoder les charactères.
                    $first_name = strip_tags($first_name);
                    $first_name = htmlentities($first_name);

                    $last_name = strip_tags($last_name);
                    $last_name = htmlentities($last_name);

                    $address = strip_tags($address);
                    $address = htmlentities($address);

                    $tel = strip_tags($tel);
                    $tel = htmlentities($tel);

                    $meeting = strip_tags($meeting);
                    $meeting = htmlentities($meeting);

                    $RegisterClientReq = $this->getBdd()->prepare("INSERT INTO `clients` (`last_name`, `first_name`, `address`, telephone, meeting_date) 
                                                    VALUES (:last_name, :first_name , :address, :tel, :meeting)");

                    $RegisterClientReq->execute([
                        ":last_name" => $last_name,
                        ":first_name" => $first_name,
                        ":address" => $address,
                        ":tel" => $tel,
                        ":meeting" => $meeting
                    ]);

                    http_response_code(302);
                    header('Location: accueil');
                    exit();
                }
            }
        }
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

    public function modifyClientData()
    {

        if (isset($_POST['modify'])) {

            $id = filter_input(INPUT_POST, "client-id");
            $last_name = filter_input(INPUT_POST, "last_name");
            $first_name = filter_input(INPUT_POST, "first_name");
            $address = filter_input(INPUT_POST, "address");
            $tel = filter_input(INPUT_POST, "tel");
            $meeting = filter_input(INPUT_POST, "meeting");



            $query =  $this->getBdd()->prepare(
                "UPDATE clients 
                SET `last_name`= :last_name, first_name = :first_name, `address` = :address, `telephone` = :tel, `meeting_date` = :meeting
                WHERE id=:id"
            );

            $query->execute([
                ":last_name" => $last_name,
                ":first_name" => $first_name,
                ":address" => $address,
                ":tel" => $tel,
                ":meeting" => $meeting,
                ":id" => $id
            ]);

            http_response_code(302);
            header('Location: accueil');
            exit();
        };
    }
}
