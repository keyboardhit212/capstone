<?php

class Skill {
		
	private $db;	
		
	public function Skill() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function update_skill($skill,$id) {
		$this->delete_skill($id);
		$exploded_skill = explode(", ",$skill);
		foreach($exploded_skill as $skills) {
			$sql = "INSERT INTO `tbl_skill` (`resume_id`,`skill`) VALUES ('$id','$skills') ";
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
		}
	}
	
	public function delete_skill($id) {
		$sql = "DELETE FROM `tbl_skill` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		if($result) {
			return true;
		}
		else {
			return true;
		}
	}
	
	public function get_skill($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_skill` WHERE `resume_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			array_push($array,$row['skill']);
		}
		return implode(", ",$array);
	}


}