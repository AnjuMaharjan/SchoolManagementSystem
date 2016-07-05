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
      </p>

      <p>
        <?php echo'<a href="teacher_details.php?id='.$_GET['id'].'" class="menuItem">Back</a>' ?>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<?php
  if(empty($_GET['id'])) {
    $session->message("No teacher ID was provided.");
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") { 
      if(!(Subject::assign_subject($_POST))) {
        $session->message("Subject already assigned.");
      }
      redirect_to("teacher_details.php?id=".$_POST['teacher_id']);
      }
?> 
    
  <form method="POST" action=""  id="add_student" name="add">
  <fieldset>
    <legend>Assign Subject</legend>
    <label>Subject:<label/>
   
    <SELECT NAME="subject_id">
        <OPTION VALUE=0>Choose
        <?php // echo $options;?>
        <?php echo Subject::get_all_subject_option() ;?>
    </SELECT> </br><br/>
    <input type="hidden" name = "teacher_id" value = "<?php echo $_GET['id']; ?>">

    <input type="submit" name="add_btn" value="Assign"/><br/><br/>

  </fieldset>
</form>


<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>