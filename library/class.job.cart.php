<?php

class JobCart {
	
	private $db;
	
	public function JobCart() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function save($job,$student) {
		$sql = "SELECT * FROM `tbl_job_cart` WHERE `job_id` = '$job' AND `student_id` = '$student' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count == 0) {
			$sql = "INSERT INTO `tbl_job_cart` (`job_id`,`job_date_added`,`job_time_added`,`student_id`) 
			VALUES ('$job',NOW(),NOW(),'$student')";
			$result = $this->db->query($sql);
			return $result;
		}
	}
	
	public function get_saved_job($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_job_cart` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('job_id'=>$row['job_id'],'job_date_added'=>$row['job_date_added'],'job_time_added'=>$row['job_time_added']);
		}
		return $array;
	}
	
	public function delete_saved_job($job_id,$stud_id) {
		$sql = "DELETE FROM `tbl_job_cart` WHERE `job_id` = '$job_id' AND `student_id` = '$stud_id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	/*-----------------------------------------------BOOLEANS----------------------------------*/
	
	public function is_saved($job_id,$stud_id) {
		$sql = "SELECT * FROM `tbl_job_cart` WHERE `job_id` = '$job_id' AND `student_id` = '$stud_id' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count > 0) {
			return true;
		}
		else {
			return false;
		}
	}
}