
<?php
require_once ("WebServicePATH.php");
class attachment
{
    private $idattachment;
    private $name;
    private $serverPath;
   

    public function __construct($idattachment, $name, $serverPath)
    {
        $this->idattachment = $idattachment;
        $this->name = $name;
        $this->serverPath = $serverPath;
    }

    public function getserverPath()
    {
        return $this->serverPath;
    }

    public function getname()
    {
        return $this->name;
    }

    public function getIdattachment()
    {
        return $this->idattachment;
    }

    public function setserverPath($serverPath)
    {
        $this->serverPath = $serverPath;
    }

    public function setIdattachment($idattachment)
    {
        $this->idattachment = $idattachment;
    }

    public function setname($name)
    {
        $this->name = $name;
    }


    public static function getAllattachment()
    {
        $jsonData = json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/attachments", true));
        $arrayOfGroup = array();
        var_dump($jsonData);
        foreach ($jsonData->attachment as $mydata) {
            array_push($arrayOfGroup, new attachment($mydata->idAttachment, $mydata->name, $mydata->serverPath));
        }
        return $arrayOfGroup;
    }

    public static function getattachmentsByID($id)
    {
        $jsonData = json_decode(file_get_contents(WebServicePATH::returnWebServicePATH()."/WebserviceSlimNewslettersProject/api/attachments/" . $id, true));
        $arrayOfGroup = array();
        var_dump($jsonData);

        return $jsonData->attachment;
    }

    public function createAttachment()
    {

        $jsonToInsert = '{"name":"' . $this->getname() . '","serverPath":"' . $this->getserverPath() . '"}';
        $url = WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/attachments';


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

    public static function deleteAttachmentById($idAttchment)
    {
        $url = WebServicePATH::returnWebServicePATH().'/WebserviceSlimNewslettersProject/api/attachments/delete/' . $idAttchment;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");

        $json_response = curl_exec($curl);


        // Send the request
        $result = curl_exec($curl);

        // Free up the resources $curl is using
        curl_close($curl);
        echo $result;
    }

    
}