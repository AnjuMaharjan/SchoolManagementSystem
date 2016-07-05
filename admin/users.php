<?php require_once('../includes/initialize.php'); ?>
<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
?>

<?php include_layout_template('header_inner.php'); ?>
  <script src="../js/users.js"></script>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <span class="header">links</span>
        Manage Users:
      </p>
      <p>
        <a href="add_admin.php" class="menuItem">Add Another Admin</a>
      </p>
      
      <p><h3>Add:</h3></p>
      <p>
        <a href="add_student.php" class="menuItem">Add Student</a>
        <a href="add_teacher.php" class="menuItem">Add Teacher</a>
      </p>
      <p><h3>View:</h3></p>
      <p>
        <a href="#" type="student" class="menuItem view">View Students</a>
        <a href="#" type="teacher" class="menuItem view">View Teachers</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
	<h2>In this section you can add and view students and teachers account..</h2>
  
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
