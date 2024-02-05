CREATE DATABASE db_usls;

USE db_usls;

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
	`user_id` int(7) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_fname` varchar(50) NOT NULL default '',
	`user_mname` varchar(50) NOT NULL default '',
	`user_lname` varchar(50) NOT NULL default '',
	`user_username` varchar(50) NOT NULL default '',
	`user_password` varchar(50) NOT NULL default '',
	`user_date_added` date NOT NULL default '0000-00-00',
	`user_time_added` time NOT NULL default '00:00:00',
	`user_date_updated` date NOT NULL default '0000-00-00',
	`user_time_updated` time NOT NULL default '00:00:00',
	`user_category_type` int(1) UNSIGNED NOT NULL default 0,
	`user_gender` int(1) UNSIGNED NOT NULL default 0,
	`user_age` int(2) UNSIGNED NOT NULL default 00,
	`user_pic` text NOT NULL,
	`user_birthdate` date NOT NULL default '0000-00-00',
	PRIMARY KEY (`user_id`),
	KEY (`user_category_type`,`user_gender`,`user_age`)
) ENGINE=MyISAM AUTO_INCREMENT=1000001;

/*
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
	`category_id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT,
	`category_type` varchar(50) NOT NULL default '',
	PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1;
*/

DROP TABLE IF EXISTS `tbl_link`;
CREATE TABLE `tbl_link` (
	`student_id` int(7) UNSIGNED NOT NULL default 0000000,
	`link` text NOT NULL,
	KEY (`student_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_message`;
CREATE TABLE `tbl_message` (
	`message_to` int(7) UNSIGNED NOT NULL default 0000000,
	`message_from` int(7) UNSIGNED NOT NULL default 0000000,
	`message` text NOT NULL,
	`message_date_sent` date NOT NULL default '0000-00-00',
	`message_time_sent` time NOT NULL default '00:00:00',
	`message_date_received` date NOT NULL default '0000-00-00',
	`message_time_received` time NOT NULL default '00:00:00',
	`message_status` int(1) UNSIGNED NOT NULL default 0,
	KEY (`message_to`,`message_from`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_notification`;
CREATE TABLE `tbl_notification` (
	`user_id` int(7) UNSIGNED NOT NULL default 0000000,
	`notification_notifier` int(7) UNSIGNED NOT NULL default 0000000,
	`notification_description` text NOT NULL,
	`notification_date_added` date NOT NULL default '0000-00-00',
	`notification_time_added` time NOT NULL default '00:00:00',
	`notification_status` int(1) UNSIGNED NOT NULL default 0,
	`notification_level` int(1) UNSIGNED NOT NULL default 0,
	KEY (`user_id`,`notification_notifier`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE `tbl_student` (
	`student_id` int(7) UNSIGNED NOT NULL default 0000000,
	`student_id_num` int(7) UNSIGNED NOT NULL default 0000000,
	`student_phone` varchar(50) NOT NULL default '',
	`student_video` text NOT NULL,
	`college_id` int(5) UNSIGNED NOT NULL default 00000,
	`course_id` int(5) UNSIGNED NOT NULL default 00000,
	`specialization_id` int(5) UNSIGNED NOT NULL default 00000,
	`profession_id` int(10) UNSIGNED NOT NULL default 0000000000,
	`industry_id` int(7) UNSIGNED NOT NULL default 0000000000,
	`student_status` int(1) UNSIGNED NOT NULL default 0,
	`student_achiever` int(1) UNSIGNED NOT NULL default 0,
	`student_skype_name` varchar(250) NOT NULL default '',
	`student_email` varchar(250) NOT NULL default '',
	KEY (`student_id`,`student_id_num`,`college_id`,`course_id`,`profession_id`,`industry_id`,`specialization_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_college`;
CREATE TABLE `tbl_college` (
	`college_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`college_name` varchar(250) NOT NULL default '',
	PRIMARY KEY (`college_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10001;

DROP TABLE IF EXISTS `tbl_course`;
CREATE TABLE `tbl_course` (
	`course_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`college_id` int(5) UNSIGNED NOT NULL default 00000,
	`course_name` varchar(250) NOT NULL default '',
	PRIMARY KEY (`course_id`),
	KEY (`college_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10001;


/* NOT YET NORMALIZED */
DROP TABLE IF EXISTS  `tbl_reference`;
CREATE TABLE `tbl_reference` (
	`reference_id` int(10) NOT NULL AUTO_INCREMENT,
	`student_id` int(7) UNSIGNED NOT NULL default 0000000,
	`reference_url` text NOT NULL,
	`reference_company` varchar(250) NOT NULL default '',
	`reference_contact` varchar(50) NOT NULL default '',
	`reference_pic` text NOT NULL,
	`reference_email` varchar(250) NOT NULL default '',
	`reference_fname` varchar(50) NOT NULL default '',
	`reference_mname` varchar(50) NOT NULL default '',
	`reference_lname` varchar(50) NOT NULL default '',
	PRIMARY KEY (`reference_id`),
	KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000000001;

DROP TABLE IF EXISTS `tbl_certificate`;
CREATE TABLE `tbl_certificate` (
	`certificate_id` int(10) NOT NULL AUTO_INCREMENT,
	`student_id` int(7) UNSIGNED NOT NULL default 0000000,
	`certificate_url` text NOT NULL,
	`certificate_title` varchar(50) NOT NULL default '',
	`certificate_date_added` date NOT NULL default '0000-00-00',
	`certificate_time_added` time NOT NULL default '00:00:00',
	`certificate_type` varchar(50) NOT NULL default '',
	PRIMARY KEY (`certificate_id`),
	KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000000001;

DROP TABLE IF EXISTS `tbl_document`;
CREATE TABLE `tbl_document` (
	`student_id` int(7) UNSIGNED NOT NULL default 0000000,
	`document_url` text NOT NULL,
	`document_title` varchar(250) NOT NULL default '',
	`document_type` varchar(50) NOT NULL default '',
	`document_date_added` date NOT NULL default '0000-00-00',
	`document_time_added` time NOT NULL default '00:00:00',
	KEY (`student_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_specialization`;
CREATE TABLE `tbl_specialization` (
	`specialization_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`course_id` int(5) UNSIGNED NOT NULL default 00000,
	`specialization_name` text NOT NULL,
	PRIMARY KEY (`specialization_id`),
	KEY (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10001;

DROP TABLE IF EXISTS `tbl_job_cart`;
CREATE TABLE `tbl_job_cart` (
	`job_id` int(10) UNSIGNED NOT NULL default 0000000000,
	`job_date_added` date NOT NULL default '0000-00-00',
	`job_time_added` time NOT NULL default '00:00:00',
	`student_id` int(7) UNSIGNED NOT NULL default 0000000,
	KEY (`job_id`,`student_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_resume`;
CREATE TABLE `tbl_resume` (
	`resume_id` int(7) UNSIGNED NOT NULL default 0000000,
	`resume_objective` text NOT NULL,
	KEY (`resume_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_achievement`;
CREATE TABLE `tbl_achievement` (
	`resume_id` int(7) UNSIGNED NOT NULL default 0000000,
	`achievement` text NOT NULL,
	KEY (`resume_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_interest`;
CREATE TABLE `tbl_interest` (
	`resume_id` int(7) UNSIGNED NOT NULL default 0000000,
	`interest` text NOT NULL,
	KEY (`resume_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_experience`;
CREATE TABLE `tbl_experience` (
	`resume_id` int(7) UNSIGNED NOT NULL default 0000000,
	`experience` text NOT NULL,
	KEY (`resume_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_skill`;
CREATE TABLE `tbl_skill` (
	`resume_id` int(7) UNSIGNED NOT NULL default 0000000,
	`skill` varchar(250) NOT NULL default '',
	KEY (`resume_id`)
) ENGINE=MyISAM;

/*
DROP TABLE IF EXISTS `tbl_education`;
CREATE TABLE `tbl_education` (
	`resume_id` int(7) UNSIGNED NOT NULL default 0000000,
	`education_year_started` year NOT NULL default '0000',
	`education_year_ended` year NOT NULL default '0000',
	`education_school` text NOT NULL,
	`level_id` varchar(5) NOT NULL default 00000,
	`course_id` int(5) UNSIGNED NOT NULL default 00000,
	`education_description` text NOT NULL,
	KEY (`resume_id`,`course_id`)
) ENGINE=MyISAM;


DROP TABLE IF EXISTS `tbl_education_level`;
CREATE TABLE `tbl_education_level` (
	`level_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`level_name` varchar(250) NOT NULL default '',
	PRIMARY KEY (`level_id`)
) ENGINE=MyISAM;
*/


DROP TABLE IF EXISTS `tbl_profession`;
CREATE TABLE `tbl_profession` (
	`profession_id` int(10) UNSIGNED NOT NULL  AUTO_INCREMENT,
	`profession_name` text NOT NULL,
	`industry_id` int(5) UNSIGNED NOT NULL default 0000000000,
	PRIMARY KEY (`profession_id`),
	KEY (`industry_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000000001;

DROP TABLE IF EXISTS `tbl_industry`;
CREATE TABLE `tbl_industry` (
	`industry_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT,
	`industry_name` varchar(250) NOT NULL default '',
	KEY (`industry_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10001;

DROP TABLE IF EXISTS `tbl_job_skill`;
CREATE TABLE `tbl_job_skill` (
	`job_id` int(10) UNSIGNED NOT NULL default 0000000000,
	`skill` varchar(250) NOT NULL default '',
	KEY (`job_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_job`;
CREATE TABLE `tbl_job` (
	`job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`employer_id` int(7) UNSIGNED NOT NULL default 0000000,
	`profession_id` int(10) UNSIGNED NOT NULL default 0000000000,
	`industry_id` int(5) UNSIGNED NOT NULL default 0000000000,
	`job_salary` float(12) UNSIGNED NOT NULL default 0000000000.00,
	`job_status` int(1) UNSIGNED NOT NULL default 1,
	`job_description` text NOT NULL,
	`job_date_added` date NOT NULL default '0000-00-00',
	`job_time_added` time NOT NULL default '00:00:00',
	`job_date_closed` date NOT NULL default '0000-00-00',
	`job_time_closed` time NOT NULL default '00:00:00',
	`job_location` text NOT NULL,
	`job_requirement` int(1) UNSIGNED NOT NULL default 0,
	PRIMARY KEY (`job_id`),
	KEY (`employer_id`,`profession_id`,`industry_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000000001;

DROP TABLE IF EXISTS `tbl_applicant`;
CREATE TABLE `tbl_applicant` (
	`job_id` int(10) UNSIGNED NOT NULL default 0000000000,
	`student_id` int(10) UNSIGNED NOT NULL default 0000000,
	`applicant_status` int(1) UNSIGNED NOT NULL default 0,
	`applicant_date_approved` date NOT NULL default '0000-00-00',
	`applicant_time_approved` time NOT NULL default '00:00:00',
	`applicant_reply` int(1) UNSIGNED NOT NULL default 0,
	KEY (`job_id`,`student_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_employer`;
CREATE TABLE `tbl_employer` (
	`employer_id` int(7) UNSIGNED NOT NULL default 0000000,
	`employer_skype_name` varchar(250) NOT NULL default '',
	`employer_email` varchar(250) NOT NULL default '',
	`employer_phone` varchar(50) NOT NULL default '',
	`employer_status` int(1) UNSIGNED NOT NULL default 0,
	KEY (`employer_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_company`;
CREATE TABLE `tbl_company` (
	`company_id` int(7) UNSIGNED NOT NULL default 0000000,
	`company_name` varchar(250) NOT NULl default 'Company Name',
	`company_email` varchar(250) NOT NULL default 'Company Email',
	`company_phone` varchar(50) NOT NULL default 'Company Phone',
	`company_pic` text NOT NULL,
	`company_description` text NOT NULL,
	`company_url` text NOT NULL,
	`company_address` text NOT NULL,
	PRIMARY KEY (`company_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_company_link`;
CREATE TABLE `tbl_company_link` (
	`company_id` int(7) NOT NULL default 0000000,
	`company_link` text NOT NULL,
	KEY (`company_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_administrator`;
CREATE TABLE `tbl_administrator` (
	`administrator_id` int(7) NOT NULL default 0000000,
	KEY (`administrator_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_block_account`;
CREATE TABLE `tbl_block_account` (
	`account_id` int(7) UNSIGNED NOT NULL default 0000000,
	`administrator_id` int(7) UNSIGNED NOT NULL default 0000000,
	`account_block_date` date NOT NULL default '0000-00-00',
	`account_block_time` time NOT NULL default '00:00:00',
	`account_block_status` int(1) UNSIGNED NOT NULL default 1,
	`account_unblock_date` date NOT NULL default '0000-00-00',
	`account_unblock_time` time NOT NULL default '00:00:00',
	KEY (`account_id`,`administrator_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_employer_cart`;
CREATE TABLE `tbl_employer_cart` (
	`employer_id` int(7) NOT NULL default 0000000,
	`student_id` int(7) NOT NULL default 0000000,
	KEY (`employer_id`,`student_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `tbl_bulletin`;
CREATE TABLE `tbl_bulletin` (
	`bulletin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`bulletin_what` text NOT NULL,
	`bulletin_when` date NOT NULL default '0000-00-00',
	`bulletin_where` text NOT NULL,
	`bulletin_description` text NOT NULL,
	`bulletin_date_added` date NOT NULL default '0000-00-00',
	`bulletin_time_added` time NOT NULL default '00:00:00',
	`bulletin_student` int(1) UNSIGNED NOT NULL default 0,
	`bulletin_employer` int(1) UNSIGNED NOT NULL default 0,
	`administrator_id` int(7) UNSIGNED NOT NULL,
	PRIMARY KEY(`bulletin_id`),
	KEY(`administrator_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1000000001;








