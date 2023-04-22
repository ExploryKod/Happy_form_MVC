<?php
require_once __DIR__ . '/../Factory/dbConnexion.model.php';
require_once __DIR__ . '/../Entities/Users.php';

class getUserData extends DbConnexion
{
    /**
     * @return Users[]
     */
    public function getAllUsers(): array
    {
        $query = $this->getBdd()->query("SELECT * FROM users");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new Users($data);
        }

        return $users;
    }

    public function getUserById($id_user): ?Users
    {
        $query = $this->getBdd()->prepare(
            "SELECT *
            FROM `users`
            WHERE `id_user` = :id_user"
        );
        $query->bindValue(':id_user', $id_user);
        $query->execute();
        $user = $query->fetch(\PDO::FETCH_ASSOC);
        if ($user) {
            return new Users($user);
        }
        return null;
    }

    public function getUserByToken($token): ?Users
    {
        $query =
            'SELECT *
        FROM `users`
        WHERE `token` = :token';

        $db = $this->getBdd()->prepare($query);
        $db->bindValue(':token', $token);
        $db->execute();

        $user = $db->fetch(\PDO::FETCH_ASSOC);
        if ($user) {
            return new Users($user);
        }
        return null;
    }

    public function getUserByName($username): ?Users
    {
        $query =
            'SELECT *
        FROM `users`
        WHERE `username` = :username';

        $db = $this->getBdd()->prepare($query);
        $db->bindValue(':username', $username);
        $db->execute();

        $user = $db->fetch(\PDO::FETCH_ASSOC);
        if ($user) {
            return new Users($user);
        }
        return null;
    }
}