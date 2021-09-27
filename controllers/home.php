<?php

require_once 'models/home.php';

class Home {

    public function __construct() {
        $obj_db = new Database();
    }

    public function select_all_slider() {
        $sql = "SELECT * FROM tbl_slider WHERE slider_status=1";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_published_event() {
        $sql = "SELECT * FROM tbl_event ORDER BY event_id DESC LIMIT 3";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_notice() {
        $sql = "SELECT * FROM tbl_notice ORDER BY notice_id DESC LIMIT 6";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_notice_from_db() {
        $sql = "SELECT * FROM tbl_notice ORDER BY notice_id DESC";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_notice_by_id($notice_id) {
        $sql = "SELECT * FROM tbl_notice WHERE notice_id='$notice_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_faculty() {
        $sql = "SELECT * FROM tbl_teacher ORDER BY teacher_id DESC LIMIT 3";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_faculty_by_id($teacher_id) {
        $sql = "SELECT * FROM tbl_teacher WHERE teacher_id='$teacher_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_faculty_from_db() {
        $sql = "SELECT * FROM tbl_teacher";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_news() {
        $sql = "SELECT * FROM tbl_news ORDER BY news_id DESC LIMIT 3";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_news_by_id($news_id) {
        $sql = "SELECT * FROM tbl_news WHERE news_id='$news_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_news_from_db() {
        $sql = "SELECT * FROM tbl_news ORDER BY news_id DESC";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_event() {
        $sql = "SELECT * FROM tbl_event ORDER BY event_id DESC LIMIT 3";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_event_by_id($event_id) {
        $sql = "SELECT * FROM tbl_event WHERE event_id='$event_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_event_from_db() {
        $sql = "SELECT * FROM tbl_event ORDER BY event_id DESC";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_class() {
        $sql = "SELECT * FROM tbl_class";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_teacher() {
        $sql = "SELECT * FROM tbl_teacher";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_result($data) {
        $sql = "SELECT * FROM tbl_result JOIN tbl_student on tbl_result.student_id=tbl_student.student_id ";
        $sql.="JOIN tbl_subject on tbl_result.subject_id=tbl_subject.subject_id ";
        $sql.="JOIN tbl_class on tbl_result.class_id=tbl_class.class_id ";
        $sql.= " WHERE tbl_result.student_id='$data[student_id]' ";
        $sql.= "AND tbl_student.student_password='$data[password]' ";
        $sql.= "AND tbl_result.class_id='$data[class_id]'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_profile($student_email, $student_password) {
        $sql = "SELECT * FROM tbl_student WHERE student_email='$student_email' AND student_password='$student_password' ";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_result_by_student_id($student_id) {
        $sql = "SELECT * FROM tbl_result JOIN tbl_student on tbl_result.student_id=tbl_student.student_id ";
        $sql.="JOIN tbl_subject on tbl_result.subject_id=tbl_subject.subject_id ";
        $sql.="JOIN tbl_class on tbl_result.class_id=tbl_class.class_id ";
        $sql.= " WHERE tbl_result.student_id='$student_id' ";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_student_by_id($student_id) {
        $sql = "SELECT * FROM tbl_student WHERE student_id='$student_id' ";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_class_by_id($class_id) {
        $sql = "SELECT * FROM tbl_class WHERE class_id='$class_id' ";
        $query_result = mysql_query($sql);
        return $query_result;
    }
}