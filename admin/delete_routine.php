<?php require_once("../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("../login.php"); } ?>
<?php
	// must have an ID
  if(empty($_GET['id'])) {
  	$session->message("No photograph ID was provided.");
    redirect_to('routines.php');
  }

  $routine = Routine::find_by_id($_GET['id']);
  if($routine && $routine->destroy()) {
    $session->message("The routine {$routine->filename} was deleted.");
    redirect_to('routines.php');
  } else {
    $session->message("The routine could not be deleted.");
    redirect_to('routines.php');
  }
  
?>
<?php if(isset($database)) { $database->close_connection(); } ?>
