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
        Manage Users:
      </p>

      <p>
        <a href="#" class="menuItem">Add Student</a>
        <a href="#" class="menuItem">Add Teacher</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

<form method="POST" action="add_address.php"  id="add_student" name="add">
    <fieldset>
    <legend>Student: Personal Information</legend>

    <label>First Name:</label>
   	<input type="text" name="fname"  required="true" size = 30/><br/><br/>
    <label>Middle Name:</label>
    <input type="text" name="mname"  size = 30/><br/><br/>

   	<label>Last Name:</label>
   	<input type="text" name="lname"  required="true" size = 30/><br/><br/>
	

    <label>Gender</label><br/>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female<br/><br/>
    <label>Class:<label/>
   
    <SELECT NAME="class_id">
        <OPTION VALUE=0>Choose
        <?php // echo $options;?>
        <?php echo Routine::get_all_class() ;?>
    </SELECT> </br><br/>
    <label>Date Of Birth: </label> 
    <input type="text" name = "dob" id="datepicker" required="true"/><br/><br/>
<!--     <label>Year:</label><input type="text" name="year"  required="true" size = 5/>
    <label>Month:</label><input type="text" name="month"  required="true" size = 5/>
    <label>Date:</label><input type="text" name="date"  required="true" size = 5/><br/> -->
    <label>Blood Group:</label><input type="text" name="blood_group" required="true" size = 5/><br/> 

    <label>Nationality: </label>
    <input type="text" name="nationality"  required="true"/><br/>
    <label>Email: </label>
    <input type="text" name="email" size = 30/><br/>
    <br />

    <input type="hidden" name="flag" value="login"/>
    <input type="hidden" name="type" value="3"/><br/>
    <input type="submit" name="add_btn" value="Submit"/><br/><br/>
    </fieldset>
</form>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>