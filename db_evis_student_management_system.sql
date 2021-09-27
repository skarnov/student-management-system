-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- হোষ্ট: localhost
-- তৈরী করতে ব্যবহৃত সময়: জান 15, 2017 at 02:03 PM
-- সার্ভার সংস্করন: 10.1.10-MariaDB
-- পিএইছপির সংস্করন: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- ডাটাবেইজ: `db_evis_student_management_system`
--

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(2) NOT NULL,
  `about_us` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(1) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `admin_activation_status` tinyint(1) NOT NULL DEFAULT '0',
  `admin_access_level` tinyint(1) NOT NULL DEFAULT '0',
  `admin_create_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_activation_status`, `admin_access_level`, `admin_create_date_time`) VALUES
(1, 'Admin', 'admin@evis.com', '96e79218965eb72c92a549dd5a330112', 1, 2, '2017-01-14 07:33:20'),
(2, 'Sheikh Obydullah', 'admin@me.com', '56942512', 0, 1, '2017-01-14 08:59:53');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_class`
--

CREATE TABLE `tbl_class` (
  `class_id` int(2) NOT NULL,
  `class_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_class`
--

INSERT INTO `tbl_class` (`class_id`, `class_name`) VALUES
(1, 'One'),
(2, 'Two'),
(3, 'Three'),
(4, 'Four'),
(5, 'Five'),
(6, 'Six'),
(7, 'Seven'),
(8, 'Eight'),
(9, 'Nine'),
(10, 'Ten');

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(3) NOT NULL,
  `event_title` varchar(60) NOT NULL,
  `event_main` text NOT NULL,
  `event_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_title`, `event_main`, `event_status`) VALUES
(1, 'Parents Meeting', '2nd Parents Meeting will be held on 12-02-2017', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_id` int(3) NOT NULL,
  `gallery_image` varchar(100) NOT NULL,
  `gallery_image_2` varchar(100) NOT NULL,
  `gallery_image_3` varchar(100) NOT NULL,
  `gallery_image_4` varchar(100) NOT NULL,
  `gallery_image_5` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(4) NOT NULL,
  `news_title` varchar(60) NOT NULL,
  `news_main` text NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `news_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_main`, `news_image`, `news_status`) VALUES
(1, 'Test Exam Final Result', 'Test Exam 2017 result has been declared today at 2 PM. The results of all subjects have been declared.', '../news_images/Exam Hall.jpg', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_notice`
--

CREATE TABLE `tbl_notice` (
  `notice_id` int(4) NOT NULL,
  `notice_title` varchar(60) NOT NULL,
  `notice_main` text NOT NULL,
  `notice_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notice_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_notice`
--

INSERT INTO `tbl_notice` (`notice_id`, `notice_title`, `notice_main`, `notice_time`, `notice_status`) VALUES
(1, 'Test Exam 2017', 'Test Exam for 2018 will be held on 12-10-2017', '2017-01-14 16:54:15', 1),
(2, 'Registration Process', '(1) Your completed and signed registration form.\r\n<br>(2) Four recent passport-size photographs (not more than 3 month old).\r\n<br>(3) A copy of your statement of entry or results sheet. (If you have appeared for any\r\nIGCSE / A level exams before).\r\n<br>(4) Money deposit slip of Standard Chartered Bank (British Council copy)<br>(5) A clear Photocopy of your valid international passport', '2017-01-14 17:48:31', 1),
(3, 'About Class Start', 'Class will be start on First January', '2017-01-14 17:50:22', 1),
(4, 'Result Published Date', 'Result will be published on 20th&nbsp;December', '2017-01-14 17:50:49', 1),
(5, 'Class Routine For Class Eight', 'Class Routine', '2017-01-15 15:35:34', 1),
(6, 'Parents Meeting ', 'Parents Meeting start on 6th June', '2017-01-15 15:57:52', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_result`
--

CREATE TABLE `tbl_result` (
  `result_id` int(10) NOT NULL,
  `student_id` int(2) NOT NULL,
  `class_id` int(2) NOT NULL,
  `subject_id` int(2) NOT NULL,
  `marks` varchar(2) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `result_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_result`
--

INSERT INTO `tbl_result` (`result_id`, `student_id`, `class_id`, `subject_id`, `marks`, `grade`, `result_status`) VALUES
(1, 1, 10, 1, '64', '', 1),
(2, 1, 10, 2, '74', '', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `setting_id` int(3) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `institute_name` varchar(20) NOT NULL,
  `institution_image` varchar(200) NOT NULL,
  `about_institution` text NOT NULL,
  `headmaster_image` varchar(200) NOT NULL,
  `headmaster_message` text NOT NULL,
  `president_image` varchar(200) NOT NULL,
  `president_message` text NOT NULL,
  `copyright` text NOT NULL,
  `facebook_page` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(2) NOT NULL,
  `slider_name` varchar(20) NOT NULL,
  `slider_image` varchar(200) NOT NULL,
  `slider_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_image`, `slider_status`) VALUES
(1, 'School View', '../slider_images/Slide 1.jpg', 1),
(2, 'Science Building', '../slider_images/Slide 2.jpg', 1),
(3, 'Students', '../slider_images/Slide 3.jpg', 1),
(4, 'Top Students', '../slider_images/Slide 4.jpg', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(5) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `class_id` int(2) NOT NULL,
  `student_roll` varchar(15) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_password` varchar(32) NOT NULL,
  `student_image` varchar(200) NOT NULL,
  `student_address` text NOT NULL,
  `student_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `student_name`, `class_id`, `student_roll`, `student_email`, `student_password`, `student_image`, `student_address`, `student_status`) VALUES
(1, 'Kohinul Katun', 10, '10112345019', 'kader_234@gmail.com', '111111', '../student_images/Student.jpg', 'House No: 13, Road No: 01, Block A, Baridhara, Dhaka, Bangladesh', 1);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(2) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `class_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_name`, `subject_code`, `class_id`) VALUES
(1, 'Bangla Part I', 'BAN 101', 10),
(2, 'Bangla Part II', 'BAN 102', 10);

-- --------------------------------------------------------

--
-- টেবলের জন্য টেবলের গঠন `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(3) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_description` text NOT NULL,
  `teacher_join_date` date NOT NULL,
  `teacher_email` varchar(50) NOT NULL,
  `teacher_password` varchar(32) NOT NULL,
  `teacher_confirm_password` varchar(32) NOT NULL,
  `teacher_image` varchar(100) NOT NULL,
  `teacher_designation` text NOT NULL,
  `teacher_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- টেবলের জন্য তথ্য স্তুপ করছি `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `teacher_name`, `teacher_description`, `teacher_join_date`, `teacher_email`, `teacher_password`, `teacher_confirm_password`, `teacher_image`, `teacher_designation`, `teacher_status`) VALUES
(1, 'Laila Bilkis', '<b>Magura Bangladesh</b>', '1999-01-07', 'bilkis_banu@gmail.com', '111111', '', '../teacher_images/Teacher.jpg', 'Senior Math Teacher', 1);

--
-- স্তুপকৃত টেবলের ইনডেক্স
--

--
-- টেবিলের ইনডেক্সসমুহ `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`class_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_notice`
--
ALTER TABLE `tbl_notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`result_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- টেবিলের ইনডেক্সসমুহ `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- স্তুপকৃত টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT)
--

--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(2) NOT NULL AUTO_INCREMENT;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `class_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_notice`
--
ALTER TABLE `tbl_notice`
  MODIFY `notice_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `result_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `setting_id` int(3) NOT NULL AUTO_INCREMENT;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- টেবলের জন্য স্বয়ক্রীয় বর্দ্ধিত মান (AUTO_INCREMENT) `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
