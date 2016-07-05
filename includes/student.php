<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Student extends DatabaseObject {
	public static function get_my_class($id) {
		global $database;
		$sql = "SELECT class_id FROM student WHERE id = '".$id."'";
		$result = $database->query($sql);
		$result = $database->fetch_array($result);
		return $result['class_id'];
	}

	public static function view_attendance($id) {
		global $database;
		$sql = "SELECT * from student_attendance where student_id ='".$id."' Order by date";
		$result = $database->query($sql);
		$result = $database->fetch_all($result);
		return $result;
	}

}