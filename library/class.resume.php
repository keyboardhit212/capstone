<?php

class Resume {
	
	private $db;
	
	public function Resume() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	//Nevermind
	public function insert_objective($id) {
		$sql = "INSERT INTO `tbl_resume` (`resume_id`) VALUES ('$id') ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return true;
		}
	}
	
	public function update_objective($objective, $id) {
		$sql = "SELECT * FROM `tbl_resume` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count == 0) {
			$this->insert_objective($id);
		}
		$sql = "UPDATE `tbl_resume` SET `resume_objective` = '$objective' WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return true;
		}
	}
	
	public function update_interest($interest, $id) {
		$this->delete_interest($id);
		$exploded_interest = explode(", ",$interest);
		foreach($exploded_interest as $interests) {
			$sql = "INSERT INTO `tbl_interest` (`resume_id`,`interest`) VALUES ('$id','$interests')";
			$result = $this->db->query($sql);
		}
	}
	
	public function update_achievement($achievement, $id) {
		$this->delete_achievement($id);
		$exploded_achievement = explode(", ",$achievement);
		foreach($exploded_achievement as $achievements) {
			$sql = "INSERT INTO `tbl_achievement` (`resume_id`,`achievement`) VALUES ('$id','$achievements') ";
			$result = $this->db->query($sql);
		}
	}
	
	public function update_experience($experience, $id) {
		$this->delete_experience($id);
		$exploded_experience = explode(", ", $experience);
		foreach($exploded_experience as $experiences) {
			$sql = "INSERT INTO `tbl_experience` (`resume_id`,`experience`) VALUES ('$id','$experiences')";
			$result = $this->db->query($sql);
		}
	}
	
	
	
	/*-------------------------------------------------------------DELETE-----------------------------------*/
	//Nevermind this thing
	public function delete_interest($id) {
		$sql = "DELETE FROM `tbl_interest` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return true;
		}
	}
	

	public function delete_achievement($id) {
		$sql = "DELETE FROM `tbl_achievement` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return true;
		}
	}
	
	
	
	public function delete_experience($id) {
		$sql = "DELETE FROM `tbl_experience` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	//To Here... Don't mind this
	
	//Getters
	
	public function get_objective($id) {
		$sql = "SELECT `resume_objective` FROM `tbl_resume` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['resume_objective'];
	}
	
	public function get_interest($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_interest` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			array_push($array,$row['interest']);
		}
		return implode(", ",$array);
	}
	
	public function get_achievement($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_achievement` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			array_push($array,$row['achievement']);
		}
		return implode(", ",$array);
	}
	
	public function get_experience($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_experience` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			array_push($array,$row['experience']);
		}
		return implode(", ",$array);
	}

}