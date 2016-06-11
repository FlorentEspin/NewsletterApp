<?php
require_once ("WebServicePATH.php");
class concat_usergroup
{
    private $idUser;
    private $idgroup;

    public function __construct($idUser, $idgroup)
    {
        $this->idUser = $idUser;
        $this->idgroup = $idgroup;
    }

    public function getIdGroup()
    {
        return $this->idgroup;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }



    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setIdGroup($idgroup)
    {
        $this->idgroup = $idgroup;
    }
}