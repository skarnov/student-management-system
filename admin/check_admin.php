<?php

require_once '../controllers/super_admin.php';

$obj_super_admin = new Super_admin();
$admin_name=$_GET['text'];
$result=$obj_super_admin->admin_name_ajax_search($admin_name);
$query_result= mysql_fetch_assoc($result);
if($query_result)
{
    echo 'Alredy Exists';
}
else{
    echo 'Avilable';
}