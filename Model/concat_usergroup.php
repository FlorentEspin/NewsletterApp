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
    
    public static function getConcatGroupUserByIdGroup($id)
    {  
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/ConcatUserGroups/".$id,true));
        $arrayOfGroup =  array();

        foreach($jsonData->group as $mydata) {
            array_push($arrayOfGroup, new concat_usergroup( $mydata->idgroup,$mydata->iduser));
        }
        var_dump($arrayOfGroup);
        return  $arrayOfGroup ;


    }

    public static function  deleteConcatGroupByIdGroup($id)
    {

        $url = WebServicePATH::returnWebServicePATH() . '/WebserviceSlimNewslettersProject/api/ConcatUserGroups/deleteGroup/' . $id;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");


        // Send the request
        $result = curl_exec($curl);
    }
}