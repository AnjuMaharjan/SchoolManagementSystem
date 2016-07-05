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
  <h1><center>MEMBERS</center></h1>
 </p>
 <ul>
 	<li>067-BCT-503 (ANJAN RAI)</li>
 	<li>067-BCT-504 (ANJU MAHARJAN)</li>
 	<li>067-BCT-505 (ANUP SHRESTHA)</li>
 	<li>067-BCT-523 (DIPENDRA SHRESTHA)</li>
 </ul>
      
<?php include_layout_template('content_end.php'); ?>
<?php include_layout_template('footer.php'); ?>

