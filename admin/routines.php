<?php require_once("../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("../login.php"); } ?>
<?php
  // Find all the routines
  $routines = Routine::find_all();
?>
<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

     

      <p>
        <a href="upload_routine.php" class="menuItem">Upload a new routine</a>
        <a href="assign_class_teacher.php" class="menuItem">Assign Class Teacher</a>
        <a href="remove_class_teacher.php" class="menuItem">Remove Class Teacher</a>
        
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
  <h2>All Routines</h2>

  <?php echo output_message($message); ?>
  <?php
  if(Routine::count_all() != 0 ){
  ?>
      <table class="bordered">
    <tr>
      <th>Preview</th>
      <th>Class</th>
      <th>Class-teacher</th>
      <th>Type</th>
      <th>Action</th>
    </tr>
  <?php foreach($routines as $routine) { ?>
    <tr>
      <td><img class = "routine" src="../<?php echo $routine->image_path(); ?>" width="100"  /></td>
      <td><?php echo $routine->class; ?></td>
      <td><center><?php echo Admin::get_classteacher($routine->class_id); ?></center></td>
      <td><?php echo upcase($routine->image_type); ?></td>
      <td><a href="delete_routine.php?id=<?php echo $routine->id; ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </table>
  <?php
  }else{
    echo output_message("There are no routines uploaded.");
  }
  ?>

  <br />
  

  

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
