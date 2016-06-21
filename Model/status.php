<?php

/**
 * Created by PhpStorm.
 * User: Nox
 * Date: 20/06/2016
 * Time: 23:00
 */
class status
{

    private $idStatus;
    private $DesignationStatus;

    public function __construct($idStatus, $DesignationStatus)
    {
        $this->idStatus = $idStatus;
        $this->DesignationStatus = $DesignationStatus;
    }

    public function getDesignation()
    {
        return $this->DesignationStatus;
    }

    public function getId()
    {
        return $this->idStatus;
    }

    public function setIdStatus($idStatus)
    {
        $this->idStatus = $idStatus;
    }

    public function setDesignation($DesignationStatus)
    {
        $this->DesignationStatus = $DesignationStatus;
    }

    public static function getStatusById($id)
    {
        $jsonData =  json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/status/".$id,true));
        $arrayOfGroup =  array();

        foreach($jsonData->status as $mydata) {
            array_push($arrayOfGroup, new status( $mydata->idStatus,$mydata->DesignationStatus));
        }
        return  $arrayOfGroup ;
    }


    public function updateStatus()
    {
        $userToUpdate = '{"idStatus":'.$this->getId().',"DesignationStatus":"'.$this->getDesignation().'"}';
        $url =WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/status/update/';

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
    


}