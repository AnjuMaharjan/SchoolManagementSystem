<?php require_once('../includes/initialize.php'); ?>

<?php $teachers = Admin::find_all_teacher(); ?>
  <?php
    foreach($teachers as $teacher)
    {
      echo '<a href = "teacher_details.php?id='.$teacher['id'].'">'.full_name($teacher['fname'],$teacher['lname'],$teacher['mname']).'</a>'.'</br>';
    }
  ?>