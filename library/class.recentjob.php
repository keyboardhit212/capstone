<?php

class RecentJob {
	
	private $db;
	
	public function RecentJob() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function get_jobs() {
		$array = array();
		$sql = "SELECT * FROM `tbl_job` ORDER BY `job_date_added` DESC LIMIT 10";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('profession_id'=>$row['profession_id'], 'employer_id'=>$row['employer_id'], 'industry_id'=>$row['industry_id']);
		}
		return $array;
	}
	
}