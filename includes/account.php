<?php
require_once(LIB_PATH.DS.'database.php');

class Account extends DatabaseObject {
	public static function calc_salary($teacher_id) {
		global $database;
		$sql = "SELECT * from teacher_sub WHERE teacher_id = '".$teacher_id."'";
		$result = $database->query($sql);
		$result = $database->fetch_all($result);
		foreach($result as $key => $row) {
			$result[$key]['class_id'] = self::get_classid($row['subject_id']);
		}
		$salary = 0;
		foreach($result as $key => $row) {
			
			$sql = "SELECT salary FROM salary_structure WHERE class_id = '".$row['class_id']."'";
			$result = $database->query($sql);
			$result = $database->fetch_array($result);
			$salary+=$result['salary'];

		}
		return $salary;

	}

	public static function get_classid($subject_id) {
		global $database;
		$sql = "SELECT class_id from subject WHERE id = '".$subject_id."'";
		$result = $database->query($sql);
		$result = $database->fetch_all($result);
		//print_array($result);
		return $result[0]['class_id'];
		//
	}

	public static function check_payment($teacher_id) {
		global $database;
		$sql = "SELECT * FROM teacher_payment WHERE teacher_id = '".$teacher_id."'"." ORDER BY date_paid";
		$result = $database->query($sql);
		//print_array($result);
		$result = $database->fetch_all($result);
		return $result;
	}

	public static function pay_salary($id,$salary) {
		global $database;
		$salary_c = self::calc_salary($id);
		$sql = "INSERT INTO teacher_payment(teacher_id, year, month, date_paid, amount) VALUES ('$id', '$salary[year]', '$salary[month]', '$salary[dop]', '$salary_c')";
		if($database->query($sql)) {
			return true;
		}
		else {
			return false;
		}
	}
}
?>