<?php

require_once '../models/main_database.php';

class Administrator {

    public function __construct() {
        $obj_db = new Database();
    }

    public function admin_login_check($data) {
        $password = md5($data['admin_password']);
        $sql = "SELECT * FROM tbl_admin WHERE admin_email='$data[admin_email]' AND admin_activation_status=1 AND admin_password='$password'";
        $query_result = mysql_query($sql);
        $result = mysql_fetch_assoc($query_result);
        if ($result) {
            $_SESSION['admin_id'] = $result['admin_id'];
            $_SESSION['admin_name'] = $result['admin_name'];
            header('Location:dashbord.php');
        } else {
            $message = 'Your Email Or Password Invalide !';
            return $message;
        }
    }

}
