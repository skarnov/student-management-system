<?php

require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$teacher_name=$_GET['text'];
$result=$obj_super_admin->teacher_name_ajax_search($teacher_name);
$query_result=  mysql_fetch_assoc($result);

if($query_result)
{
    echo 'Alredy Exists';
}
else{
    echo 'Avilable';
}