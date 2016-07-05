<?php require_once('../includes/initialize.php'); ?>
<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}

?>
<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <h4>Attendance here!!</h4>
      </p>

      <p>
        <a href="view_attendance.php" class="menuItem">View Attendance</a>
      </p>
      

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

  <?php
    $class_id = Teacher::check_classteacher($_SESSION['user_id']); 
    if(!$class_id) {
      echo "You are not allowed to access this section!".'</br>';
    }
    else {
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        //print_array($_POST);
        Teacher::student_attendance($_POST);

      }
      else { 
      
        $students = Teacher::find_student_by_class($class_id);
      ?>
        <p><h3>Today is: <?php echo date("Y-m-d") . "<br />"; ?></h3></p> 
      <?php
          if(!empty($students)) {
      ?>
                    <form method="POST" action="">
                    
                    <table class="bordered">
                    <tr>
                      <th>Student Name</th>
                      <th>Status</th>
                    </tr>
                    <?php
                      foreach($students as $student) {
                    ?>
                        <tr>
                          <td><?php echo full_name($student['fname'],$student['lname'],$student['mname'])?></td>
                          <td><input type="radio" name="<?php echo $student['id']; ?>" value="present" required="true">Present
                          <input type="radio" name="<?php echo $student['id']; ?>" value="absent" required="true">Absent</br></td>
                        </tr>
                    <?php
                      }
                    ?>

                    </table>
                      <input type="hidden" name="class_id" value="<?php echo $class_id;?>"/><br/><br/>    
                      <input type="submit" name="submit" value="Submit"/><br/><br/>    
                    </form>
      <?php
          }
          else {
            echo "<p>There are no students in your class.</p>";
          }//form else end
      }//post submit end
    }//class teacher or not end
  ?>
  
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
