<?php

class College {
	
	private $db;
	
	public function College() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_all_college() {
		$sql = "SELECT * FROM `tbl_college`";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('college_id'=>$row['college_id'], 'college_name'=>$row['college_name']);
		}
		return $array;
	}
	
	public function get_college_name($id) {
		$sql = "SELECT * FROM `tbl_college` WHERE `college_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['college_name'];
	}

}