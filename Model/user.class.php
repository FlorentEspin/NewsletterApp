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
            array_push($arrayOfGroup, new Newsletter($mydata->idUser, $mydata->name, $mydata->adress));
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
        $url ='http://localhost:8080/WebserviceSlimNewslettersProject/api/users';


        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonToInsert);

        $json_response = curl_exec($curl);


        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);

        echo $result;
        var_dump($jsonToInsert);
    }

    public static function  deleteUserById($id)
    {

        $url ='http://localhost:8080/WebserviceSlimNewslettersProject/api/users/delete/'.$id;

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
        $url ='http://localhost:8080/WebserviceSlimNewslettersProject/api/users/update/'.$this->getIdUser();

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

}