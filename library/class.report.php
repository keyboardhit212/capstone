<?php

class Report {
	
	private $db;
	
	public function Report() {
		$this->db = new mysqli(HOST, USER, PASS, DB);
	}
	
	public function employer_report($mode, $date) {
		$array = array();
		if($mode == "daily") {
			$sql = "SELECT tbl_employer.employer_id,tbl_job.job_id,COUNT(tbl_applicant.student_id) AS `applicant` FROM tbl_employer INNER JOIN tbl_job ON tbl_employer.employer_id = tbl_job.employer_id INNER JOIN tbl_applicant ON tbl_job.job_id = tbl_applicant.job_id WHERE tbl_applicant.applicant_status = '1' AND `job_date_added` = '$date' GROUP BY `tbl_employer`.employer_id ORDER BY `applicant` DESC";
		}
		else if($mode == "monthly") {
			$sql = "SELECT tbl_employer.employer_id,tbl_job.job_id,COUNT(tbl_applicant.student_id) AS `applicant` FROM tbl_employer INNER JOIN tbl_job ON tbl_employer.employer_id = tbl_job.employer_id INNER JOIN tbl_applicant ON tbl_job.job_id = tbl_applicant.job_id WHERE tbl_applicant.applicant_status = '1' AND `job_date_added` BETWEEN '$date-01' AND '$date-31' GROUP BY `tbl_employer`.employer_id ORDER BY `applicant` DESC";
		}
		else if($mode == "yearly") {
			$sql = "SELECT tbl_employer.employer_id,tbl_job.job_id,COUNT(tbl_applicant.student_id) AS `applicant` FROM tbl_employer INNER JOIN tbl_job ON tbl_employer.employer_id = tbl_job.employer_id INNER JOIN tbl_applicant ON tbl_job.job_id = tbl_applicant.job_id WHERE tbl_applicant.applicant_status = '1' AND `job_date_added` BETWEEN '$date-01-01' AND '$date-12-31' GROUP BY `tbl_employer`.employer_id ORDER BY `applicant` DESC";
		}
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('employer_id'=>$row['employer_id'],'jobs'=>$row['applicant']);
		}
		return $array;
	}
	
	public function industry_report($mode, $date) {
		$array = array();
		if($mode == "daily") {
			$sql = "SELECT tbl_industry.industry_id, COUNT(tbl_job.industry_id) AS industry FROM tbl_industry LEFT JOIN `tbl_job` ON tbl_industry.industry_id = tbl_job.industry_id WHERE `job_date_added` = '$date' ORDER BY `industry` DESC";
		}
		else if($mode == "monthly") {
			$sql = "SELECT tbl_industry.industry_id, COUNT(tbl_job.industry_id) AS industry FROM tbl_industry LEFT JOIN `tbl_job` ON tbl_industry.industry_id = tbl_job.industry_id WHERE `job_date_added` BETWEEN '$date-01' AND '$date-31' ORDER BY `industry` DESC ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT tbl_industry.industry_id, COUNT(tbl_job.industry_id) AS industry FROM tbl_industry LEFT JOIN `tbl_job` ON tbl_industry.industry_id = tbl_job.industry_id WHERE `job_date_added` BETWEEN '$date-01-01' AND '$date-12-31' ORDER BY `industry` DESC ";
		}
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('industry_id'=>$row['industry_id'], 'industry'=>$row['industry']);
		}
		return $array;
	}
	
	public function job_report($mode, $date) {
		$array = array();
		if($mode == "daily") {
			$sql = "SELECT tbl_profession.profession_id,COUNT(tbl_job.job_id) AS `job`  FROM tbl_profession LEFT JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id WHERE tbl_job.job_date_added = '$date' GROUP BY tbl_profession.profession_id ORDER BY `job` DESC ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT tbl_profession.profession_id,COUNT(tbl_job.job_id) AS `job`  FROM tbl_profession LEFT JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id WHERE tbl_job.job_date_added BETWEEN '$date-01' AND '$date-31' GROUP BY tbl_profession.profession_id ORDER BY `job` DESC";
		}
		else if($mode == "yearly") {
			$sql = "SELECT tbl_profession.profession_id,COUNT(tbl_job.job_id) AS `job`  FROM tbl_profession LEFT JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id WHERE tbl_job.job_date_added BETWEEN '$date-01-01' AND '$date-12-31' GROUP BY tbl_profession.profession_id ORDER BY `job` DESC ";
		}
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('profession_id'=>$row['profession_id'],'job'=>$row['job']);
		}
		return $array;
	}
	
	public function account_report($mode, $date) {
		$array[] = array('registered_students'=>$this->get_registered_students($mode, $date), 
		'registered_employers'=>$this->get_registered_employers($mode, $date), 
		'active_students'=>$this->get_active_students($mode, $date), 
		'active_employers'=>$this->get_active_employers($mode, $date), 
		'blocked_students'=>$this->get_blocked_students($mode, $date), 
		'blocked_employers'=>$this->get_blocked_employers($mode, $date), 
		'total_users'=>$this->get_total_users($mode, $date),
		'student_achiever'=>$this->get_student_achievers($mode, $date),
		'active_users'=>$this->get_active_users($mode, $date), 
		'inactive_users'=>$this->get_inactive_users($mode, $date),
		'hired_student'=>$this->get_hired_student($mode, $date),
		'job_posted'=>$this->get_job_posted($mode, $date));
		return $array;
	}
	
	
	//Getters
	public function get_registered_students($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(`user_id`) AS `students` FROM `tbl_user` WHERE `user_category_type` = '2' AND `user_date_added` = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(`user_id`) AS `students` FROM `tbl_user` WHERE `user_category_type` = '2' AND `user_date_added` BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(`user_id`) AS `students` FROM `tbl_user` WHERE `user_category_type` = '2' AND `user_date_added` BETWEEN '$date-01-01' AND '$date-12-31'  ";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['students'];
	}
	
	public function get_registered_employers($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(`user_id`) AS employers FROM `tbl_user` WHERE `user_category_type` = '3' AND `user_date_added` = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(`user_id`) AS employers FROM `tbl_user` WHERE `user_category_type` = '3' AND `user_date_added` BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(`user_id`) AS employers FROM `tbl_user` WHERE `user_category_type` = '3' AND `user_date_added` BETWEEN '$date-01-01' AND '$date-12-31' ";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['employers'];
	}
	
	public function get_active_students($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS students FROM tbl_user INNER JOIN tbl_student ON tbl_user.user_id = tbl_student.student_id WHERE tbl_student.student_status = 1 AND tbl_user.user_category_type = 2 AND tbl_user.user_date_added = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS students FROM tbl_user INNER JOIN tbl_student ON tbl_user.user_id = tbl_student.student_id WHERE tbl_student.student_status = 1 AND tbl_user.user_category_type = 2 AND tbl_user.user_date_added BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS students FROM tbl_user INNER JOIN tbl_student ON tbl_user.user_id = tbl_student.student_id WHERE tbl_student.student_status = 1 AND tbl_user.user_category_type = 2 AND tbl_user.user_date_added BETWEEN '$date-01-01' AND '$date-12-31' ";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['students'];
	}
	
	public function get_active_employers($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS employers FROM tbl_user INNER JOIN tbl_employer ON tbl_user.user_id = tbl_employer.employer_id WHERE tbl_employer.employer_status = 1 AND tbl_user.user_category_type = 3 AND tbl_user.user_date_added = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS employers FROM tbl_user INNER JOIN tbl_employer ON tbl_user.user_id = tbl_employer.employer_id WHERE tbl_employer.employer_status = 1 AND tbl_user.user_category_type = 3 AND tbl_user.user_date_added BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS employers FROM tbl_user INNER JOIN tbl_employer ON tbl_user.user_id = tbl_employer.employer_id WHERE tbl_employer.employer_status = 1 AND tbl_user.user_category_type = 3 AND tbl_user.user_date_added BETWEEN '$date-01-01' AND '$date-12-31' ";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['employers'];
	}
	
	public function get_blocked_students($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS students FROM tbl_user INNER JOIN tbl_block_account ON tbl_user.user_id = tbl_block_account.account_id WHERE tbl_user.user_category_type = 2 AND tbl_block_account.account_block_date = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS students FROM tbl_user INNER JOIN tbl_block_account ON tbl_user.user_id = tbl_block_account.account_id WHERE tbl_user.user_category_type = 2 AND tbl_block_account.account_block_date BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS students FROM tbl_user INNER JOIN tbl_block_account ON tbl_user.user_id = tbl_block_account.account_id WHERE tbl_user.user_category_type = 2 AND tbl_block_account.account_block_date BETWEEN '$date-01-01' AND '$date-12-31' ";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['students'];
	}
	
	public function get_blocked_employers($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS `employers` FROM tbl_user INNER JOIN tbl_block_account ON tbl_user.user_id = tbl_block_account.account_id WHERE tbl_user.user_category_type = 3 AND tbl_block_account.account_block_date = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS `employers` FROM tbl_user INNER JOIN tbl_block_account ON tbl_user.user_id = tbl_block_account.account_id WHERE tbl_user.user_category_type = 3 AND tbl_block_account.account_block_date BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(tbl_user.user_id) AS `employers` FROM tbl_user INNER JOIN tbl_block_account ON tbl_user.user_id = tbl_block_account.account_id WHERE tbl_user.user_category_type = 3 AND tbl_block_account.account_block_date BETWEEN '$date-01-01' AND '$date-12-31' ";
		}
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['employers'];
	}
	
	public function get_total_users($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(user_id) AS `total` FROM `tbl_user` WHERE `user_date_added` = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(user_id) AS `total` FROM `tbl_user` WHERE `user_date_added` BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(user_id) AS `total` FROM `tbl_user` WHERE `user_date_added` BETWEEN '$date-01-01' AND '$date-12-31' ";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['total'];
	}
	
	public function get_student_achievers($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(tbl_user.user_id) as `student` FROM tbl_user JOIN tbl_student ON tbl_user.user_id = tbl_student.student_id WHERE tbl_user.user_date_added = '$date' AND tbl_student.student_achiever = 1;";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(tbl_user.user_id) as `student` FROM tbl_user JOIN tbl_student ON tbl_user.user_id = tbl_student.student_id WHERE tbl_user.user_date_added BETWEEN '$date-01' AND '$date-31' AND tbl_student.student_achiever = 1;";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(tbl_user.user_id) as `student` FROM tbl_user JOIN tbl_student ON tbl_user.user_id = tbl_student.student_id WHERE tbl_user.user_date_added BETWEEN '$date-01-01' AND '$date-12-31' AND tbl_student.student_achiever = 1;";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['student'];
	}
	
	public function get_active_users($mode, $date) {
		return $this->get_active_students($mode, $date) + $this->get_active_employers($mode, $date);
	}
	
	public function get_inactive_users($mode, $date) {
		return $this->get_total_users($mode, $date) - $this->get_active_users($mode, $date);
	}
	
	public function get_hired_student($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(`student_id`) AS `hired` FROM `tbl_applicant` WHERE `applicant_status` = '1' AND `applicant_date_approved` = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(`student_id`) AS `hired` FROM `tbl_applicant` WHERE `applicant_status` = '1' AND `applicant_date_approved` BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(`student_id`) AS `hired` FROM `tbl_applicant` WHERE `applicant_status` = '1' AND `applicant_date_approved` BETWEEN '$date-01-01' AND '$date-12-31' ";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['hired'];
	}
	
	public function get_job_posted($mode, $date) {
		if($mode == "daily") {
			$sql = "SELECT COUNT(`job_id`) AS `jobs` FROM `tbl_job` WHERE `job_date_added` = '$date' ";
		}
		else if($mode == "monthly") {
			$sql = "SELECT COUNT(`job_id`) AS `jobs` FROM `tbl_job` WHERE `job_date_added` BETWEEN '$date-01' AND '$date-31' ";
		}
		else if($mode == "yearly") {
			$sql = "SELECT COUNT(`job_id`) AS `jobs` FROM `tbl_job` WHERE `job_date_added` BETWEEN '$date-01-01' AND '$date-12-31' ";
		}
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['jobs'];
	}
	
	
	
	
	
	
	
	
}