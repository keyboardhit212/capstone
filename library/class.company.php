<?php

class Company {

	private $db;

	public function Company() {
		$this->db = new mysqli(HOST,USER,PASS,DB);
	}
	
	public function insert_company($id) {
		$sql = "SELECT * FROM `tbl_company` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql) or die(mysqli_error($this->db));
		$count = $result->num_rows;
		if($count == 0) {
			$sql = "INSERT INTO `tbl_company` (`company_id`,`company_name`,`company_email`,`company_phone`,`company_description`,`company_address`,`company_url`,`company_pic`) 
			VALUES ('$id','My Company','My Email','Phone Number','Description...','Address','Company URL','../images/genericpic.png')";
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
			if($result) {
				return true;
			}
			else {
				return false;
			}
		}
	}
	
	/*----------------------------------GETTERS----------------------------------*/
	
	public function get_name($id) {
		$sql = "SELECT * FROM `tbl_company` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['company_name'];
	}
	
	public function get_pic($id) {
		$sql = "SELECT * FROM `tbl_company` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['company_pic'];
	}
	
	public function get_description($id) {
		$sql = "SELECT * FROM `tbl_company` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['company_description'];
	}
	
	public function get_address($id) {
		$sql = "SELECT * FROM `tbl_company` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['company_address'];
	}
	
	public function get_url($id) {
		$sql = "SELECT * FROM `tbl_company` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['company_url'];
	}
	
	public function get_email($id) {
		$sql = "SELECT * FROM `tbl_company` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['company_email'];
	}
	
	public function get_phone($id) {
		$sql = "SELECT * FROM `tbl_company` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		$fetch = mysqli_fetch_assoc($result);
		return $fetch['company_phone'];
	}
	
	
	public function get_link($id) {
		$array = array();
		$sql = "SELECT * FROM `tbl_company_link` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$array[] = $row['company_link'];
		}
		return implode(", ",$array);
	}
	/*--------------------------------------------------------------UPDATES--------------------------------------------*/
	
	public function update_name($name, $id) {
		$sql = "UPDATE `tbl_company` SET `company_name` = '$name' WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_pic($pic, $id) {
		if(!$pic == '') {
			$sql = "UPDATE `tbl_company` SET `company_pic` = '../images/$pic' WHERE `company_id` = '$id' ";
			$result = $this->db->query($sql) or die(mysqli_error($this->db));
			return $result;
		}
	}
	
	public function update_address($address, $id) {
		$sql = "UPDATE `tbl_company` SET `company_address` = '$address' WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_email($email, $id) {
		$sql = "UPDATE `tbl_company` SET `company_email` = '$email' WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_phone($phone, $id) {
		$sql = "UPDATE `tbl_company` SET `company_phone` = '$phone' WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_url($url, $id) {
		$sql = "UPDATE `tbl_company` SET `company_url` = '$url' WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_description($description, $id) {
		$sql = "UPDATE `tbl_company` SET `company_description` = '$description' WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
		return $result;
	}
	
	public function update_link($link, $id) {
		$this->delete_link($id);
		$exploded_link = explode(", ",$link);
		foreach($exploded_link as $links) {
			$sql = "INSERT INTO `tbl_company_link` (`company_id`,`company_link`) VALUES ('$id','$links')";
			$result = $this->db->query($sql);
		}
	}
	
	/*-------------------------------------------------------------------DELETE-------------------------------------------------*/
	
	public function delete_link($id) {
		$sql = "DELETE FROM `tbl_company_link` WHERE `company_id` = '$id' ";
		$result = $this->db->query($sql);
	}

}