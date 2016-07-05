

<?php
	require_once("../includes/initialize.php");
	
	if(!$session->is_logged_in()) {
        redirect_to("../index.php");
    }

    foreach($_POST as $key=>$value){
        $_SESSION['form_data']['parent'][$key]=$value;
    }
?>
<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <span class="header">links</span>
        Manage Users:
      </p>

      <p>
        <a href="#" class="menuItem">Add Student</a>
        <a href="#" class="menuItem">Add Teacher</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

<form method="POST" action="register_users.php"  id="add_parent" name="f_add">
    <fieldset>
    <legend>Personal Information</legend>
	<label>Admission date:<label/>
    <input type="text" name="admission_date"  id="datepicker" required="true"/><br/>
    <label>Name of Previous school:<label/>
    <input type="text" name="previous_school" size=50/><br/>
    <br/>
 <input type="submit" name="add_btn" value="Submit"/><br/><br/>
</fieldset>
</form>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>