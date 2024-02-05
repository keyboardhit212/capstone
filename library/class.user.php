<?php

class User {
	
	private $db;

	
	public function User() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function login($username, $password) {
		$student = new Student();
		$employer = new Employer();
		$encryptedPassword = md5($password);
		
		$sql = "SELECT * FROM `tbl_user` WHERE `user_username` = '$username' AND `user_password` = '$encryptedPassword' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		$count = $result->num_rows;
		//If Already Existing
		if($count == 1) {
			$_SESSION['account_type'] = $fetch['user_category_type'];
			$_SESSION['user_id'] = $fetch['user_id'];
			//Checks If Student
			if($fetch['user_category_type'] == 2) {
				$sql = "SELECT * FROM `tbl_user` INNER JOIN `tbl_student` ON `tbl_user`.user_id = `tbl_student`.student_id WHERE `tbl_user`.user_username = '$username' AND `tbl_student`.student_status = '1' ";
				$result = $this->db->query($sql);
				$fetch = mysqli_fetch_assoc($result);
				$count = $result->num_rows;
				if($count == 1) { //If Status is equal to 1
					$_SESSION['status'] = $fetch['student_status'];
					return true;
				}
				else {
					$_SESSION['status'] = 0;
					return false;
				}
			}
			//Checks For Employer
			else if($fetch['user_category_type'] == 3) {
				$sql = "SELECT * FROM `tbl_user` INNER JOIN `tbl_employer` ON `tbl_user`.user_id = `tbl_employer`.employer_id WHERE `tbl_user`.user_username = '$username' AND `tbl_employer`.employer_status = '1' ";
				$result = $this->db->query($sql);
				$fetch = mysqli_fetch_assoc($result);
				$count = $result->num_rows;
				if($count == 1) {
					$_SESSION['status'] = $fetch['employer_status'];
					return true;
				}
				else {
					$_SESSION['status'] = 0;
					return false;
				}
			}
		} //Checks Student Online
		else {
			if($student->login($username, $password)) {
				$result = $this->db->query($sql);
				$fetch = mysqli_fetch_assoc($result);
				$_SESSION['account_type'] = $fetch['user_category_type'];
				$_SESSION['status'] = 0;
				return true;
			}
			else {
				$_SESSION['account_type'] = 0;
				$_SESSION['user_id'] = 0;
				$_SESSION['status'] = 0;
				return false;
			}
		}
	}
	
	
	/*--------------------------------------------UPDATES--------------------------------------*/
	
	public function update_name($fname, $mname, $lname, $id) {
		$sql = "UPDATE `tbl_user` SET `user_fname` = '$fname', `user_mname` = '$mname', `user_lname` = '$lname' WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function update_birthdate($birthdate, $id) {
		$sql = "UPDATE `tbl_user` SET `user_birthdate` = '$birthdate' WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function update_age($id) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		$sql = "UPDATE `tbl_user` SET `user_age` =  (SELECT TIMESTAMPDIFF(YEAR,'".$fetch['user_birthdate']."',NOW()))";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function update_pic($pic, $id) {
		if(!$pic == '') {
			$sql = "UPDATE `tbl_user` SET `user_pic` = '../images/$pic' WHERE `user_id` = '$id' ";
			$result = $this->db->query($sql);
			return $result;
		}
	}
	
	public function update_gender($gender, $id) {
		$sql = "UPDATE `tbl_user` SET `user_gender` = '$gender' WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	
	/*---------------------------------------------------------GETTERS-----------------------------------------------------*/
	
	public function get_pic($id) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['user_pic'];
	}
	
	public function get_fname($id) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['user_fname'];
	}
	
	public function get_mname($id) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['user_mname'];
	}
	
	public function get_lname($id) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['user_lname'];
	}
	
	public function get_full_name($id) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['user_fname']." ".$fetch['user_mname']." ".$fetch['user_lname'];
	}
	
	public function get_birthdate($id) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['user_birthdate'];
	}
	
	public function get_gender($id) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['user_gender'];
	}
	
	public function get_student_pending() {
		$array = array();
		$sql = "SELECT `student_id`  AS `user_id` FROM `tbl_student` WHERE `student_status` = '0' ";
		$result = $this->db->query($sql);
		while($row =  mysqli_fetch_assoc($result)) {
			$array[] = array('user_id'=>$row['user_id']);
		}
		return $array;
	}
	
	public function get_employer_pending() {
		$array = array();
		$sql = "SELECT `employer_id`  AS `user_id` FROM `tbl_employer` WHERE `employer_status` = '0' ";
		$result = $this->db->query($sql);
		while($row =  mysqli_fetch_assoc($result)) {
			$array[] = array('user_id'=>$row['user_id']);
		}
		return $array;
	}
	
	public function get_approved_account() {
		$array = array();
		$sql = "SELECT *,`tbl_employer`.employer_status AS `status`,`tbl_student`.student_status AS `status` FROM `tbl_user` LEFT JOIN `tbl_employer` ON `tbl_user`.user_id = `tbl_employer`.employer_id LEFT JOIN `tbl_student` ON `tbl_user`.user_id = `tbl_student`.student_id WHERE tbl_employer.employer_status = 1 OR tbl_student.student_status=1";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('user_id'=>$row['user_id'],'type'=>$row['user_category_type']);
		}
		return $array;
	}
	
	public function get_approved_student() {
		$array = array();
		$sql = "SELECT * FROM `tbl_student` WHERE `student_status` = '1' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('student_id'=>$row['student_id']);
		}
		return $array;
	}
	
	public function get_approved_employer() {
		$array = array();
		$sql = "SELECT * FROM `tbl_employer` WHERE `employer_status` = '1' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('employer_id'=>$row['employer_id']);
		}
		return $array;
	}
	
	
}	