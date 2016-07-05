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
        <span class="header">links</span>
        Manage Subjects:
      </p>

      <p>
        <a href="add_subject.php" class="menuItem">Add Subject</a>
        <a href="view_subject.php" class="menuItem">View Subjects</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<h2>In this section, we can manage subjects. We can add subjects, view subjects...</h2>
<?php
  if(isset($_POST['submit'])) {
    if(Subject::add_subject($_POST)) {
      echo '<p>Subject added!!</p><br/>';
    }
    else {
      echo '<p>Error in Adding!!</p><br/>';
    }
  }
?>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
