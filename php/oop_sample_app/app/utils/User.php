<?php
/**
* User
*/
class User
{
    /**
     * @var
     */
    private $name = null;
    /**
     * @var
     */
    private $email = null;
    /**
     * @var
     */
    private $gender = null;
    /**
     * @var
     */
    private $role = null;
    /**
     * @var
     */
    private $id = null;

    /**
     * User constructor.
     */
    function __construct()
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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed array
     */
    public function toArray()
    {
        $arr = array();
        foreach ($this as $key => $value) {
            $arr[$key] = $value;
        }
        return $arr;
    }

    /**
     * @return string json
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }
}