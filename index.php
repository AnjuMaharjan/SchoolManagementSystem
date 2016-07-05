<?php require_once("includes/initialize.php"); ?>


<?php if($session->is_logged_in()) {
  redirect_to($_SESSION['user_type']."/index.php");
  }
?>

<?php include_layout_template('header.php'); ?>
<?php include_layout_template('menu.php'); ?>
<?php include_layout_template('content_start.php'); ?>

<?php include_layout_template('content_right_start.php'); ?>

 <p>
  <h1><center>SCHOOL MANAGEMENT SYSTEM</center></h1>
 </p>
      
<?php include_layout_template('content_end.php'); ?>
<?php include_layout_template('footer.php'); ?>

