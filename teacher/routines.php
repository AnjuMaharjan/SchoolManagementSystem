<?php require_once('../includes/initialize.php'); ?>
<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
  else if(strcmp($_SESSION['user_type'],"student")==0 || strcmp($_SESSION['user_type'],"admin")==0 ){
    redirect_to("../".$_SESSION['user_type']."/index.php");
  }

  $class_all = Teacher::get_myclass($_SESSION['user_id']);
  //this is for removing the repeated class..
  foreach($class_all as $element) {
    $temp = $element['class_id'];
    $class[$temp] = $element;
  }
  foreach($class as $key => $c) {
    $class[$key]['routine'] = Routine::find_by_id($c['class_id']);
  }

?>
<?php //print_array($class); ?>
<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <h4>Teacher's Section</h4>
      </p>

  


<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

 <?php if(!empty($class)){  ?>
        <table class="bordered">
          <tr>
            <th>Preview</th>
            <th>Subject Name</th>
            <th>Class</th>
            <th>Type</th>
          </tr>
          <?php
            foreach($class as $key => $routine) { 

          ?>
              <tr>
                <td><img class = "routine" src="../<?php echo $routine['routine']->image_path(); ?>" width="100"  /></td>
                <td><?php echo upcase($routine['sname']); ?> </td>
                <td><?php echo $routine['routine']->class; ?></td>
                <td><?php echo upcase($routine['routine']->image_type); ?></td>
              </tr>
          <?php  
            } 
          ?>
        </table>
  <?php  }else{
          echo output_message("There are no routines for you.");
        }
  ?>
  
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
