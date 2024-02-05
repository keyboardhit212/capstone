<?php

class Block {
	
	private $db;
	
	public function Block() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_students() {
		$array = array();
		$sql = "SELECT `student_id` AS `user_id` FROM `tbl_student` INNER JOIN `tbl_block_account` ON tbl_block_account.account_id=tbl_student.student_id";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('user_id'=>$row['user_id']);
		}
		return $array;
	}

	public function get_employers() {
		$array = array();
		$sql = "SELECT `employer_id` AS `user_id` FROM `tbl_employer` INNER JOIN `tbl_block_account` ON tbl_block_account.account_id=tbl_employer.employer_id;";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('user_id'=>$row['user_id']);
		}
		return $array;
	}		
	
	public function unblock($id) {
		$sql = "DELETE FROM `tbl_block_account` WHERE `account_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function block_account($account_id, $admin_id) {
		$sql = "INSERT INTO `tbl_block_account` (`account_id`,`administrator_id`,`account_block_date`,`account_block_time`) VALUES ('$account_id', '$admin_id', NOW(), NOW())";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function check($id) {
		$sql = "SELECT * FROM `tbl_block_account` WHERE `account_id` = '$id' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count == 1) {
			return true;
		}
		return false;
	}
	
}