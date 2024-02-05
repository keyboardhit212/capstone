<?php

class Reference {
	
	private $db;
	
	public function Reference() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function add_reference($url,$company,$contact,$email,$fname,$mname,$lname,$pic,$id) {
		$sql = "INSERT INTO `tbl_reference` (`student_id`,`reference_url`,`reference_company`,`reference_contact`,`reference_pic`,`reference_email`,`reference_fname`,`reference_mname`,`reference_lname`) 
		VALUES ('$id','$url','$company','$contact','$pic','$email','$fname','$mname','$lname')";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
	}
	
	public function get_references($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_reference` WHERE `student_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('reference_url'=>$row['reference_url'], 'reference_company'=>$row['reference_company'], 'reference_contact'=>$row['reference_contact'], 'reference_pic'=>$row['reference_pic'], 'reference_email'=>$row['reference_email'], 'reference_fname'=>$row['reference_fname'], 'reference_mname'=>$row['reference_mname'], 'reference_lname'=>$row['reference_lname'], 'reference_id'=>$row['reference_id']);
		}
		return $array;
	}
	
	public function delete_reference($id) {
		$sql = "DELETE FROM `tbl_reference` WHERE `reference_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
}