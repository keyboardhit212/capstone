<?php

class Credential {

	private $db;

	public function Credential() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function insert_credential($title, $url, $id, $type) {
		$sql = "SELECT * FROM `tbl_certificate` WHERE `certificate_title` = '$title' AND `certificate_url` = '$url' AND `student_id` = '$id' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count == 0) {
			$sql = "INSERT INTO `tbl_certificate` (`student_id`,`certificate_url`,`certificate_title`,`certificate_date_added`,`certificate_time_added`,`certificate_type`) VALUES ('$id','$url','$title',NOW(),NOW(),'$type')";
			$result = $this->db->query($sql);
		}
	}
	
	public function get_credentials($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_certificate` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('title'=>$row['certificate_title'], 'certificate_url'=>$row['certificate_url'], 'certificate_date_added'=>$row['certificate_date_added'], 'certificate_time_added'=>$row['certificate_time_added'],'certificate_type'=>$row['certificate_type']);
		}
		return $array;
	}
	
	public function delete_credential($id, $date, $time) {
		$sql = "DELETE FROM `tbl_certificate` WHERE `student_id` = '$id' AND `certificate_date_added` = '$date' AND `certificate_time_added` = '$time' ";
		$result = $this->db->query($sql);
		return $result;
	}
}