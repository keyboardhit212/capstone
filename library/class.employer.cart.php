<?php

class EmployerCart {

	private $db;
	
	public function EmployerCart() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_saved_student($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_employer_cart` WHERE `employer_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('student_id'=>$row['student_id']);
		}
		return $array;
	}
	
	public function add_student($stud_id, $emp_id) {
		$sql = "INSERT INTO `tbl_employer_cart` (`employer_id`,`student_id`) VALUES ('$emp_id','$stud_id') ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	//Boolean
	
	public function is_saved($stud_id, $emp_id) {
		$sql = "SELECT * FROM `tbl_employer_cart` WHERE `employer_id` = '$emp_id' AND `student_id` = '$stud_id' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function delete($emp_id, $stud_id) {
		$sql = "DELETE FROM `tbl_employer_cart` WHERE `employer_id` = '$emp_id' AND `student_id` = '$stud_id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	
}