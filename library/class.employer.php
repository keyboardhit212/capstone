<?php
 
class Employer {
	
	private $db;
	
	public function Employer() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function insert_initial_employer($fname, $mname, $lname, $username, $password) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_fname` = '$fname' AND `user_mname` = '$mname' AND `user_lname` = '$lname' AND `user_username` = '$username' AND `user_password` = '$password' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if(!$count == 1) {
			$sql = "INSERT INTO `tbl_user` (`user_fname`,`user_mname`,`user_lname`,`user_username`,`user_password`,`user_date_added`,`user_time_added`,`user_date_updated`,`user_time_updated`,`user_category_type`,`user_pic`) 
			VALUES ('$fname','$mname','$lname','$username','$password',NOW(),NOW(),NOW(),NOW(),'3','../images/genericpic.png')";
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
			if($result) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
	}
	
	public function register_employer($username, $password, $email, $phone) {
		$sql = "SELECT * FROM `tbl_user` WHERE `user_username` = '$username' AND `user_password` = '$password' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		$fetch = mysqli_fetch_assoc($result);
		$sql = "INSERT INTO `tbl_employer` (`employer_id`,`employer_email`,`employer_phone`) VALUES ('".$fetch['user_id']."','$email','$phone')";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	/*---------------------------------------------UPDATES-------------------------------------------------*/
	
	public function update_email($email, $id) {
		$sql = "UPDATE `tbl_employer` SET `employer_email` = '$email' WHERE `employer_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_phone($phone, $id) {
		$sql = "UPDATE `tbl_employer` SET `employer_phone` = '$phone' WHERE `employer_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_skype($skype, $id) {
		$sql = "UPDATE `tbl_employer` SET `employer_skype_name` = '$skype' WHERE `employer_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	
	/*------------------------------------------GETTERS-------------------------------------------------*/
	
	public function get_phone($id) {
		$sql = "SELECT * FROM `tbl_employer` WHERE `employer_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['employer_phone'];
	}
	
	public function get_email($id) {
		$sql = "SELECT * FROM `tbl_employer` WHERE `employer_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['employer_email'];
	}
	
	public function get_skype($id) {
		$sql = "SELECT * FROM `tbl_employer` WHERE `employer_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['employer_skype_name'];
	}

//Requests and block

	public function approve($id) {
		$sql = "UPDATE `tbl_employer` SET `employer_status` = '1' WHERE `employer_id` = '$id' ";
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
	
}