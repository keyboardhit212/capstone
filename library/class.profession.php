<?php

class Profession {
	
	private $db;
	
	public function Profession() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_all_profession($id) {
		$sql = "SELECT * FROM `tbl_profession` WHERE `industry_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('profession_id'=>$row['profession_id'], 'profession_name'=>$row['profession_name'], 'industry_id'=>$row['industry_id']);
		}
		return $array;
	}
	
	public function get_profession_name($id) {
		$sql = "SELECT * FROM `tbl_profession` WHERE `profession_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['profession_name'];
	}
	
	public function get_profession_id($profession) {
		$sql = "SELECT * FROM `tbl_profession` WHERE `profession_name` LIKE '%$profession%' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['profession_id'];
	}
	
}