<?php

class Course {
	
	private $db;
	
	public function Course() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_all_course($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_course` WHERE `college_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('course_id'=>$row['course_id'], 'college_id'=>$row['college_id'], 'course_name'=>$row['course_name']);
		}
		return $array;
	}
	
	public function get_course_name($id) {
		$sql = "SELECT * FROM `tbl_course` WHERE `course_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['course_name'];
	}

}