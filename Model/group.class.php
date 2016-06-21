<?php
require_once ("WebServicePATH.php");
require_once ("status.php");


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
        return $this->idgroup;
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
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/groups",true));
        $arrayOfGroup =  array();

        foreach($jsonData->group as $mydata) {
            array_push($arrayOfGroup, new group($mydata->idGroup, $mydata->GroupName, $mydata->adressEmail));
        }
    return  $arrayOfGroup ;
    }


    public static function addUserToGroup($idGroup,$idUser)
    {
        $jsonToInsert = '{"idgroup":"'.$idGroup.'","iduser":"'.$idUser.'"}';
        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/ConcatUserGroups';


        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonToInsert);


        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);

        echo $result;
    }

    public function createGroup()
    {

        $jsonToInsert = '{"GroupName":"'.$this->getGroupName().'","adressEmail":"'.$this->getAdress().'"}';
        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/groups';


        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonToInsert);


        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);

        return $result;
    }

    public function getAllUserFromGroup()
    {
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/groups/users/".$this->getId(),true));
        $arrayOfGroup =  array();

        foreach($jsonData->group as $mydata) {
            array_push($arrayOfGroup, new concat_usergroup($mydata->iduser, $mydata->idgroup));
        }
        return  $arrayOfGroup ;
    }
    public static function  deleteGroupById($id)
    {

        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/serviceConcatStatusUsersNewsLetter/deleteGroup/'.$id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($curl);


        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/ConcatUserGroups/deleteGroup/'.$id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");


        // Send the request
        $result = curl_exec($curl);

        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/groups/delete/'.$id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");


        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);
        echo  $result;
    }

    public function updateGroup()
    {
        $userToUpdate = '{"idGroup":'.$this->getId().',"GroupName":"'.$this->getGroupName().'","adressEmail":"'.$this->getAdress().'"}';
        $url ='http://localhost:8080/WebserviceSlimNewslettersProject/api/groups/update/'.$this->getId();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $userToUpdate);
        $json_response = curl_exec($curl);

        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);
        echo  $result;
    }

    public static function getGroupById($id)
    {
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/groups/".$id,true));
        $arrayOfGroup =  array();

        foreach($jsonData->group as $mydata) {
            array_push($arrayOfGroup, new group( $mydata->idGroup,$mydata->GroupName, $mydata->adressEmail));
        }
        return  $arrayOfGroup ;
    }

    public static function getStatusGroupById($id)
    {
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/groups/status/".$id,true));
        $arrayOfGroup =  array();

        foreach($jsonData->concatStatus as $mydata) {
            $status = status::getStatusById($mydata->idStatus);
            array_push($arrayOfGroup,$status);
        }
        //var_dump($arrayOfGroup);
        return  $arrayOfGroup ;

    }





}