<?php

class Applicant {

	private $db;
	
	public function Applicant() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	
	
	public function apply($job_id,$student_id) {
		$sql = "SELECT * FROM `tbl_applicant` WHERE `job_id` = '$job_id' AND `student_id` = '$student_id' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		$count = $result->num_rows;
		if($count == 0) {
			$sql = "INSERT INTO `tbl_applicant` (`job_id`,`student_id`) VALUES ('$job_id','$student_id')";
			$result = $this->db->query($sql);
			return $result;
		}
	}
	
	
	//Delete
	
	public function delete_applicant($job_id,$student_id) {
		$sql = "DELETE FROM `tbl_applicant` WHERE `job_id` = '$job_id' AND `student_id` = '$student_id'";
		$result = $this->db->query($sql);
		return $result;
	}
	
	//Getters
	
	public function get_approved_job($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_applicant` WHERE `student_id` = '$id' AND `applicant_status` = '1' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('job_id'=>$row['job_id'],'applicant_date_approved'=>$row['applicant_date_approved'],'applicant_time_approved'=>$row['applicant_time_approved']);
		}
		return $array;
	}
	
	public function get_job_approval($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_applicant` WHERE `student_id` = '$id' AND `applicant_status` = '1' AND `applicant_reply` = '0' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('job_id'=>$row['job_id'],'applicant_date_approved'=>$row['applicant_date_approved'],'applicant_time_approved'=>$row['applicant_time_approved']);
		}
		return $array;
	}
	
	public function get_applicant($id) {
		$array = array();
		$sql = "SELECT tbl_job.job_id,tbl_applicant.student_id,tbl_applicant.applicant_status FROM `tbl_job` INNER JOIN `tbl_applicant` ON tbl_applicant.job_id=tbl_job.job_id WHERE tbl_job.employer_id = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[]= array('job_id'=>$row['job_id'],'student_id'=>$row['student_id'],'status'=>$row['applicant_status']);
		}
		return $array;
	}
	
	public function get_approved_applicant($id) {
		$array = array();
		$sql = "SELECT tbl_job.job_id,tbl_applicant.student_id,tbl_applicant.applicant_status FROM `tbl_job` INNER JOIN `tbl_applicant` ON tbl_applicant.job_id=tbl_job.job_id WHERE tbl_job.employer_id = '$id' AND tbl_applicant.applicant_status = '1' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[]= array('job_id'=>$row['job_id'],'student_id'=>$row['student_id'],'status'=>$row['applicant_status']);
		}
		return $array;
	}
	
	public function get_applied_job($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_applicant` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('job_id'=>$row['job_id'],'status'=>$row['applicant_status']);
		}
		return $array;
	}
	
	
	//Updates
	public function update_applicant_status($stud_id,$job_id) {
		$sql = "UPDATE `tbl_applicant` SET `applicant_status` = '1', `applicant_date_approved`=NOW(), `applicant_time_approved`=NOW() WHERE `job_id` = '$job_id' AND `student_id` = '$stud_id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_job_approval($job_id, $id) {
		$sql = "UPDATE `tbl_applicant` SET `applicant_reply` = '1' WHERE `job_id` = '$job_id' AND `student_id` = '$id' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		return $result;
	}
	
	/*--------------------------------------------------------BOOLEAN--------------------------------------------*/
	
	public function is_approved($job_id, $stud_id) {
		$sql = "SELECT * FROM `tbl_applicant` WHERE `job_id` = '$job_id' AND `student_id` = '$stud_id' AND `applicant_status` = '1' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function is_applicant($job_id,$stud_id) {
		$sql = "SELECT * FROM `tbl_applicant` WHERE `job_id` = '$job_id' AND `student_id` = '$stud_id' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count > 0) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function is_company_applicant($employer_id, $stud_id) {
		$sql = "SELECT * FROM `tbl_job` INNER JOIN `tbl_applicant` ON tbl_job.job_id = tbl_applicant.job_id WHERE 
		tbl_job.employer_id = '$employer_id' AND tbl_applicant.student_id = '$stud_id' ";
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