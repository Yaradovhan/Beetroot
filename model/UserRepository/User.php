<?php

class User
{
    private $name;
    private $email;
    private $id;

    /**
     * User constructor.
     */
    public function __construct()
    {

    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param $data
     */
    public function setUser($data)
    {
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->email = isset($data['email']) ? $data['email'] : null;
        $this->id = isset($data['id']) ? $data['id'] : null;
    }

    /**
     * @return array
     */
    public function getUser()
    {
        return ['name' => $this->name, 'email' => $this->email];
    }
}