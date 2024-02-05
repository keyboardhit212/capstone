<?php

class Notification {
	
	private $db;
	
	public function Notification() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function notify($to,$from,$desc) {
		$sql = "INSERT INTO `tbl_notification` (`user_id`,`notification_notifier`,`notification_description`,`notification_date_added`,`notification_time_added`,`notification_status`) 
		VALUES ('$to','$from','$desc',NOW(),NOW(),'0')";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function notify_priority($to,$from,$desc) {
		$sql = "INSERT INTO `tbl_notification` (`user_id`,`notification_notifier`,`notification_description`,`notification_date_added`,`notification_time_added`,`notification_status`,`notification_level`) 
		VALUES ('$to','$from','$desc',NOW(),NOW(),'0','1')";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function get_notification($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_notification` WHERE `user_id` = '$id' ORDER BY `notification_date_added`,`notification_time_added` DESC";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('notification_notifier'=>$row['notification_notifier'],'notification_description'=>$row['notification_description'],'notification_date_added'=>$row['notification_date_added'],'notification_time_added'=>$row['notification_time_added']);
		}
		return $array;
	}
	
	public function get_prioritized_notification($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_notification` WHERE `user_id` = '$id' AND `notification_level` = '1' ORDER BY `notification_date_added`,`notification_time_added` DESC";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('notification_notifier'=>$row['notification_notifier'],'notification_description'=>$row['notification_description'],'notification_date_added'=>$row['notification_date_added'],'notification_time_added'=>$row['notification_time_added']);
		}
		return $array;
	}
	
	public function delete_notification($id,$date,$time) {
		$sql = "DELETE FROM `tbl_notification` WHERE `user_id` = '$id' AND `notification_date_added` = '$date' AND `notification_time_added` = '$time' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	
	//Getters
	public function get_pending_request() {
		$array = array();
		$sql = "SELECT `student_status` FROM `tbl_student` WHERE `student_status` = '0' UNION ALL SELECT `employer_status` FROM `tbl_employer` WHERE `employer_status` = '0' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		$array[] = array('pending_request'=>$count);
		return $array;
	}
	
	public function notification_count($id) {
		$sql = "SELECT * FROM `tbl_notification` WHERE `user_id` = '$id' AND `notification_status` = '0' ";
		$result = $this->db->query($sql);
		return $result->num_rows;
	}
	
	public function clear($id) {
		$sql = "UPDATE `tbl_notification` SET `notification_status` = '1' WHERE `user_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	
	
}