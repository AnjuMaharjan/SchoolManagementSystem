<?php require_once('includes/initialize.php'); ?>
<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
?>
<?php include_layout_template('header.php'); ?>
<?php include_layout_template('menu.php'); ?>
<?php include_layout_template('content_start.php'); ?>
<?php include_layout_template('content_left_start.php'); ?>

      <p>
        <h4>Your Options:</h4>
      </p>
       <p>
        <a href="#" class="menuItem">Change Password</a>
        <a href="#" class="menuItem">................</a>
      </p>

<?php include_layout_template('content_left_end.php'); ?>
<?php include_layout_template('content_right_start.php'); ?>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
      echo "Chuchaa manche lae hello".'</br>';
    }
    else {

?>

<form method="POST" action="">
  <fieldset>
    <legend>Change Password</legend>
    <label>Old password:</label>
    <input type = "password" name="old_password" required ="true"/></br>
    <label>New password:</label>
    <input type = "password" name="new_password" required ="true"/></br></br>
    <input type="submit" name="submit" value="Change Password" />

  </fieldset>
</form>
<?php } ?>


<?php include_layout_template('content_end.php'); ?>
<?php include_layout_template('footer.php'); ?>
	


		
