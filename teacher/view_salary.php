<?php require_once('../includes/initialize.php'); ?>
<?php
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
?>

<?php 
  if(!empty($_GET['del'])) {
    //Subject::del_teacher_sub($_GET['tsid']);
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
        <a href="profile.php" class="menuItem">Back</a>
      <p>
        
      </p>


<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
</br>
<?php
   $salary_details = Account::check_payment($_SESSION['user_id']);
  ?>
  <caption>Payments:</caption>
    <table class="bordered">
    <tr>
      <th>Salary of the Year</th>
      <th>Salary of the month</th>
      <th>Date of Payment</th>
      <th>Amount paid</th> 
    </tr>
  <?php foreach($salary_details as $s): ?>
    <tr>
      <td><?php echo $s['year']; ?></td>
      <td><?php echo upcase($s['month']); ?></td>
      <td><?php echo $s['date_paid']; ?></td>
      <td><?php echo $s['amount']; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<hr>
  <?php
      $salary = Account::calc_salary($_SESSION['user_id']);
?> 

<?php echo '<h3><p>Salary: '.$salary.'</p></h3></br>';?>

<hr>
 
</br>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>