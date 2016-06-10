<?php
require("../Model/user.class.php");
require("../Model/ListGroup.php");
require("../Model/group.class.php");


echo 'Begingyolo\r';


foreach (group::getAllGroup() as $item)
{
echo $item->getGroupName();
}

echo 'endOfYolo \r';
?>