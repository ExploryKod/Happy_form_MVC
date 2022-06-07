<?php

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        
        require_once "db_connexion.php";

        if($_POST["client-id"] == "") {

        $last_name = filter_input(INPUT_POST, "last_name");
        $first_name = filter_input(INPUT_POST, "first_name");
        $address = filter_input(INPUT_POST, "address");
        $tel = filter_input(INPUT_POST, "tel");
        $meeting = filter_input(INPUT_POST,"meeting");
        
        $request = $pdo->prepare("INSERT INTO `clients` (`last_name`, `first_name`, `address`, `telephone`, `meeting_date`) 
                VALUES (:last_name, :first_name , :address, :tel, :meeting)");

        $request->execute([
            ":last_name" => $last_name,
            ":first_name" => $first_name,
            ":address" => $address,
            ":tel" => $tel,
            ":meeting" => $meeting
        ]);
        
        exit;
    
        } else {

            $id = filter_input(INPUT_POST, "client-id");
            $last_name = filter_input(INPUT_POST, "last_name");
            $first_name = filter_input(INPUT_POST, "first_name");
            $address = filter_input(INPUT_POST, "address");
            $tel = filter_input(INPUT_POST, "tel");
            $meeting = filter_input(INPUT_POST,"meeting");

            $query = $pdo->prepare(
                "UPDATE clients 
                SET `last_name`= :last_name, first_name = :first_name, `address` = :address, `telephone` = :tel, `meeting_date` = :meeting
                WHERE id=:id");
            $query->execute([
                ":last_name" => $last_name,
                ":first_name" => $first_name,
                ":address" => $address,
                ":tel" => $tel,
                ":meeting" => $meeting,
                ":id" => $id
            ]);

        exit;
        };
    };