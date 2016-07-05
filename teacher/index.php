<?php require_once('../includes/initialize.php'); ?>
<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
  else if(strcmp($_SESSION['user_type'],"student")==0 || strcmp($_SESSION['user_type'],"admin")==0 ){
    redirect_to("../".$_SESSION['user_type']."/index.php");
  }

?>
<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <h4>Teacher Here</h4>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
	<center>
    <h2>Welcome Teacher!!</h2></br>
    <p><h3>Today is: <?php echo date("Y-m-d") . "<br />"; ?></h3></p>
  </center>
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
