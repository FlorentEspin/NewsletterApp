<?php

class group
{
    private $idgroup;
    private $name;
    private $adress;

    public function __construct($idgroup, $name, $adress)
    {
        $this->idgroup = $idgroup;
        $this->name = $name;
        $this->adress = $adress;
    }

    public function getAdress()
    {
        return $this->adress;
    }

    public function getGroupName()
    {
        return $this->name;
    }

    public function getId()
    {
        return $this->idUser;
    }

    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    public function setIdgroup($idgroup)
    {
        $this->idgroup = $idgroup;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public static function getAllGroup()
    {
        $jsonData =  json_decode(file_get_contents("http://localhost:8080/WebserviceSlimNewslettersProject/api/groups",true));
        $arrayOfGroup =  array();

        foreach($jsonData->group as $mydata) {
            array_push($arrayOfGroup, new group($mydata->idGroup, $mydata->GroupName, $mydata->adressEmail));
        }
    return  $arrayOfGroup ;
    }


    public static function FindGroupById($id)
    {

    }
}