<?php require_once("../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("../login.php"); } ?>
<?php
	// must have an ID
  if(empty($_GET['id'])) {
  	$session->message("No Subject was provided.");
    redirect_to('subject.php');
  }
?>
<?php
  Subject::delete_subject($_GET['id']);
  redirect_to("view_subject.php");
?>