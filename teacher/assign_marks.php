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
  <a href="subject.php" class="menuItem">Back</a>
</p>
<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<?php
  if(empty($_GET['id']) || empty($_GET['subject_id'])) {
    redirect_to("subject.php");
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
     if(Subject::assign_marks($_GET['id'],$_POST))
        echo "Assigned!!".'</br>';
        
      }
      else {
?> 
    
  <form method="POST" action="" >
  <fieldset>
    <legend>Assign Marks</legend>
    <label>Marks Obtained:<label/>

    <input type="text" name="mo" required ="true" size=10/></br>
    <label>Terminal<label/>

    <input type="text" name="terminal"  required ="true" size=20/></br>
    <label>Date<label/>

    <input type="text" name="date"  required ="true" size=20/></br>
    <label>Remarks<label/>

    <input type="text" name="remarks"  required ="true" size=20/></br>
    <input type="hidden" name="subject_id" value="<?php echo $_GET['subject_id']; ?>">
    <input type="submit" name="add_btn" value="Assign"/><br/><br/>

  </fieldset>
</form>
<?php } ?>


<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>