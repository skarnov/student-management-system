<?php
    class Database {
    public function __construct() {
        $host_name='localhost';
        $user_name='root';
        $password='';
        $database_name='db_evis_student_management_system';
        $conn=  mysql_connect($host_name,$user_name,$password);
        if($conn)
        {
            mysql_select_db($database_name);
        }
        else{
            die('Database Server Not Connected !');
        }
    }
}