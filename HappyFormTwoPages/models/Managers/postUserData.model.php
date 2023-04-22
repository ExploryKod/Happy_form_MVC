<?php
require_once __DIR__ . '/../Factory/dbConnexion.model.php';
require_once __DIR__ . '/../Entities/Users.php';
require_once __DIR__ . '/getUserData.model.php';

class PostUserData extends DbConnexion
{
    private getUserData $getUserDatas;

    public function insert(Users $user): Users
    {
        $this->getUserDatas = new getUserData();
        $user->setPassword($user->getPassword(), true);
        $newUser = "INSERT INTO `users` (`username`, `password`, `token`)
                    VALUES(:userName, :password, :token)";

        $query = $this->getBdd()->prepare($newUser);
        $query->bindValue(':userName', $user->getUserName());
        $query->bindValue(':password', $user->getPassword());
        $query->bindValue(':token', $user->getToken());
        $query->execute();

        return $this->getUserDatas->getUserById($this->getBdd()->lastInsertId());
    }

    public function update(Users $user, $hashPassword = false): bool
    {
        $user->setPassword($user->getPassword(), $hashPassword);
        $updateUser = 'UPDATE `users`
                       SET `username` = :username, `password` = :password, `token` = :token
                       WHERE `id_user` = :id_user';

        $query = $this->getBdd()->prepare($updateUser);
        $query->bindValue(':username', $user->getUsername());
        $query->bindValue(':password', $user->getPassword());
        $query->bindValue(':token', $user->getToken());
        $query->bindValue(':id_user', $user->getIdUser());

        return $query->execute();
    }
}