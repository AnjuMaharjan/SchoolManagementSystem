<?php require_once('../includes/initialize.php'); ?>

<?php $students = Admin::find_all_student(); ?>
  <?php
    foreach($students as $student)
    {
      echo '<a href = "student_details.php?id='.$student['id'].'">'.full_name($student['fname'],$student['lname'],$student['mname']).'</a>'.'</br>';
    }
  ?>