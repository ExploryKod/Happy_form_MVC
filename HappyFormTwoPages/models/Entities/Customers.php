<?php
require_once __DIR__ . '/InitEntity.php';

class Customers extends InitEntity
{
    private int|string|null $id_client = null;
    private ?string $last_name = null;
    private ?string $first_name = null;
    private ?string $address = null;
    private ?string $tel = null;
    private ?string $meeting = null;

    /**
     * @return null
     */
    public function getIdClient()
    {
        return $this->id_client;
    }

    /**
     * @param $id_client
     * @return $this
     */
    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
        return $this;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
        return $this;
    }


    public function getMeeting()
    {
        return $this->meeting;
    }

    public function setMeeting($meeting)
    {
        $this->meeting = $meeting;
        return $this;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
        return $this;
    }
}