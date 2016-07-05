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
        <a href="take_attendance.php" class="menuItem">Take Attendance</a>
        <a href="view_attendance.php" class="menuItem">View Attendance</a>
      </p>
      

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

  <p><h4>In this section the class teacher can take attendance of students of their respective classes.</h4></p>
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
