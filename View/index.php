<?php
session_start();
require("../Model/user.class.php");
require("../Model/ListGroup.php");
require("../Model/group.class.php");
require("../Model/newsletter.php");
require("../Model/attachment.php");




echo 'Begingyolo\r';

/*
foreach (group::getAllGroup() as $item)
{
echo $item->getGroupName();
}*/

/*
foreach (newsletter::getAllnewsletter() as $item)
{
    echo $item->getHtmlBody();
}*/

//var_dump(newsletter::getNewslettersByID(1));

/*
var_dump(attachment::getattachmentsByID(1));

foreach (attachment::getAllattachment() as $item)
{
    echo $item->getName();
}
$objectN = new attachment(1,'adf','sdfklflmsdlmb');
$objectN->createAttachment();

$objectN = new newsletter(1,'zzzzzzzz','zzzz');
$objectN->createNewsletter(1);
$objectN = new User(1,'us','us');
$objectN->createUser();

$objectN = new group(1,'gr','gr');
$objectN->createGroup();

$objectN = new attachment(1,'at','zzatzz');
$objectN->createAttachment();
*/

$objectN = new group(1,'e','za');
//group::addUserToGroup(12,1);//->deleteGroupById();
var_dump(User::getAllUser());

echo 'endOfYolo \r';
?>