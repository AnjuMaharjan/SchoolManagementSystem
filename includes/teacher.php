<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');

class Teacher extends DatabaseObject {
	public static function get_myclass($id) {
		global $database;
		$sql = "SELECT subject_id FROM teacher_sub WHERE teacher_id = '".$id."'";
		$result = $database->query($sql);
		$result = $database->fetch_all($result);

		foreach($result as $key => $row) {
			$result[$key]['class_id'] = Account::get_classid($row['subject_id']);
			$result[$key]['sname'] = self::get_subject($row['subject_id']);
		}
		foreach($result as $key => $row) {
			$result[$key]['name'] = Routine::get_class($row['class_id']);
		}
		return $result;
	}   

	public static function get_subject($id) {
		global $database;
		$sql = "SELECT name FROM subject WHERE id = '".$id."'";
		$result = $database->query($sql);
		$result = $database->fetch_array($result);
		return $result['name'];
	}

	public static function get_all_teacher_option() {
		global $database;
	      $sql = "SELECT id,fname, lname, mname FROM teacher";
	      $result_set = $database->query($sql);
	      $options="";
	      while($row = $database->fetch_array($result_set)){
	        $id=$row["id"];
	        $name= full_name($row["fname"], $row["lname"], $row["mname"]);
	        $options.="<option value=\"$id\">".$name;
	      }
      return $options;
	}

	public static function check_classteacher($id) {
		global $database;
		$sql = "SELECT * FROM class WHERE teacher_id = '".$id."'";
		$result=$database->query($sql);
		if($database->num_rows($result)==0) {
			return false;
		}
		else
			$result = $database->fetch_array($result);
			return $result['id'];
	}

	public static function find_student_by_class($class_id) {
		global $database;
		$sql = "SELECT id,fname,mname,lname from student WHERE class_id = '".$class_id."'";
		$result = $database->query($sql);
		$result = $database->fetch_all($result);
		return $result;
	}

	public static function student_attendance($attendance) {
		global $database;

		array_pop($attendance);
		$class_id = array_pop($attendance);

		date_default_timezone_set("Asia/Kathmandu");
		$date = date('Y-m-d');
		echo $date."<br>";
		$sql="SELECT * FROM student_attendance WHERE class_id='".$class_id."' && date='".$date."'";
		$result=$database->query($sql);

		if($database->num_rows($result)==0) {
			foreach($attendance as $student_id => $atten) {
				echo $student_id."=>".$atten."<br>";
				$sql = "INSERT INTO  student_attendance(student_id,class_id,date,status) values('$student_id','$class_id','$date','$atten')";
				$database->query($sql);	
			}
		}
		else {
			echo "Attendance already taken for today!".'</br>';
		}
		
		/*$sql = "SELECT id,fname,mname,lname from student WHERE class_id = '".$class_id."'";
		$result = $database->query($sql);
		$result = $database->fetch_all($result);
		return $result;*/
	}

	public static function view_attendance($info) {
		global $database;
		$sql = "SELECT student.id as std_id,student.fname, student.mname, student.lname,student_attendance.status from student_attendance LEFT JOIN student ON student_attendance.student_id = student.id WHERE student_attendance.date ='".$info['date']."' && student_attendance.class_id='".$info['class_id']."' ORDER BY student.id";
		$result = $database->query($sql);
		$result = $database->fetch_all($result);
		return $result;
	}

	public static function get_all_date_option($class_id) {
		global $database;
		$sql = "SELECT DISTINCT date from student_attendance WHERE class_id='".$class_id."' ORDER BY date ASC";
		$result = $database->query($sql);
		$result = $database->fetch_all($result);
		//print_array($result);

		$options="";
		foreach($result as $r) {
			$options.="<option value = ".$r['date'].">".$r['date']."</option>";
			
		}
		echo $options;
		  
	}
}
?>