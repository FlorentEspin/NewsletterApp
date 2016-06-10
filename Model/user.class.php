<?php

class User
{
    private $idUser;
    private $name;
    private $adress;

    public function __construct($idUser, $name, $adress)
    {
        $this->idUser = $idUser;
        $this->name = $name;
        $this->adress = $adress;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public static function getAllUser()
    {
        $jsonData =  json_decode(file_get_contents("http://localhost:8080/WebserviceSlimNewslettersProject/api/groups",true));
        $arrayOfGroup =  array();

        foreach($jsonData->group as $mydata) {
            array_push($arrayOfGroup, new User($mydata->idUser, $mydata->name, $mydata->adress));
        }
        return  $arrayOfGroup ;
    }

    public static function CheckMdpAndPassord($login,$password)
    {
          foreach(this.self::getAllUser() as $user)
          {
                 //if ($user->getName()
          }
    }
}