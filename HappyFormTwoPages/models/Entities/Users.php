<?php
require_once __DIR__ . '/InitEntity.php';

class Users extends InitEntity
{

    public ?string $id_user = null;
    private ?string $username = null;
    private ?string $password = null;
    private ?string $token = null;
    private ?string $session = null;

    public function getSession(): ?string {
        return $this->session;
    }

    public function setSession(?string $session): void
    {
        $this->session = $session;
    }

    /**
     * @return string|null
     */
    public function getIdUser(): ?string
    {
        return $this->id_user;
    }

    /**
    * @param int|null $id_user
    */
    public function setIdUser(?string $id_user): void
    {
        $this->id_user = $id_user;
    }


    /**
    * @return string|null
    */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
    * @param string|null $token
    */
    public function setToken(?string $token): void
    {
        $this->token = $token;
    }


    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password, bool $hash = false)
    {
        if ($hash) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        }
        $this->password = $password;
        return $this;
    }
    public function verifyPassword($plainPassword): bool
    {
        return password_verify($plainPassword, $this->password);
    }


}