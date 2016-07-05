<?php require_once("../includes/initialize.php"); ?>
<?php if (!$session->is_logged_in()) { redirect_to("../login.php"); } ?>

<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <span class="header">links</span>
        Space for a left side link menu if needed:
      </p>

      <p>
        <a href="#" class="menuItem">Update</a>
        <a href="#" class="menuItem">Fee Section</a>
        <a href="pay_salary.php" class="menuItem">Salary Section</a>
        
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<?php
    if(isset($_GET['id'])) {
      $salary_details = Account::check_payment($_GET['id']);
?>
    <caption>Payments:</caption>
    <table class="bordered">
    <tr>
      <th>Salary [Year(A.D.)]</th>
      <th>Month</th>
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
  if(isset($_POST['submit'])) {
      if(Account::pay_salary($_GET['id'],$_POST))
      {
        echo "Paid salary for ".$_POST['year'].", ".upcase($_POST['month']).'</br>';
      }
      else
        echo "Not paid.".'</br>';
  }
  else{
     // Account::check_payment($_GET['id']);
      $salary = Account::calc_salary($_GET['id']);
?> 

<?php echo '<h3><p>Salary: '.$salary.'</p></h3></br>';?>

<hr>
  <form method = "POST" action = "">
    <fieldset>
      <legend>Payment Here:</legend>
      <label>Year: </label>
      <input type="text" name="year" required="true" size=15/></br>
      <label>Month: </label>
      <input type="text" name="month" required="true" size=10/></br>
      <label>Date Of Payment: </label> 
      <input type="text" name = "dop" id="datepicker" required="true"/><br/>
      
      <input type="submit" name="submit" value="Paid"/><br/>
    </fieldset>
  </form>
 <?php } ?>
 
</br>
<?php }
  else {

    $teachers = Admin::find_all_teacher();
    foreach($teachers as $teacher)
    {
      echo '<a href = "pay_salary.php?id='.$teacher['id'].'">'.full_name($teacher['fname'],$teacher['lname'],$teacher['mname']).'</a>'.'</br>';
    }
}

 
  ?>


  

  

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
