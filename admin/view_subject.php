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
        Manage Sujects:
      </p>

      <p>
        <a href="add_subject.php" class="menuItem">Add Subject</a>
        <a href="view_subject.php" class="menuItem">View Subjects</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<h2>The list of Subjects...</h2>
    <?php
      $subjects = Subject::get_all_subject();
      if($subjects['total_subject']==0) {
          echo "<p>No subjects entered!!</p><br/>";
      }
      else {
       ?>
    <table class="bordered">
        <tr>
          <th>Subject Name</th>
          <th>Class</th>
          <th>Full Marks</th>
          <th>Pass Marks</th>
          <th>Remarks</th>
          <th>Action</th> 
        </tr>
    <?php foreach($subjects as $subject): ?> 
     <?php if(isset($subject['id'])) {?>
        <tr>
          <td><?php echo upcase($subject['name']); ?></td>
          <td><?php echo Routine::get_class($subject['class_id']); ?></td>
          <td><?php echo $subject['fm']; ?></td>
          <td><?php echo $subject['pm']; ?></td>
          <td><?php echo upcase($subject['remarks']); ?></td>
          <td><a href="delete_subject.php?id=<?php echo $subject['id']; ?>">Delete</a></td>
        </tr>
      <?php } ?>
      <?php endforeach; ?>
  </table>
  <?php
    }

?> 

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>