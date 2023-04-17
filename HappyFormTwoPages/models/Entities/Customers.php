<?php
require_once("./InitEntity.php");

class Customers extends InitEntity
{
    private ?int $id = null;
    private ?string $last_name = null;
    private ?string $first_name = null;
    private ?string $address = null;
    private ?int $tel = null;
    private ?string $meeting = null;

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
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

    public function setFistName($first_name)
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