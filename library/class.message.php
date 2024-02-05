<?php

class Message {

	private $db;
	
	public function Message() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function send_message($to,$from,$message) {
		$sql = "INSERT INTO `tbl_message` (`message_to`,`message_from`,`message`,`message_date_sent`,`message_time_sent`,`message_date_received`,`message_time_received`,`message_status`) VALUES
		('$to','$from','$message',NOW(),NOW(),NOW(),NOW(),'0')";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function get_message($to,$from) {
		$array = array();
		$sql = "SELECT * FROM `tbl_message` WHERE `message_to` = '$to' AND `message_from` = '$from' UNION ALL SELECT * FROM `tbl_message` WHERE `message_to` = '$from' AND `message_from` = '$to' ORDER BY `message_date_sent`,`message_time_sent`";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('message_from'=>$row['message_from'],'message'=>$row['message'],'message_date_received'=>$row['message_date_received'],'message_time_received'=>$row['message_time_received']);
		}
		return $array;
	}
	
	public function has_message($to, $from) {
		$sql = "SELECT * FROM `tbl_message` WHERE `message_to` = '$to' AND `message_from` = '$from' ";
		$result = $this->db->query($sql);
		$count = $result->num_rows;
		if($count > 0) {
			return true;
		}
		return false;
	}
	
	public function get_chatmate($from) {
		$array = array();
		$sql = "SELECT `message_to` FROM `tbl_message` WHERE `message_from` = '$from' UNION SELECT `message_from` FROM `tbl_message` WHERE `message_to` = '$from' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = array('message_to'=>$row['message_to']);
		}
		return $array;
	}
	
	public function message_count($id) {
		$sql = "SELECT * FROM `tbl_message` WHERE `message_to` = '$id' AND `message_status` = '0' ";
		$result = $this->db->query($sql);
		return $result->num_rows;
	}
	
	public function clear($id) {
		$sql = "UPDATE `tbl_message` SET `message_status` = 1 WHERE `message_to` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}

}