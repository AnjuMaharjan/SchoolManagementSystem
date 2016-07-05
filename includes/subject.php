<?php
require_once(LIB_PATH.DS.'database.php');

class Subject extends DatabaseObject {
  public static function get_all_class() {
  		global $database;
  		$sql = "SELECT id, name FROM class ORDER BY id";
   		$result_set = $database->query($sql);
   		$options="";
	  	while($row = $database->fetch_array($result_set)){
	  		$id=$row["id"];
        	$name=$row["name"];
        	$options.="<option value=\"$id\">".$name;
	  	}
	  	//print_array($options);
    	return $options;
    }

    public static function add_subject($subject_data) {
      global $database;
      if (self::subject_exits($subject_data['name'], $subject_data['class_id'], $subject_data['remark'])) {
        return false;
      }
      else {
        $sql = "INSERT INTO subject(name, class_id, fm, pm, remarks) VALUES ('$subject_data[name]','$subject_data[class_id]','$subject_data[fm]','$subject_data[pm]','$subject_data[remark]')";
      if($database->query($sql))
        return true;
      else
        return false;
      }      
    }

    public static function subject_exits($name, $c_id, $remark) {
    global $database;
    $sql= "SELECT id FROM subject WHERE class_id = ".$c_id." && name = '".$name."'"." && remarks = '".$remark."'";
    $result = $database->query($sql);
    return ($database->num_rows($result) == 1) ? true : false;
  }

  public static function get_all_subject() {
    global $database;
    $sql = "SELECT * FROM subject ORDER BY class_id";
    $result = $database->query($sql);
    $total_subject = $database->num_rows($result);
    $result = $database->fetch_all($result);
    $result['total_subject'] = $total_subject;
    return $result;

  }

  public static function get_subject_by_id($id) {
    global $database;
    $sql = "SELECT * FROM subject WHERE class_id='".$id."'";
    $result = $database->query($sql);
   // $total_subject = $database->num_rows($result);
    $result = $database->fetch_array($result);
    //$result['total_subject'] = $total_subject;
    return $result;
  }

  public static function get_all_subject_option() {
    global $database;
      $sql = "SELECT subject.id, subject.name,subject.remarks,class.name AS class_name FROM subject LEFT JOIN class ON subject.class_id = class.id ORDER BY class.id";
      $result_set = $database->query($sql);
      $options="";
      while($row = $database->fetch_array($result_set)){
        $id=$row["id"];
        $name=$row["name"];
        $class=$row["class_name"];
        $remarks = $row["remarks"];
        $options.="<option value=\"$id\">".$name." - ".$class." (".$remarks.")";
      }
      return $options;
  }

  public static function assign_subject($value) {
    global $database;
    $sql = "SELECT * FROM teacher_sub WHERE subject_id='".$value['subject_id']."'";
    if(!$database->num_rows($database->query($sql))) {
        $sql = "SELECT * from teacher_sub WHERE subject_id ='".$value['subject_id']."' && teacher_id='".$value['teacher_id']."'";
    
        if(!$database->num_rows($database->query($sql))) {
        $sql = "INSERT INTO teacher_sub(subject_id,teacher_id) VALUES ('$value[subject_id]', '$value[teacher_id]')";
        $database->query($sql);
      }
    }
    
    
  }

  public static function delete_subject($id) {
    //subject delete garda subject table bahek aru jata pani chan sab delete garnu parcha..
    global $database;
    $sql = "DELETE FROM subject WHERE id='".$id."' LIMIT 1";
    $database->query($sql);
    $sql = "DELETE FROM teacher_sub WHERE subject_id='".$id."' LIMIT 1";
    $database->query($sql);
  }

  public static function get_all_teacher_subject($teacher_id) {
    global $database;
    $sql = "SELECT teacher_sub.id, subject.name, subject.class_id, subject.remarks FROM teacher_sub LEFT JOIN subject ON teacher_sub.subject_id = subject.id WHERE teacher_id ='".$teacher_id."'";

    $result = $database->query($sql);
    $total_subject = $database->num_rows($result);
    $result = $database->fetch_all($result);
    $result['total_subject'] = $total_subject;
    return $result;
  }

  public static function del_teacher_sub($id) {
    global $database;
    $sql = "DELETE FROM teacher_sub WHERE id='".$id."' LIMIT 1";
    $database->query($sql);
  }

  public static function assign_marks($id,$data) {
    global $database;
    $sql="INSERT INTO terminal(name,date) VALUES ('$data[terminal]','$data[date]')";
    if($database->query($sql)) 
      $result = $database->insert_id();
    $sql="SELECT class_id FROM student WHERE id='".$id."'";
    $class =  $database->query($sql);
    $class = $database->fetch_array($class);

    $sql = "INSERT INTO student_marks(subject_id, student_id, class_id, marks_obtained, terminal_id,remarks) VALUES ('$data[subject_id]','$id','$class[class_id]','$data[mo]','$result','$data[remarks]')";
    if($database->query($sql))
      return true;
  }
}
?>