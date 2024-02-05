USE db_usls;

/*---------------------------------------------COLLEGE----------------------------------------------------*/

INSERT INTO `tbl_college` (`college_name`) VALUES ('College of Arts and Sciences'),('College of Business and Accountancy'),('College of Engineering and Technology'),('College of Nursing'),('College of Education');


/*--------------------------------------------COURSE---------------------------------------------------------*/

INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10001','Bachelor of Arts in Communication');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10001','Bachelor of Arts in Interdisciplinary Studies');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10001','Bachelor of Arts in Political Science');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10001','Bachelor of Arts in Psychology');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10005','Bachelor of Elementary Education');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10005','Bachelor of Secondary Education');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10001','Bachelor of Science in Biology');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10003','Bachelor of Science in Computer Science');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10003','Bachelor of Science in Information Technology');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10001','Bachelor of Science in Psychology');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10002','Bachelor of Science in Accountancy');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10002','Bachelor of Science in Agribusiness');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10002','Bachelor of Science in Entrepreneurship');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10002','Bachelor of Science in Hospitality Management');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10002','Bachelor of Science in Management Accounting');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10002','Bachelor of Science in Business Administration');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10003','Bachelor of Science in Chemical Engineering');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10003','Bachelor of Science in Computer Engineering');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10003','Bachelor of Science in Electrical Engineering');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10003','Bachelor of Science in Electronics Engineering');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10003','Bachelor of Science in Materials Engineering');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10002','Bachelor of Science in Food Technology');
INSERT INTO `tbl_course` (`college_id`,`course_name`) VALUES ('10004','Bachelor of Science in Nursing');

/*---------------------------------------------SPECIALIZATION---------------------------------------------------------------*/

INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10001','Education');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10001','Call Center Operations');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10001','Hospitality Management');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10002','Interdisciplinary Studies');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10003','International Studies');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10004','Psychology');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10005','General Education');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10005','Special Education');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10005','Early Childhood Education');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10006','English');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10006','MAPEH');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10006','Mathematics');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10006','Social Studies');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10006','Physical Science');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10007','Biology');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10008','Game Development');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10009','Computer Animation');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10009','Web and Mobile Development');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10010','Marketing');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10010','Human Resource Management');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10011','Bookkeeping');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10012','Agribusiness');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10013','Entrepreneurship');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10014','Hotel Management');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10014','Travel and Tours Management');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10014','Culinary Arts');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10015','Bookkeeping');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10016','Business Economics');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10016','Marketing Management');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10016','Marketing Management and Entrepreneurship');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10016','Operations Management');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10016','Operations Management and Human Resource Management');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10017','Chemical Engineering');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10018','Computer Engineering');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10019','Electrical Engineering');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10020','Electronics Engineering');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10021','Materials Engineering');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10022','Food Technology');
INSERT INTO `tbl_specialization` (`course_id`,`specialization_name`) VALUES ('10023','Nursing');



