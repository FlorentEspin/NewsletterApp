<?php
require_once ("WebServicePATH.php");
class concat_statususernewsletter
{
    private $idUser;
    private $idgroup;
    private $idNewsletter;
    private $idStatus;

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


    public static function  unsubscribeUserByIdStatus($id)
    {

        $url = WebServicePATH::returnWebServicePATH() . '/WebserviceSlimNewslettersProject/api/serviceConcatStatusUsersNewsLetter/unsubscribe/'.$id;

        $StatusToUpdate = '{"idStatus":'.$id.'}';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $StatusToUpdate );
        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);
        echo  $result;

        // Send the request
    }
}