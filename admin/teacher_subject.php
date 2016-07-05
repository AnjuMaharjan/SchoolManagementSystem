<?php require_once('../includes/initialize.php'); ?>
<?php
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
?>

<?php 
  if(!empty($_GET['del'])) {
    Subject::del_teacher_sub($_GET['tsid']);
    redirect_to("teacher_subject.php?id=".$_GET['id']);
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
  else {
    $subjects = Subject::get_all_teacher_subject($_GET['id']);
    if($subjects['total_subject']==0) {
      echo "<p>No subjects assigned!!</p><br/>";
    }
    else {
      echo "Total No. of subjects: ".$subjects['total_subject'];
      ?>
        <table class="bordered">
        <tr>
          <th>Subject</th>
          <th>Class</th>
          <th>Remarks</th>
          <th>Action</th> 
        </tr>
      <?php foreach($subjects as $subject): ?>
      <?php if(isset($subject['id'])) {?>
        <tr>
          <td><?php echo $subject['name']; ?></td>
          <td><?php echo Routine::get_class($subject['class_id']); ?></td>
          <td><?php echo $subject['remarks']; ?></td>
          <td><a href="teacher_subject.php?del=1&tsid=<?php echo $subject['id']; ?>&id=<?php echo $_GET['id']; ?>">Delete</a></td>
        </tr>
      <?php } ?>
      <?php endforeach; ?>
      </table>
      <?php
    }
  }

?> 
 

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>