<?php require_once('../includes/initialize.php'); ?>
<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
  else if(strcmp($_SESSION['user_type'],"teacher")==0 || strcmp($_SESSION['user_type'],"admin")==0 ){
    redirect_to("../".$_SESSION['user_type']."/index.php");
  }

  $class = Student::get_my_class($_SESSION['user_id']);

  // foreach($class as $key => $c) {
  //   $class[$key]['routine'] = Routine::find_by_id($c['class_id']);
  // }
  $routine=Routine::find_by_id($class);
?>
<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <h4>Student's Section!</h4>
        <h5>View Routine!!</h5>
      </p>
      <p><a href="index.php" class="menuItem">BACK</a></p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

 <?php if(!empty($routine)){  ?>
        <caption>Your Routine</caption>
        <table class="bordered">
          <tr>
            <th>Preview</th>
            <th>Class</th>
            <th>Type</th>
          </tr>
          <?php
          ?>
              <tr>
                <td><img class = "routine" src="../<?php echo $routine->image_path(); ?>" width="100"  /></td>
                <td><?php echo $routine->class; ?></td>
                <td><?php echo upcase($routine->image_type); ?></td>
              </tr>
        </table>
  <?php  }else{
          echo output_message("There are no routines for you.");
        }
  ?>
  
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
