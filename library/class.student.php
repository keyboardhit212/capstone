<?php

class Student {

	private $db;
	private $account;
	
	public function Student() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function login($username, $password) {
		$encryptedPassword = md5($password);
		$sql = "SELECT * FROM `tbl_user` INNER JOIN `tbl_student` ON tbl_user.user_id = tbl_student.student_id WHERE tbl_user.user_username = '$username' AND tbl_user.user_password = '$encryptedPassword' AND tbl_user.user_category_type = '2' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		$count = $result->num_rows;
		if($count == 1) {
			$_SESSION['user_id'] = $fetch['user_id'];
			$_SESSION['account_type'] = $fetch['user_category_type'];
			 return true;
		}
		else {
			if($this->check_account($username, $password)) {
				$this->insert_initial_student($username, $encryptedPassword);
				$this->register_student($username, $encryptedPassword);
				$result = $this->db->query($sql);
				$fetch = mysqli_fetch_assoc($result);
				$_SESSION['user_id'] = $fetch['user_id'];
				$_SESSION['account_type'] = $fetch['user_category_type'];
				return true;
			}
			else {
				return false;
			}
		}
	}
	
	
	public function check_account($username, $password) {
			$ch = curl_init("students.usls.edu.ph/login.cfm");
			curl_setopt_array($ch,
				array(
					CURLOPT_POSTFIELDS => 'username='.$username.'&password='.$password,
					CURLOPT_HEADER => 0,
					CURLOPT_FOLLOWLOCATION => 0,
					CURLOPT_RETURNTRANSFER => 1
				)
			);
			$result = curl_exec($ch);
			return !$result;
	}
	
	
	
	public function insert_initial_student($username, $password) {
		$sql = "INSERT INTO `tbl_user` (`user_username`,`user_password`,`user_date_added`,`user_time_added`,`user_date_updated`,`user_time_updated`,`user_category_type`,`user_pic`) VALUES ('$username','$password',NOW(),NOW(),NOW(),NOW(),'2','../images/genericpic.png')";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function register_student($username, $password) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_username` = '$username' AND `user_password` = '$password' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		$sql = "INSERT INTO `tbl_student` (`student_id`,`student_id_num`) VALUES ('".$fetch['user_id']."','".$fetch['user_username']."')";
		$result = $this->db->query($sql);
	}
	
	/*-----------------------------------------------------UPDATES--------------------------------------------------*/
	
	public function update_college($college, $id) {
		$sql = "UPDATE `tbl_student` SET `college_id` = '$college' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	public function update_course($course, $id) {
		$sql = "UPDATE `tbl_student` SET `course_id` = '$course' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	public function update_specialization($specialization, $id) {
		$sql = "UPDATE `tbl_student` SET `specialization_id` = '$specialization' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	public function update_profession($profession, $id) {
		$sql = "UPDATE `tbl_student` SET `profession_id` = '$profession' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	public function update_industry($industry, $id) {
		$sql = "UPDATE `tbl_student` SET `industry_id` = '$industry' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	public function update_video($video, $id) {
		$sql = "UPDATE `tbl_student` SET `student_video` = '$video' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	public function update_skype($skype, $id) {
		$sql = "UPDATE `tbl_student` SET `student_skype_name` = '$skype' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	public function update_email($email, $id) {
		$sql = "UPDATE `tbl_student` SET `student_email` = '$email' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	public function update_phone($phone, $id) {
		$sql = "UPDATE `tbl_student` SET `student_phone` = '$phone' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		if($result) {
			return true;
		}	
		else {
			return false;
		}
	}
	
	
	
	/*------------------------------------------------------------------GETTERS----------------------------------------------------------*/
	
	public function get_phone($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['student_phone'];
	}
	
	public function get_email($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['student_email'];
	}
	
	public function get_video($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['student_video'];
	}
	
	public function get_profession($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['profession_id'];
	}
	
	public function get_college($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['college_id'];
	}
	
	public function get_course($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['course_id'];
	}
	
	public function get_specialization($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['specialization_id'];
	}
	
	public function get_industry($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['industry_id'];
	}
	
	public function get_skype($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['student_skype_name'];
	}
	
	
//Request and Block

	public function approve($id) {
		$sql = "UPDATE `tbl_student` SET `student_status` = '1' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function achiever($id) {
		$sql = "UPDATE `tbl_student` SET `student_achiever` = '1' WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function block($stud_id,$admin_id) {
		$sql = "INSERT INTO `tbl_block_account` (`account_id`,`administrator_id`,`account_block_date`,`account_block_time`) 
		VALUES ('$stud_id','$admin_id',NOW(),NOW())";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function unblock($id) {
		$sql = "DELETE FROM `tbl_block_account` WHERE `account_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	//Boolean and stuffs
	
	public function isAchiever($id) {
		$sql = "SELECT * FROM `tbl_student` WHERE `student_id` = '$id' AND `student_achiever` = '1' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		$count = $result->num_rows;
		if($count > 0) {
			return true;
		}
		return false;
	}
	

}