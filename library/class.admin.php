<?php

class Administrator {
	
		private $db;
		
		public function Administrator() {
			$this->db = new mysqli(HOST,USER,PASS,DB);
		}
		
		public function insert_initial_admin($fname,$mname,$lname,$username,$password,$gender,$pic,$birthdate) {
			$sql = "INSERT INTO `tbl_user` (`user_fname`,`user_mname`,`user_lname`,`user_username`,`user_password`,`user_date_added`,`user_time_added`,`user_date_updated`,`user_time_updated`,`user_category_type`,`user_gender`,`user_pic`,`user_birthdate`) 
			VALUES ('$fname','$mname','$lname','$username','$password',NOW(),NOW(),NOW(),NOW(),'1','$gender','../images/$pic','$birthdate')";
			$result = $this->db->query($sql);
			return $result;
		}
		
		public function register_admin($username,$password) {
			$sql = "SELECT * FROM `tbl_user` WHERE `user_username` = '$username' AND `user_password` = '$password' ";
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
			$fetch = mysqli_fetch_assoc($result);
			$sql = "INSERT INTO `tbl_administrator` (`administrator_id`) VALUES ('".$fetch['user_id']."')";
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
			return $result;
		}
}