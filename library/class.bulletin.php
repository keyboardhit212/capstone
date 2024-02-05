<?php

class Bulletin {

	private $db;

	public function Bulletin() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function create($student, $employer, $what, $where, $when, $description, $id) {
		$sql = "INSERT INTO `tbl_bulletin` (`bulletin_what`,`bulletin_when`,`bulletin_where`,`bulletin_description`,`bulletin_date_added`,`bulletin_time_added`,`administrator_id`,`bulletin_student`,`bulletin_employer`) 
		VALUES ('$what','$when','$where','$description',NOW(),NOW(),'$id','$student','$employer')";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		return $result;
	}
	
	public function get_all($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_bulletin` WHERE `administrator_id` = '$id'  ORDER BY `bulletin_date_added` DESC";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('what'=>$row['bulletin_what'],'when'=>$row['bulletin_when'],'where'=>$row['bulletin_where'],'description'=>$row['bulletin_description'],'date_added'=>$row['bulletin_date_added'],'time_added'=>$row['bulletin_time_added']);
		}
		return $array;
	}
	
	public function get_student_announcement() {
		$array = array();
		$sql = "SELECT * FROM `tbl_bulletin` WHERE `bulletin_student` = '1' ORDER BY `bulletin_date_added`";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('what'=>$row['bulletin_what'],'when'=>$row['bulletin_when'],'where'=>$row['bulletin_where'],'description'=>$row['bulletin_description'],'date_added'=>$row['bulletin_date_added'],'time_added'=>$row['bulletin_time_added']);
		}
		return $array;
	}
	
	public function get_employer_announcement() {
		$array = array();
		$sql = "SELECT * FROM `tbl_bulletin` WHERE `bulletin_employer` = '1' ORDER BY `bulletin_date_added`";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('what'=>$row['bulletin_what'],'when'=>$row['bulletin_when'],'where'=>$row['bulletin_where'],'description'=>$row['bulletin_description'],'date_added'=>$row['bulletin_date_added'],'time_added'=>$row['bulletin_time_added']);
		}
		return $array;
	}
	
	public function delete($date, $time, $id) {
		$sql = "DELETE FROM `tbl_bulletin` WHERE `bulletin_date_added` = '$date' AND `bulletin_time_added` = '$time' AND `administrator_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	
}