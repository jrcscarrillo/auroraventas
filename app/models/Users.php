<?php


class Users extends \Phalcon\Mvc\Model
{

    protected $id;
    protected $tipo;
    protected $username;
    protected $password;
    protected $tipoId;
    protected $numeroId;
    protected $name;
    protected $email;
    protected $createdAt;
    protected $active;
    protected $qbid;

    public function setId($id)    {
        $this->id = $id;
        return $this;
    }
    public function setTipo($tipo)    {
        $this->tipo = $tipo;
        return $this;
    }
    public function setUsername($username)    {
        $this->username = $username;
        return $this;
    }
    public function setPassword($password)    {
        $this->password = $password;
        return $this;
    }
    public function setTipoId($tipoId)    {
        $this->tipoId = $tipoId;
        return $this;
    }
    public function setNumeroId($numeroId)    {
        $this->numeroId = $numeroId;
        return $this;
    }
    public function setName($name)    {
        $this->name = $name;
        return $this;
    }
    public function setEmail($email)    {
        $this->email = $email;
        return $this;
    }
    public function setCreatedAt($createdAt)    {
        $this->createdAt = $createdAt;
        return $this;
    }
    public function setActive($active)    {
        $this->active = $active;
        return $this;
    }
    public function setQbid($qbid)    {
        $this->qbid = $qbid;
        return $this;
    }
    public function getId()    {
        return $this->id;
    }
    public function getTipo()    {
        return $this->tipo;
    }
    public function getUsername()    {
        return $this->username;
    }
    public function getPassword()    {
        return $this->password;
    }
    public function getTipoId()    {
        return $this->tipoId;
    }
    public function getNumeroId()    {
        return $this->numeroId;
    }
    public function getName()    {
        return $this->name;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getCreatedAt()    {
        return $this->createdAt;
    }
    public function getActive()    {
        return $this->active;
    }
    public function getQbid()    {
        return $this->qbid;
    }

    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("users");

    }
    public static function find($parameters = null) {
        return parent::find($parameters);
    }
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    public function getSource()
    {
        return 'users';
    }

}
