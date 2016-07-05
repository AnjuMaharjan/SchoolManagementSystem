<?php require_once('../includes/initialize.php'); ?>
<?php
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
?>

<?php 
  if((empty($_GET['id'])&&empty($_GET['subject_id']))) {
    //Subject::del_teacher_sub($_GET['tsid']);
    redirect_to("subject.php");
  }
?>



<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

<p>
        <span class="header">links</span>
      </p>
        <a href="subject.php" class="menuItem">Back</a>
      <p>
        
      </p>


<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<?php
  $view=Admin::view_students($_GET['id']);
  
  if(empty($view)){echo "There are no students<br/>";}

  foreach($view as $show) 
  { 
    echo '<ul>';
    echo '<li><a href="assign_marks.php?id='.$show['id'].' &&subject_id='.$_GET['subject_id'].'" class = "anchor" id="'.$show['id'].'">'.upcase($show['fname']).' '.upcase($show['lname']).'</a></br>';
    echo '</ul>';
  }
?>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>