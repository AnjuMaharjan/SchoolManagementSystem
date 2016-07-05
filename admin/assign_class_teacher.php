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
        Space for a left side link menu if needed:
      </p>

      <p>
        <a href="upload_routine.php" class="menuItem">Upload a new routine</a>
        <a href="assign_class_teacher.php" class="menuItem">Assign Class Teacher</a>
        <a href="remove_class_teacher.php" class="menuItem">Remove Class Teacher</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<?php


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(Admin::assign_classteacher($_POST))
        echo output_message("Assigned!!");
      else
        echo output_message("Error: Not Assigned!!");
   }
?> 
    
  <form method="POST" action=""  id="add_student" name="add">
  <fieldset>
    <legend>Assign Class Teacher</legend>
    <label>Class:<label/>
   
    <SELECT NAME="class_id">
        <OPTION VALUE=0>Choose
        <?php echo Routine::get_all_class(); ?>
    </SELECT> </br><br/>

    <label>Teacher:<label/>
    <SELECT NAME="teacher_id">
        <OPTION VALUE=0>Choose
        <?php $teacher = Teacher::get_all_teacher_option();
              echo $teacher;
        ?>
    </SELECT> </br><br/>

    <input type="submit" name="add_btn" value="Assign"/><br/><br/>

  </fieldset>
</form>


<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>