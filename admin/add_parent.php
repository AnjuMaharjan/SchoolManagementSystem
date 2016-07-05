<?php require_once('../includes/initialize.php'); ?>
<?php
    
    //check login
    if(!$session->is_logged_in()) {
        redirect_to("../index.php");
    }

    foreach($_POST as $key=>$value){
        $_SESSION['form_data']['address'][$key]=$value;
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


<form method="POST" action="add_previous.php"  id="add_parent" name="add">
    
    <fieldset>
    <legend>Parent Information</legend>
    <label>Parent's details:</label><br/>
    <label>First Name:<label/>
    <input type="text" name="p_fname"  required="true"/><br/>
    <label>Middle Name:</label>
    <input type="text" name="p_mname" /><br/>
    <label>Last Name:<label/>
    <input type="text" name="p_lname"  required="true"/><br/>
    <label>Gender</label><br/>
    <input type="radio" name="p_gender" value="male">Male
    <input type="radio" name="p_gender" value="female">Female<br/>
    <label>Occupation:<label/>
    <input type="text" name="occupation"  required="true"/><br/>
    <label>Relationship:<label/>
    <input type="text" name="relation"  required="true"/><br/>
    <label>Mobile No. :<label/>
    <input type="text" name="mobile_no"  required="true"/><br/>
    <label>Email :<label/>
    <input type="text" name="p_email"/><br/>
    <br/>
    <input type="submit" name="add_btn" value="Submit"/><br/><br/>
</fieldset>
</form>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>