<?php

class Search {
	
	private $db;
	
	public function Search() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function student_search($keyword, $skills, $status, $sort, $location) {
		$array = array();
		if($status == 1 && ($keyword != '' OR $skills != '' OR $location != '')) {
			if($keyword != '' && $skills != '') {
				if($sort != 'DESC') {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_job_skill.skill LIKE '%$skills%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name ";
				}
				else {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_job_skill.skill LIKE '%$skills%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name DESC ";
				}
			}
			else if($keyword != '' && $skills != '' && $location != '') {
				if($sort != 'DESC') {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_job_skill.skill LIKE '%$skills%' AND tbl_job.job_location LIKE '%$location%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name ";
				}
				else {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_job_skill.skill LIKE '%$skills%' AND tbl_job.job_status = '1' AND tbl_job.job_location LIKE '%$location% ORDER BY tbl_profession.profession_name DESC ";
				}
			}
			else if($keyword == '' && $skills == '' && $location != '') {
				if($sort != 'DESC') {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_job.job_location LIKE '%$location%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name ";
				}
				else {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_job.job_status = '1' AND tbl_job.job_location LIKE '%$location% ORDER BY tbl_profession.profession_name DESC ";
				}
			}
			else if($keyword == '' && $skills != '' && $location != '') {
				if($sort != 'DESC') {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_job_skill.skill LIKE '%$skills%' AND tbl_job.job_location LIKE '%$location%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name ";
				}
				else {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_job_skill.skill LIKE '%$skills%' AND tbl_job.job_location LIKE '%$location%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name DESC ";
				}
			}
			else if($keyword != '' && $location != '' && $skills == '') {
				if($sort != 'DESC') {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_job.job_location LIKE '%$location%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name ";
				}
				else {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_job.job_location LIKE '%$location%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name DESC ";
				}
			}
			else {
				if($sort != 'DESC') {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_job_skill.skill LIKE '$skills%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name ";
				}
				else {
					$sql = "SELECT DISTINCT tbl_job.job_id FROM tbl_profession INNER JOIN tbl_job ON tbl_profession.profession_id = tbl_job.profession_id INNER JOIN tbl_job_skill ON tbl_job_skill.job_id = tbl_job.job_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_job_skill.skill LIKE '$skills%' AND tbl_job.job_status = '1' ORDER BY tbl_profession.profession_name DESC ";
				}
				
			}
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = array('job_id'=>$row['job_id']);
			}
		}
		return $array;
	}
	
	public function student_results($keyword, $skills) {
		if($keyword != '' && $skills != '') {
			$sql = "SELECT `job_id` FROM `tbl_job` WHERE `profession_id` = '$keyword' AND `job_status` = '1' UNION SELECT `job_id` FROM `tbl_job_skill` WHERE `skill` LIKE '%$skills%' ";
		}
		else {
			$sql = "SELECT `job_id` FROM `tbl_job` WHERE `profession_id` = '$keyword' AND `job_status` = '1' UNION SELECT `job_id` FROM `tbl_job_skill` WHERE `skill` LIKE '$skills' ";
		}
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		return array('result'=>$result->num_rows,'total'=>$this->student_total_results());
	}
	
	public function student_total_results() {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_status` = '1' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		return $result->num_rows;
	}
	
	/*public function employer_search($keyword, $skills, $status) {
		$array = array();
		if($status == 1) {
			if($keyword != '' && $skills != '') {
				$sql = "SELECT `student_id` FROM `tbl_student` WHERE `profession_id` = '$keyword' UNION SELECT `resume_id` FROM `tbl_skill` WHERE `skill` LIKE '%$skills%' ";
			}
			else {
				$sql = "SELECT `student_id` FROM `tbl_student` WHERE `profession_id` = '$keyword' UNION SELECT `resume_id` FROM `tbl_skill` WHERE `skill` LIKE '$skills' ";
			}
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = array('student_id'=>$row['student_id']);
			}
		}
		return $array;
	}*/
	
	public function employer_search($keyword, $skills, $status, $sort) {
		$array = array();
		if($status == 1 && ($keyword != '' OR $skills != '')) {
			if($keyword != '' && $skills != '') {
				if($sort != 'DESC') {
					$sql = "SELECT DISTINCT * FROM tbl_student INNER JOIN tbl_profession ON tbl_student.profession_id = tbl_profession.profession_id INNER JOIN tbl_skill ON tbl_skill.resume_id = tbl_student.student_id INNER JOIN tbl_user ON tbl_student.student_id = tbl_user.user_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_skill.skill LIKE '%$skills%' GROUP BY `student_id` ORDER BY tbl_user.user_fname";
				}
				else {
					$sql = "SELECT DISTINCT * FROM tbl_student INNER JOIN tbl_profession ON tbl_student.profession_id = tbl_profession.profession_id INNER JOIN tbl_skill ON tbl_skill.resume_id = tbl_student.student_id INNER JOIN tbl_user ON tbl_student.student_id = tbl_user.user_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_skill.skill LIKE '%$skills%' GROUP BY `student_id` ORDER BY tbl_user.user_fname DESC";
				}
			}
			else {
				if($sort != 'DESC') {
					$sql = "SELECT DISTINCT * FROM tbl_student INNER JOIN tbl_profession ON tbl_student.profession_id = tbl_profession.profession_id INNER JOIN tbl_skill ON tbl_skill.resume_id = tbl_student.student_id INNER JOIN tbl_user ON tbl_student.student_id = tbl_user.user_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_skill.skill LIKE '$skills%' GROUP BY `student_id` ORDER BY tbl_user.user_fname";
				}
				else {
					$sql = "SELECT DISTINCT * FROM tbl_student INNER JOIN tbl_profession ON tbl_student.profession_id = tbl_profession.profession_id INNER JOIN tbl_skill ON tbl_skill.resume_id = tbl_student.student_id INNER JOIN tbl_user ON tbl_student.student_id = tbl_user.user_id WHERE tbl_profession.profession_name LIKE '$keyword%' AND tbl_skill.skill LIKE '$skills%' GROUP BY `student_id` ORDER BY tbl_user.user_fname DESC";
				}
			}
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
			while($row = mysqli_fetch_assoc($result)) {
				$array[] = array('student_id'=>$row['student_id']);
			}
		}
		return $array;
	}
	
	public function employer_results($keyword, $skills) {
		$array = array();
		if($keyword != '' && $skills != '') {
			$sql = "SELECT `student_id` FROM `tbl_student` WHERE `profession_id` = '$keyword' UNION SELECT `resume_id` FROM `tbl_skill` WHERE `skill` LIKE '%$skills%' ";
		}
		else {
			$sql = "SELECT `student_id` FROM `tbl_student` WHERE `profession_id` = '$keyword' UNION SELECT `resume_id` FROM `tbl_skill` WHERE `skill` LIKE '$skills' ";
		}
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		$array = array('result'=>$result->num_rows, 'total'=>$this->employer_total_results());
		return $array;
	}
	
	public function employer_total_results() {
		$sql = "SELECT * FROM `tbl_student`";
		$result = $this->db->query($sql);
		return $result->num_rows;
	}
	
	public function admin_search($keyword,$sort) {
		$array = array();
		if($sort != 'DESC') {
			$sql = "SELECT * FROM `tbl_user` WHERE (`user_fname` LIKE '$keyword%' OR `user_mname` LIKE '$keyword%' OR `user_lname` LIKE '$keyword%') AND 
		(`user_category_type` = '2' OR `user_category_type` = '3') ORDER BY `user_fname` ";
		}
		else {
			$sql = "SELECT * FROM `tbl_user` WHERE (`user_fname` LIKE '$keyword%' OR `user_mname` LIKE '$keyword%' OR `user_lname` LIKE '$keyword%') AND 
		(`user_category_type` = '2' OR `user_category_type` = '3') ORDER BY `user_fname` DESC ";
		}
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('user_id'=>$row['user_id'],'user_category_type'=>$row['user_category_type']);
		}
		return $array;
	}
	
	
	/*----------------------------------------------------------------------LOGIN PAGE SEARCH-------------------------------------*/
	
	public function student_job_search($keyword) {
		$sql = "SELECT DISTINCT * FROM `tbl_job` INNER JOIN `tbl_profession` ON `tbl_job`.profession_id = `tbl_profession`.profession_id WHERE `tbl_profession`.profession_name = '$keyword'";
		$result = $this->db->query($sql);
		return $result->num_rows;
	}
	
	public function employer_applicant_search($keyword) {
		$sql = "SELECT DISTINCT * FROM `tbl_student` INNER JOIN `tbl_profession` ON `tbl_student`.profession_id = `tbl_profession`.profession_id WHERE `tbl_profession`.profession_name = '$keyword' ";
		$result = $this->db->query($sql);
		return $result->num_rows;
	}
}