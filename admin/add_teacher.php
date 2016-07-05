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
        Add Teacher...
      </p>

      <p>
        <a href="users.php" class="menuItem">Back</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

<form method="POST" action="add_address.php"  id="add_teacher" name="add">
    <fieldset>
    <legend>Teacher: Personal Information</legend>

    <label>First Name:</label><br/>
   	<input type="text" name="fname"  required="true" /><br/>
    <label>Middle Name:</label><br/>
    <input type="text" name="mname" /><br/>

   	<label>Last Name:</label><br/>
   	<input type="text" name="lname"  required="true"/><br/>
   	<label>Gender</label><br/>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female<br/>
    
    <label>Date Of Birth: </label> <input type="text" name="dob"  id="datepicker" required="true"/><br/>
    <label>Mobile No. :</label><br/><input type="text" name="mobile_no"/><br/>
    <label>Qualification: </label><input type="text" name="qualification"  required="true"/><br/>
    
    <label>Blood Group:</label><input type="text" name="blood_group" required="true" size = 5/><br/> 

    <label>Nationality: </label>
    <input type="text" name="nationality"  required="true"/><br/>
    <label>Email: </label><input type="text" name="email"/><br/>
    <br />
    <input type="hidden" name="flag" value="login"/>
    <input type="hidden" name="type" value="2"/><br/>
    <input type="submit" name="add_btn" value="Submit"/><br/><br/>
    </fieldset>
</form>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>