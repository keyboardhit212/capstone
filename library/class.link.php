<?php

class Link {
	
	private $db;
	
	public function Link() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function update_link($link, $id) {
		$this->delete_link($id);
		$exploded_link = explode(", ",$link);
		foreach($exploded_link as $links) {
			$sql = "INSERT INTO `tbl_link` (`student_id`,`link`) VALUES ('$id','$links')";
			$result = $this->db->query($sql);
		}
	}
	
	public function delete_link($id) {
		$sql = "DELETE FROM `tbl_link` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		if($result) {
			return true;
		}
		else {
			return false;
		}
	}
	
	public function get_link($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_link` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			array_push($array,$row['link']);
		}
		return implode(", ",$array);
	}
	
}