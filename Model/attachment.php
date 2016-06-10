<?php

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
        $jsonData =  json_decode(file_get_contents("http://localhost:8080/WebserviceSlimNewslettersProject/api/attachments",true));
        $arrayOfGroup =  array();
        var_dump($jsonData);
        foreach($jsonData->attachment as $mydata) {
            array_push($arrayOfGroup, new attachment($mydata->idAttachment, $mydata->name, $mydata->serverPath));
        }
        return  $arrayOfGroup ;
    }

    public static function getattachmentsByID($id)
    {
        $jsonData =  json_decode(file_get_contents("http://localhost:8080/WebserviceSlimNewslettersProject/api/attachments/".$id,true));
        $arrayOfGroup =  array();
        var_dump($jsonData);

        return  $jsonData->attachment ;
    }

    public static function CheckMdpAndPassord($login,$password)
    {
        foreach(this.self::getAllattachment() as $attachment)
        {
            //if ($attachment->getname()
        }
    }
}