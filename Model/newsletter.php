<?php
require_once ("WebServicePATH.php");
class Newsletter
{
    private $idnewsletter;
    private $CampagneName;
    private $HtmlBody;

    public function __construct($idnewsletter, $CampagneName, $HtmlBody)
    {
        $this->idnewsletter = $idnewsletter;
        $this->CampagneName = $CampagneName;
        $this->HtmlBody = $HtmlBody;
    }



    public function getHtmlBody()
    {
        return $this->HtmlBody;
    }

    public function getCampagneName()
    {
        return $this->CampagneName;
    }

        public function getIdnewsletter()
    {
        return $this->idnewsletter;
    }

    public function setHtmlBody($HtmlBody)
    {
        $this->HtmlBody = $HtmlBody;
    }

    public function setIdnewsletter($idnewsletter)
    {
        $this->idnewsletter = $idnewsletter;
    }

    public function setCampagneName($CampagneName)
    {
        $this->CampagneName = $CampagneName;
    }


    public static function getAllnewsletter()
    {
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/newsletters",true));
        $arrayOfGroup =  array();
        foreach($jsonData->newsletter as $mydata) {
            array_push($arrayOfGroup, new Newsletter($mydata->idNewsletter, $mydata->CampagneName, $mydata->HtmlBody));
        }
        return  $arrayOfGroup ;
    }

    public static function getNewslettersByID($id)
    {
        $id = str_replace("'", "", $id);
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/newsletters/".$id,true));
        $arrayOfGroup =  array();
        foreach($jsonData->newsletter as $mydata) {
            array_push($arrayOfGroup, new Newsletter($mydata->idNewsletter, $mydata->CampagneName, $mydata->HtmlBody));
        }
        return  $arrayOfGroup ;
    }

    public function createNewsletter($idgroup)
    {
        // ERREUR DANS LE WEB SERVICE iduser = idgroup!!!!!!!
        $jsonToInsert = '{"idUser":"'.$idgroup.'", "HtmlBody":"'.$this->getHtmlBody().'", "CampagneName":"'.$this->getCampagneName().'"}';


        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/newsletters';


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
    
    public static function  deleteNewsletterById($id)
    {

        $url = WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/newsletters/delete/'.$id;

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

    public function updateNewsletter()
    {
        $userToUpdate = '{"idNewsletter":'.$this->getIdnewsletter().',"HtmlBody":"'.$this->getHtmlBody().'","CampagneName":"'.$this->getCampagneName().'"}';
        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/newsletters/update/'.$this->getIdnewsletter();

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