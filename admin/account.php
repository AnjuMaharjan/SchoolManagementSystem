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
  <h2>Account Section here!!</h2>


  

  

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
