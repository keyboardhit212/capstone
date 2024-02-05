<?php

class EmployerLink() {

	private $db;
	
	public function CompanyLink() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_links($id) {
		$sql =  "SELECT * FROM `tbl_";
	}
	
}