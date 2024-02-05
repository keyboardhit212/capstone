<?php

class Job {
	
	private $db;
	
	public function Job() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function insert_job($employer, $industry, $profession, $salary, $description, $skill, $req, $location) {
		$sql = "INSERT INTO `tbl_job` (`employer_id`,`industry_id`,`profession_id`,`job_salary`,`job_description`,`job_date_added`,`job_time_added`, `job_requirement`, `job_location`) 
		VALUES ('$employer','$industry','$profession','$salary','$description',NOW(),NOW(), '$req', '$location')";
		$result = $this->db->query($sql);
		$this->insert_skill($skill, $this->db->insert_id);
		return $result;
	}
	
	public function insert_skill($skill, $id) {
		$this->delete_skill($id);
		$exploded_skill = explode(", ",$skill);
		foreach ($exploded_skill as $skills) {
			$sql = "INSERT INTO `tbl_job_skill` (`job_id`,`skill`) VALUES ('$id','$skills')";
			$result = $this->db->query($sql);
		}
	}
	
	/*--------------------------------------------------MISC-----------------------------------------------------------------*/
	
	public function close($id) {
		$sql = "UPDATE `tbl_job` SET `job_status` = '0', `job_date_closed` = NOW(), `job_time_closed` = NOW() WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	/*---------------------------------------------------DELETE-----------------------------------------------------------*/
	
	public function delete_skill($id) {
		$sql = "DELETE FROM `tbl_job_skill` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function delete_job($id) {
		$sql = "DELETE FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$this->delete_skill($id);
		return $result;
	}
	
	/*------------------------------------------------GETTERS------------------------------------------------------------*/
	
	public function get_job_list($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `employer_id` = '$id' AND `job_status` = '1' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		$count = $result->num_rows;
		if($count != 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$array[] = array('job_id'=>$row['job_id'], 'employer_id'=>$row['employer_id'], 'profession_id'=>$row['profession_id']);
			}
			return $array;
		}
		else {
			return array();
		}
	}
	
	public function get_profession_id($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['profession_id'];
	}
	
	public function get_industry_id($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['industry_id'];
	}
	
	public function get_salary($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['job_salary'];
	}
	
	public function get_description($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['job_description'];
	}
	
	public function get_status($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['job_status'];
	}
	
	public function get_employer_id($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['employer_id'];
	}
	
	public function get_skill($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_job_skill` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($array,$row['skill']);
		}
		return implode(", ",$array);
	}
	
	public function get_location($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['job_location'];
	}
	
	public function get_date_added($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['job_date_added'];
	}
	
	/*------------------------------------------------------UPDATES-----------------------------------------------*/
	
	public function update_industry($id, $industry) {
		$sql = "UPDATE `tbl_job` SET `industry_id` = '$industry' WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_profession($id, $profession) {
		$sql = "UPDATE `tbl_job` SET `profession_id` = '$profession' WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_skill($id, $skill) {
		$this->delete_skill($id);
		$this->insert_skill($skill, $id);
	}
	
	public function update_description($id, $description) {
		$sql = "UPDATE `tbl_job` SET `job_description` = '$description' WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_salary($id, $salary) {
		$sql = "UPDATE `tbl_job` SET `job_salary` = '$salary' WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_requirement($id, $requirement) {
		$sql = "UPDATE `tbl_job` SET `job_requirement` = '$requirement' WHERE `job_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	/*---------------------------------------------BOOLEANS-------------------------------------------*/
	
	public function is_required($id) {
		$sql = "SELECT * FROM `tbl_job` WHERE `job_id` = '$id' AND `job_requirement` = '1' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count > 0) {
			return true;
		}
		return false;
	}
}