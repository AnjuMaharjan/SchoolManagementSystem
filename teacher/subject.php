<?php require_once('../includes/initialize.php'); ?>
<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
  else if(strcmp($_SESSION['user_type'],"student")==0 || strcmp($_SESSION['user_type'],"admin")==0 ){
    redirect_to("../".$_SESSION['user_type']."/index.php");
  }

  $class = Teacher::get_myclass($_SESSION['user_id']);

?>
<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <h4>Teacher's Section</h4>
        <?php 
          foreach($class as $cls) {
              echo '<a href="student_marks.php?id='.$cls['class_id'].'&subject_id='.$cls['subject_id'].'" class= "menuItem">'.$cls['sname'].'('.$cls['name'].')'.'</a>';
          }
        ?>
      </p>

  


<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<p><h3>In this section you can add marks..</h3></p>

  
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
