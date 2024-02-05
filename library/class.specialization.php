<?php

class Specialization {
	
	private $db;
	
	public function Specialization() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_all_specialization($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_specialization` WHERE `course_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('specialization_id'=>$row['specialization_id'], 'course_id'=>$row['course_id'], 'specialization_name'=>$row['specialization_name']);
		}
		return $array;
	}
	
	public function get_specialization_name($id) {
		$sql = "SELECT * FROM `tbl_specialization` WHERE `specialization_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['specialization_name'];
	}
	
}