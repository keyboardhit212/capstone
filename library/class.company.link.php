<?php

class CompanyLink {

	private $db;
	
	public function CompanyLink() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_links($id) {
		$array[] = array('company_link'=>'');
		$sql =  "SELECT * FROM `tbl_company_link` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('company_link'=>$row['company_link']);
		}
		return $array;
	}
}