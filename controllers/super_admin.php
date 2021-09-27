<?php

require_once '../models/main_database.php';

class Super_admin {

    public function __construct() {
        $obj_db = new Database();
    }

    public function logout() {
        session_destroy();
        session_start();
        $_SESSION['message'] = 'You Are Successfully Logout !';
        header('Location:index.php');
    }

    public function save_admin_info($data) {
        $sql = "INSERT INTO tbl_admin (admin_name,admin_email,admin_password,admin_access_level) VALUES"
                . "('$data[admin_name]','$data[admin_email]','$data[admin_password]','$data[admin_access_level]')";
        if (!mysql_query($sql)) {
            die('SQL Error:' . mysql_error());
        } else {
            $_SESSION['message'] = 'Save Successfully !';
        }
    }

    public function select_all_admin() {
        $sql = "SELECT * FROM tbl_admin";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_subject() {
        $sql = "SELECT * FROM tbl_subject as S, tbl_class as C WHERE S.class_id=C.class_id";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function published_admin($id) {
        $sql = "UPDATE tbl_admin SET admin_activation_status='1' WHERE admin_id='$id'";
        mysql_query($sql);
        header('Location:manage_admin.php');
    }

    public function unpublished_admin($id) {
        $sql = "UPDATE tbl_admin SET admin_activation_status='0' WHERE admin_id='$id'";
        mysql_query($sql);
        header('Location:manage_admin.php');
    }

    public function delete_admin($id) {
        $sql = "DELETE FROM tbl_admin WHERE admin_id='$id'";
        mysql_query($sql);
        header('Location:manage_admin.php');
    }

    public function select_admin_info_by_id($admin_id) {
        $sql = "SELECT * FROM tbl_admin WHERE admin_id='$admin_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_admin_info($data) {
        $sql = "UPDATE tbl_admin SET admin_name='$data[admin_name]',admin_email='$data[admin_email]',admin_access_level='$data[admin_access_level]'WHERE admin_id='$data[admin_id]'";
        mysql_query($sql);
        header('Location:manage_admin.php');
    }

    public function save_student_info($data, $files) {
        if ($files['student_image']['name']) {
            $target_dir = "../student_images/";
            $target_file = $target_dir . basename($files["student_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["student_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["student_image"]["size"] < 500000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    } else {
                        if (move_uploaded_file($files["student_image"]["tmp_name"], $target_file)) {
                            $student_image = $target_file;
                            $sql = "INSERT INTO tbl_student (student_name,class_id,student_roll,student_email,student_password,student_image,student_address,student_status) VALUES"
                                    . "('$data[student_name]','$data[class_id]','$data[student_roll]','$data[student_email]','$data[student_password]','$student_image','$data[student_address]','$data[student_status]')";
                            if (!mysql_query($sql)) {
                                die('SQL Error:' . mysql_error());
                            } else {
                                $_SESSION['message'] = 'Save Successfully !';
                            }
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                } else {
                    $message = "Sorry, your file is too large.";
                    return $message;
                }
            } else {
                $message = "File is not an image.";
                return $message;
            }
        } else {
            $message = 'Image file not selected';
            return $message;
        }
    }

    public function select_all_student() {
        $sql = "SELECT * FROM tbl_student As s,tbl_class As c WHERE s.class_id=c.class_id";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function published_student($id) {
        $sql = "UPDATE tbl_student SET student_status='1' WHERE student_id='$id'";
        mysql_query($sql);
        header('Location:manage_student.php');
    }

    public function unpublished_student($id) {
        $sql = "UPDATE tbl_student SET student_status='0' WHERE student_id='$id'";
        mysql_query($sql);
        header('Location:manage_student.php');
    }

    public function delete_student($id) {
        $sql = "DELETE FROM tbl_student WHERE student_id='$id'";
        mysql_query($sql);
        header('Location:manage_student.php');
    }

    public function delete_result($id) {
        $sql = "DELETE FROM tbl_result WHERE result_id='$id'";
        mysql_query($sql);
        header('Location:manage_result.php');
    }

    public function select_student_info_by_id($student_id) {
        $sql = "SELECT * FROM tbl_student WHERE student_id='$student_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_student_info($data, $files) {

        if ($files['student_image']['name']) {
            $target_dir = "../student_images/";
            $target_file = $target_dir . basename($files["student_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["student_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["student_image"]["size"] < 500000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    } else {
                        if (move_uploaded_file($files["student_image"]["tmp_name"], $target_file)) {
                            $student_image = $target_file;

                            $sql = "UPDATE tbl_student SET student_name='$data[student_name]',student_roll='$data[student_roll]',student_email='$data[student_email]',student_image='$student_image',class_id='$data[class_id]', student_address='$data[student_address] WHERE student_id='$data[student_id]'  ";
                            mysql_query($sql);
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                } else {
                    $message = "Sorry, your file is too large.";
                    return $message;
                }
            } else {
                $message = "File is not an image.";
                return $message;
            }
        } else {
            $message = 'Image file not selected';
            $sql = "UPDATE tbl_student SET student_name='$data[student_name]',student_roll='$data[student_roll]',student_email='$data[student_email]',class_id='$data[class_id]', student_address='$data[student_address]' WHERE student_id='$data[student_id]'  ";
            mysql_query($sql);
        }
    }

    public function save_teacher_info($data, $files) {
        if ($files['teacher_image']['name']) {
            $target_dir = "../teacher_images/";
            $target_file = $target_dir . basename($files["teacher_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["teacher_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["teacher_image"]["size"] < 500000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    } else {
                        if (move_uploaded_file($files["teacher_image"]["tmp_name"], $target_file)) {
                            $teacher_image = $target_file;
                            $sql = "INSERT INTO tbl_teacher (teacher_name,teacher_description,teacher_join_date,teacher_email,teacher_password,teacher_image,teacher_designation) VALUES"
                                    . "('$data[teacher_name]','$data[teacher_description]','$data[teacher_join_date]','$data[teacher_email]','$data[teacher_password]','$teacher_image','$data[teacher_designation]')";
                            if (!mysql_query($sql)) {
                                die('SQL Error:' . mysql_error());
                            } else {
                                $_SESSION['message'] = 'Save Successfully !';
                            }
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                } else {
                    $message = "Sorry, your file is too large.";
                    return $message;
                }
            } else {
                $message = "File is not an image.";
                return $message;
            }
        } else {
            $message = 'Image file not selected';
            return $message;
        }
    }

    public function select_all_teacher() {
        $sql = "SELECT * FROM tbl_teacher";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function published_teacher($id) {
        $sql = "UPDATE tbl_teacher SET teacher_status='1' WHERE teacher_id='$id'";
        mysql_query($sql);
        header('Location:manage_teacher.php');
    }

    public function unpublished_teacher($id) {
        $sql = "UPDATE tbl_teacher SET teacher_status='0' WHERE teacher_id='$id'";
        mysql_query($sql);
        header('Location:manage_teacher.php');
    }

    public function delete_teacher($id) {
        $sql = "DELETE FROM tbl_teacher WHERE teacher_id='$id'";
        mysql_query($sql);
        header('Location:manage_teacher.php');
    }

    public function select_teacher_info_by_id($teacher_id) {
        $sql = "SELECT * FROM tbl_teacher WHERE teacher_id='$teacher_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_teacher_info($data, $files) {
        if ($files['teacher_image']['name']) {
            $target_dir = "../teacher_images/";
            $target_file = $target_dir . basename($files["teacher_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["teacher_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["teacher_image"]["size"] < 500000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    } else {
                        if (move_uploaded_file($files["teacher_image"]["tmp_name"], $target_file)) {
                            $teacher_image = $target_file;

                            $sql = "UPDATE tbl_teacher SET teacher_name='$data[teacher_name]',teacher_description='$data[teacher_description]',teacher_join_date='$data[teacher_join_date]',teacher_email='$data[teacher_email]',teacher_image='$teacher_image',teacher_designation='$data[teacher_designation]' WHERE teacher_id='$data[teacher_id]'  ";
                            mysql_query($sql);
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                } else {
                    $message = "Sorry, your file is too large.";
                    return $message;
                }
            } else {
                $message = "File is not an image.";
                return $message;
            }
        } else {
            $message = 'Image file not selected';
            $sql = "UPDATE tbl_teacher SET teacher_name='$data[teacher_name]',teacher_description='$data[teacher_description]',teacher_join_date='$data[teacher_join_date]',teacher_email='$data[teacher_email]',teacher_designation='$data[teacher_designation]' WHERE teacher_id='$data[teacher_id]'  ";
            mysql_query($sql);
        }
    }

    public function admin_name_ajax_search($admin_name) {
        $sql = "SELECT * FROM tbl_admin WHERE admin_name='$admin_name'";
        $result = mysql_query($sql);
        return$result;
    }

    public function student_name_ajax_search($student_name) {
        $sql = "SELECT * FROM tbl_student WHERE student_name='$student_name'";
        $result = mysql_query($sql);
        return$result;
    }

    public function teacher_name_ajax_search($teacher_name) {
        $sql = "SELECT * FROM tbl_teacher WHERE student_name='$teacher_name'";
        $result = mysql_query($sql);
        return$result;
    }

    public function save_event_info($data) {
        $sql = "INSERT INTO tbl_event (event_title,event_main,event_status) VALUES"
                . "('$data[event_title]','$data[event_main]','$data[event_status]')";
        if (!mysql_query($sql)) {
            die('SQL Error:' . mysql_error());
        } else {
            $_SESSION['message'] = 'Save Successfully !';
        }
    }

    public function select_all_event() {
        $sql = "SELECT * FROM tbl_event";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function published_event($id) {
        $sql = "UPDATE tbl_event SET event_status='1' WHERE event_id='$id'";
        mysql_query($sql);
        header('Location:manage_event.php');
    }

    public function unpublished_event($id) {
        $sql = "UPDATE tbl_event SET event_status='0' WHERE event_id='$id'";
        mysql_query($sql);
        header('Location:manage_event.php');
    }

    public function delete_event($id) {
        $sql = "DELETE FROM tbl_event WHERE event_id='$id'";
        mysql_query($sql);
        header('Location:manage_event.php');
    }

    public function select_event_info_by_id($event_id) {
        $sql = "SELECT * FROM tbl_event WHERE event_id='$event_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_event_info($data) {
        $sql = "UPDATE tbl_event SET event_title='$data[event_title]',event_main='$data[event_main]',event_status='$data[event_status]'WHERE event_id='$data[event_id]'";
        mysql_query($sql);
        header('Location:manage_event.php');
    }

    public function save_notice_info($data) {
        $sql = "INSERT INTO tbl_notice (notice_title,notice_main,notice_status) VALUES"
                . "('$data[notice_title]','$data[notice_main]','$data[notice_status]')";
        if (!mysql_query($sql)) {
            die('SQL Error:' . mysql_error());
        } else {
            $_SESSION['message'] = 'Save Successfully !';
        }
    }

    public function select_all_notice() {
        $sql = "SELECT * FROM tbl_notice";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function published_notice($id) {
        $sql = "UPDATE tbl_notice SET notice_status='1' WHERE notice_id='$id'";
        mysql_query($sql);
        header('Location:manage_notice.php');
    }

    public function unpublished_notice($id) {
        $sql = "UPDATE tbl_notice SET notice_status='0' WHERE notice_id='$id'";
        mysql_query($sql);
        header('Location:manage_notice.php');
    }

    public function delete_notice($id) {
        $sql = "DELETE FROM tbl_notice WHERE notice_id='$id'";
        mysql_query($sql);
        header('Location:manage_notice.php');
    }

    public function select_notice_info_by_id($notice_id) {
        $sql = "SELECT * FROM tbl_notice WHERE notice_id='$notice_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_notice_info($data) {
        $sql = "UPDATE tbl_notice SET notice_title='$data[notice_title]',notice_main='$data[notice_main]',notice_status='$data[notice_status]'WHERE notice_id='$data[notice_id]'";
        mysql_query($sql);
        header('Location:manage_notice.php');
    }

    public function save_news_info($data, $files) {
        if ($files['news_image']['name']) {
            $target_dir = "../news_images/";
            $target_file = $target_dir . basename($files["news_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["news_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["news_image"]["size"] < 500000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    } else {
                        if (move_uploaded_file($files["news_image"]["tmp_name"], $target_file)) {
                            $news_image = $target_file;
                            $sql = "INSERT INTO tbl_news (news_title,news_main,news_image,news_status) VALUES"
                                    . "('$data[news_title]','$data[news_main]','$news_image','$data[news_status]')";
                            if (!mysql_query($sql)) {
                                die('SQL Error:' . mysql_error());
                            } else {
                                $_SESSION['message'] = 'Save Successfully !';
                            }
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                } else {
                    $message = "Sorry, your file is too large.";
                    return $message;
                }
            } else {
                $message = "File is not an image.";
                return $message;
            }
        } else {
            $message = 'Image file not selected';
            return $message;
        }
    }

    public function select_all_news() {
        $sql = "SELECT * FROM tbl_news";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function published_news($id) {
        $sql = "UPDATE tbl_news SET news_status='1' WHERE news_id='$id'";
        mysql_query($sql);
        header('Location:manage_news.php');
    }

    public function unpublished_news($id) {
        $sql = "UPDATE tbl_news SET news_status='0' WHERE news_id='$id'";
        mysql_query($sql);
        header('Location:manage_news.php');
    }

    public function delete_news($id) {
        $sql = "DELETE FROM tbl_news WHERE news_id='$id'";
        mysql_query($sql);
        header('Location:manage_news.php');
    }

    public function select_news_info_by_id($news_id) {
        $sql = "SELECT * FROM tbl_news WHERE news_id='$news_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_news_info($data, $files) {
        if ($files['news_image']['name']) {
            $target_dir = "../news_images/";
            $target_file = $target_dir . basename($files["news_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["news_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["news_image"]["size"] < 500000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    } else {
                        if (move_uploaded_file($files["news_image"]["tmp_name"], $target_file)) {
                            $news_image = $target_file;

                            $sql = "UPDATE tbl_news SET news_title='$data[news_title]',news_main='$data[news_main]',news_image='$news_image',news_status='$data[news_status]' WHERE news_id='$data[news_id]'  ";
                            mysql_query($sql);
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                } else {
                    $message = "Sorry, your file is too large.";
                    return $message;
                }
            } else {
                $message = "File is not an image.";
                return $message;
            }
        } else {
            $message = 'Image file not selected';
            $sql = "UPDATE tbl_news SET news_title='$data[news_title]',news_main='$data[news_main]',news_status='$data[news_status]' WHERE news_id='$data[news_id]'  ";
            mysql_query($sql);
        }
    }

    public function save_slider_info($data, $files) {
        if ($files['slider_image']['name']) {
            $target_dir = "../slider_images/";
            $target_file = $target_dir . basename($files["slider_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["slider_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["slider_image"]["size"] < 5000000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    } else {
                        if (move_uploaded_file($files["slider_image"]["tmp_name"], $target_file)) {
                            $slider_image = $target_file;
                            $sql = "INSERT INTO tbl_slider (slider_name,slider_image,slider_status) VALUES"
                                    . "('$data[slider_name]','$slider_image','$data[slider_status]')";
                            if (!mysql_query($sql)) {
                                die('SQL Error:' . mysql_error());
                            } else {
                                $_SESSION['message'] = 'Save Successfully !';
                            }
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                } else {
                    $message = "Sorry, your file is too large.";
                    return $message;
                }
            } else {
                $message = "File is not an image.";
                return $message;
            }
        } else {
            $message = 'Image file not selected';
            return $message;
        }
    }

    public function select_all_slider() {
        $sql = "SELECT * FROM tbl_slider";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function published_slider($id) {
        $sql = "UPDATE tbl_slider SET slider_status='1' WHERE slider_id='$id'";
        mysql_query($sql);
        header('Location:manage_slider.php');
    }

    public function unpublished_slider($id) {
        $sql = "UPDATE tbl_slider SET slider_status='0' WHERE slider_id='$id'";
        mysql_query($sql);
        header('Location:manage_slider.php');
    }

    public function delete_slider($id) {
        $sql = "DELETE FROM tbl_slider WHERE slider_id='$id'";
        mysql_query($sql);
        header('Location:manage_slider.php');
    }

    public function select_slider_info_by_id($slider_id) {
        $sql = "SELECT * FROM tbl_slider WHERE slider_id='$slider_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_slider_info($data, $files) {
        if ($files['slider_image']['name']) {
            $target_dir = "../slider_images/";
            $target_file = $target_dir . basename($files["slider_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($files["slider_image"]["tmp_name"]);
            if ($check !== false) {
                if ($files["slider_image"]["size"] < 500000) {
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        return $message;
                    } else {
                        if (move_uploaded_file($files["slider_image"]["tmp_name"], $target_file)) {
                            $slider_image = $target_file;

                            $sql = "UPDATE tbl_slider SET slider_name='$data[slider_name]',slider_image='$slider_image',slider_status='$data[slider_status]' WHERE slider_id='$data[slider_id]'  ";
                            mysql_query($sql);
                        } else {
                            $message = "Sorry, there was an error uploading your file.";
                            return $message;
                        }
                    }
                } else {
                    $message = "Sorry, your file is too large.";
                    return $message;
                }
            } else {
                $message = "File is not an image.";
                return $message;
            }
        } else {
            $message = 'Image file not selected';
            $sql = "UPDATE tbl_slider SET slider_name='$data[slider_name]',slider_status='$data[slider_status]' WHERE slider_id='$data[slider_id]'  ";
            mysql_query($sql);
        }
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

    public function select_result_by_student_id($student_id) {
        $sql = "SELECT * FROM tbl_result JOIN tbl_student on tbl_result.student_id=tbl_student.student_id ";
        $sql.="JOIN tbl_subject on tbl_result.subject_id=tbl_subject.subject_id ";
        $sql.="JOIN tbl_class on tbl_result.class_id=tbl_class.class_id ";
        $sql.= " WHERE tbl_result.student_id='$student_id' ";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_all_class() {
        $sql = "SELECT * FROM tbl_class";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function select_student_by_class($class_id) {
        $sql = "SELECT * FROM tbl_student As s,tbl_class As c WHERE s.class_id=c.class_id AND c.class_id='$class_id' ";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function published_class($id) {
        $sql = "UPDATE tbl_class SET class_status='1' WHERE class_id='$id'";
        mysql_query($sql);
        header('Location:manage_class.php');
    }

    public function unpublished_class($id) {
        $sql = "UPDATE tbl_slider SET class_status='0' WHERE class_id='$id'";
        mysql_query($sql);
        header('Location:manage_class.php');
    }

    public function delete_class($id) {
        $sql = "DELETE FROM tbl_class WHERE class_id='$id'";
        mysql_query($sql);
        header('Location:manage_class.php');
    }

    public function select_class_info_by_id($class_id) {
        $sql = "SELECT * FROM tbl_class WHERE class_id='$class_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_class_info($data) {
        $sql = "UPDATE tbl_class SET class_name='$data[class_name]' WHERE class_id='$data[class_id]'";
        mysql_query($sql);
        header('Location:manage_class.php');
    }

    public function published_subject($id) {
        $sql = "UPDATE tbl_subject SET subject_status='1' WHERE subject_id='$id'";
        mysql_query($sql);
        header('Location:manage_subject.php');
    }

    public function unpublished_subject($id) {
        $sql = "UPDATE tbl_subject SET subject_status='0' WHERE subject_id='$id'";
        mysql_query($sql);
        header('Location:manage_subject.php');
    }

    public function delete_subject($id) {
        $sql = "DELETE FROM tbl_subject WHERE subject_id='$id'";
        mysql_query($sql);
        header('Location:manage_subject.php');
    }

    public function select_subject_info_by_id($subject_id) {
        $sql = "SELECT * FROM tbl_subject WHERE subject_id='$subject_id'";
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function update_subject_info($data) {
        $sql = "UPDATE tbl_subject SET subject_name='$data[subject_name]',subject_code='$data[subject_code]' WHERE subject_id='$data[subject_id]'";
        mysql_query($sql);
        header('Location:manage_subject.php');
    }

    public function select_subject_by_class($class_id) {
        $sql = "SELECT * FROM tbl_subject where class_id=" . $class_id;
        $query_result = mysql_query($sql);
        return $query_result;
    }

    public function save_class_info($data) {
        $sql = "INSERT INTO tbl_class (class_name) VALUES"
                . "('$data[class_name]')";
        if (!mysql_query($sql)) {
            die('SQL Error:' . mysql_error());
        } else {
            $_SESSION['message'] = 'Save Successfully !';
        }
    }

    public function save_subject_info($data) {
        $sql = "INSERT INTO tbl_subject (subject_name,subject_code,class_id) VALUES"
                . "('$data[subject_name]','$data[subject_code]','$data[class_id]')";
        if (!mysql_query($sql)) {
            die('SQL Error:' . mysql_error());
        } else {
            $_SESSION['message'] = 'Save Successfully !';
        }
    }

    public function save_result_info($data) {
        $sql = "INSERT INTO tbl_result (student_id,class_id,subject_id,marks,result_status) VALUES"
                . "('$data[student_id]','$data[class_id]','$data[subject_id]','$data[marks]','$data[result_status]')";
        if (!mysql_query($sql)) {
            die('SQL Error:' . mysql_error());
        } else {
            $_SESSION['message'] = 'Save Successfully !';
        }
    }
}