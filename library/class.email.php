<?php

class Email {
	
	private $db;
	
	public function Email() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}	
	
	public function update_email($email, $id) {
		$this->delete_email($id);
		$sql = "INSERT INTO `tbl_email` (`email`,`user_id`) VALUES ('$email','$id')";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function delete_email($id) {
		$sql = "DELETE FROM `tbl_email` WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true
		}
		else {
			return false;
		}
	}

}