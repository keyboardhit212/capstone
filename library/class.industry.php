<?php

class Industry {

	private $db;
	
	public function Industry() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_all_industry() {
		$sql = "SELECT * FROM `tbl_industry`";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[]  = array('industry_id'=>$row['industry_id'], 'industry_name'=>$row['industry_name']);
		}
		return $array;
	}
	
	public function get_industry_name($id) {
		$sql = "SELECT * FROM `tbl_industry` WHERE `industry_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['industry_name'];
	}
}