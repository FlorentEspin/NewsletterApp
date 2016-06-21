<?php
require_once ("WebServicePATH.php");
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
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/users",true));
        $arrayOfGroup =  array();

        foreach($jsonData->users as $mydata) {
            array_push($arrayOfGroup, new User($mydata->idUser, $mydata->userName, $mydata->userAdressEmail));
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

    public function createUser()
    {

        $jsonToInsert = '{"userName":"'.$this->getName().'","userAdressEmail":"'.$this->getAdress().'"}';
        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/users';


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
        var_dump($jsonToInsert);
    }

    public static function  deleteUserById($id)
    {

        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/serviceConcatStatusUsersNewsLetter/deleteUser/'.$id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");


        // Send the request
        $result = curl_exec($curl);
        
        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/ConcatUserGroups/deleteUser/'.$id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");


        // Send the request
        $result = curl_exec($curl);

        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/users/delete/'.$id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        $json_response = curl_exec($curl);


        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);
        echo  $result;
    }

    public function updateUser()
    {
        $userToUpdate = '{"idUser":'.$this->getIdUser().',"userName":"'.$this->getName().'","userAdressEmail":"'.$this->getAdress().'"}';
        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/users/update/'.$this->getIdUser();

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $userToUpdate);
        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);
        echo  $result;
    }


    public static function getUserById($id)
    {
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/users/".$id,true));
        $arrayOfGroup =  array();

        $user=null;
        foreach($jsonData->user as $mydata) {
           $user= new User($mydata->idUser, $mydata->userName, $mydata->userAdressEmail);
        }
        return  $user ;
    }

    public static function getUserByStatusId($id)
    {
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/users/status/".$id,true));
        $arrayOfGroup =  array();
        foreach($jsonData->concat_statususernewsletter as $mydata) {
            $jsonDataUser =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/users/".$mydata->idUser,true));
            foreach($jsonDataUser->user as $aUser) {
                array_push($arrayOfGroup, new user( $aUser->idUser, $aUser->userName,$aUser->userAdressEmail));
            }
        }
        return  $arrayOfGroup ;
    }

}