<?php
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
*/
$objectN = new newsletter(1,'zzzzzzzz','zzzz');
$objectN->updateNewsletter();

echo 'endOfYolo \r';
?>