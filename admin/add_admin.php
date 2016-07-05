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
        Add another Admin!
      </p>

      <p>
        <a href="users.php" class="menuItem">BACK</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(Admin::add_admin($_POST))
            echo output_message("Added Sucessfully!!");
        else
           echo output_message("Error: Couldn't Added!!");  
    }
    else { 
?>

        <form method="POST" action="" name="add">
            <fieldset>
            <legend>Add Admin</legend>

            <label>First Name:</label>
           	<input type="text" name="fname"  required="true" size = 30/><br/><br/>
            <label>Middle Name:</label>
            <input type="text" name="mname"  size = 30/><br/><br/>

           	<label>Last Name:</label>
           	<input type="text" name="lname"  required="true" size = 30/><br/><br/>
        	

            <label>Gender</label><br/>
            <input type="radio" name="gender" value="male">Male
            <input type="radio" name="gender" value="female">Female<br/><br/>
           
            <label>Email: </label>
            <input type="text" name="email" size = 30/><br/>
            <br />

            <input type="hidden" name="flag" value="login"/>
            <input type="hidden" name="type" value="1"/><br/>
            <input type="submit" name="add_btn" value="Submit"/><br/><br/>
            </fieldset>
        </form>
<?php } ?>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>