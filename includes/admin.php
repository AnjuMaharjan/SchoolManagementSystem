<?php
// If it's going to need the database, then it's 
// probably smart to require it before we start.
require_once(LIB_PATH.DS.'database.php');



class Admin extends DatabaseObject {

	public static $contact_id;


	// Common Database Methods
	public static function find_all() {
		return self::find_by_sql("SELECT * FROM ".self::$table_name);
  }

  public static function register_address($user_address) {
  	global $database;
  	$sql = "INSERT INTO address(zone, district, city, ward_no,tole, house_no) VALUES ('$user_address[p_zone]','$user_address[p_district]','$user_address[p_city]','$user_address[p_wardno]', '$user_address[p_tole]', '$user_address[p_houseno]')";
	if($database->query($sql)) {
		$permanent_id = $database->insert_id();
	}
	if($user_address['t_zone']!=NULL && $user_address['t_district']!=NULL && $user_address['t_city']!=NULL && $user_address['t_wardno']!=NULL && $user_address['t_tole']!=NULL && $user_address['t_houseno']!=NULL) {
		$sql = "INSERT INTO address(zone, district, city, ward_no,tole, house_no) VALUES ('$user_address[t_zone]','$user_address[t_district]','$user_address[t_city]','$user_address[t_wardno]', '$user_address[t_tole]', '$user_address[t_houseno]')";
		if($database->query($sql)) {
	 		$temporary_id =$database->insert_id();
		}
	}
	if(isset($temporary_id))
		$sql = "INSERT INTO contact(permanent_address_id, temporary_address_id,home_phone) values('$permanent_id','$temporary_id', '$user_address[home_phone]')";
	else
		$sql = "INSERT INTO contact(permanent_address_id,home_phone) values('$permanent_id','$user_address[home_phone]')";
	if($database->query($sql)) { 
		self::$contact_id = $database->insert_id();	
	}
  }

  public static function register_parent($parent_details) {
  	global $database;  
  	echo self::$contact_id;
  	$c = self::$contact_id;
  	$sql = "INSERT INTO parent(fname,mname, lname, gender, occupation,contact_id,email,mobile) values ('$parent_details[p_fname]', '$parent_details[p_mname]', '$parent_details[p_lname]', '$parent_details[p_gender]', '$parent_details[occupation]', '$c', '$parent_details[p_email]', '$parent_details[mobile_no]')";

  	  if($database->query($sql)) {
	 		$parent_id =$database->insert_id();
		}
		return $parent_id;
	}
  	  

  	public static function register_student($personal) {
  		global $database;
  		$c = self::$contact_id;
  		$pid = $database->insert_id();
  		$sql = "INSERT INTO student(fname, mname, lname, gender, dob, blood_group, nationality, contact_id, parent_id, class_id, admission_date, previous_school, email) values('$personal[fname]', '$personal[mname]', '$personal[lname]', '$personal[gender]', '$personal[dob]', '$personal[blood_group]', '$personal[nationality]', '$c', '$pid', '$personal[class_id]', '$personal[admission_date]', '$personal[previous_school]', '$personal[email]')";

  		if($database->query($sql)) {
	 		$student_id =$database->insert_id();
		}
		return $student_id;
  	}

  	public static function register_relation($relation, $parent_id, $student_id) {
  		global $database;
  		$sql = "INSERT INTO parent_student_relationship(student_id, relation, parent_id) values('$student_id', '$relation', '$parent_id')";
  		$database->query($sql);
  	}

  	public static function register_teacher($teacher) {
  		global $database;
  		$c = self::$contact_id;
  		$sql = "INSERT INTO teacher(fname, mname, lname, gender, dob, qualification, blood_group, nationality, contact_id, email) values ('$teacher[fname]', '$teacher[mname]', '$teacher[lname]', '$teacher[gender]', '$teacher[dob]', '$teacher[qualification]', '$teacher[blood_group]', '$teacher[nationality]', '$c' ,'$teacher[email]')";
  		$database->query($sql);
  	}

	public static function register_user($user_data) {
  	print_array($user_data);	
  	global $database;
  	self::register_address($user_data['address']);
  	if($user_data['personal']['type']==3) {
		$parent_id = self::register_parent($user_data['parent']);
	  	$student_id = self::register_student($user_data['personal']);
	  	self::register_relation($user_data['parent']['relation'],$parent_id,$student_id);
	  	$username = strtolower($user_data['personal']['fname'])."_".$student_id;
       	$password = md5("abc");
       	$type = "student";
	  	$sql = "INSERT INTO login(user_id, username, password, user_type) values ('$student_id', '$username', '$password', '$type')";
	  	$database->query($sql);
  	}
  	else if($user_data['personal']['type']==2) {
  		self::register_teacher($user_data['personal']);
  		$teacher_id = $database->insert_id();
  		$username = strtolower($user_data['personal']['fname'])."_".$teacher_id;
       	$password = md5("abc");
       	$type = "teacher";
	  	$sql = "INSERT INTO login(user_id, username, password, user_type) values ('$teacher_id', '$username', '$password', '$type')";
	  	$database->query($sql);
  	}	
  }


  public static function add_admin($data) {
    global $database;
    $sql="INSERT INTO admin(fname, mname, lname, gender, email) VALUES ('$data[fname]','$data[mname]','$data[lname]','$data[gender]','$data[email]') ";
    if($database->query($sql)) {
      $id =$database->insert_id();
      $password = md5("abc");
      $type = "admin";
    }
    $username = "admin_".$id;
    $sql="INSERT INTO login(user_id, username, password, user_type) VALUES ('$id','$username','$password','$type')";
    if($database->query($sql))
      return true;
    else
      return false;
   }

  public static function find_all_teacher() {
    global $database;
    $sql = "SELECT id, fname, mname, lname FROM teacher order by fname";
    $result_set = $database->query($sql);
    $all = $database->fetch_all($result_set);
    return $all;
  }

  public static function find_all_student() {
    global $database;
    $sql = "SELECT id, fname, mname, lname FROM student order by fname";
    $result_set = $database->query($sql);
    $all = $database->fetch_all($result_set);
    return $all;
  }

  public static function find_teacher_by_id($id) {
    global $database;
    $sql = "SELECT * from teacher WHERE id = '".$id."'";
    $result = $database->query($sql);
    $result = $database->fetch_array($result);
    $result['contact'] = User::get_contact($result['contact_id']);
    return $result;
  }

  public static function find_student_by_id($id) {
    global $database;
    $sql = "SELECT * from student WHERE id = '".$id."'";
    $result = $database->query($sql);
    $result = $database->fetch_array($result);
    $result['contact'] = User::get_contact($result['contact_id']);
    return $result;
  }

  public static function search_student($search) {
    global $database;
    $field = $search['search_type'];
    $sql = "SELECT * FROM student WHERE ".$field." like '".$search['keyword']."%'";
    $result = $database->query($sql);
    $result = $database->fetch_all($result);
    return $result;
  }

  public static function search_teacher($search) {
    global $database;
    $field = $search['search_type'];
    $sql = "SELECT * FROM teacher WHERE ".$field." like '".$search['keyword']."%'";
    $result = $database->query($sql);
    $result = $database->fetch_all($result);
    return $result;
  }
  
  public static function view_students($classes) {
  global $database;
  $sql = "SELECT * FROM student WHERE class_id='".$classes."'";
  $result = $database->query($sql);    
    $user_data = array();
    while($row =$database->fetch_array($result))
    {
        array_push($user_data,$row);
    }
    return $user_data;
  }

  public static function assign_classteacher($data) {
    global $database;
    $sql="SELECT * FROM class WHERE teacher_id='".$data['teacher_id']."'";
    $result=$database->query($sql);
    if($database->num_rows($result)==0) {
        $sql="UPDATE class SET teacher_id='".$data['teacher_id']."' where id ='".$data['class_id']."'";
        if($database->query($sql)) 
          return true;
        else
          return false;
    }
    else return false;
    
  }

  public static function get_classteacher($class_id) {
    global $database;
    $sql = "SELECT teacher.fname, teacher.lname, teacher.mname from teacher inner join class on teacher.id=class.teacher_id where class.id='".$class_id."'";
    $result=$database->query($sql);
    $result=$database->fetch_array($result);
    if(!empty($result)) 
      return full_name($result['fname'],$result['lname'],$result['mname']);
    else
      return "----";

  }

  public static function remove_classteacher($class_id) {
    global $database;
    $teacher=NULL;
    $sql="UPDATE class SET teacher_id='$teacher' where id ='$class_id'";
    if($database->query($sql))
      return true;
    else
      return false;
  }


}

?>