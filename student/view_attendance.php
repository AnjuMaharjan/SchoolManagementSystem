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
        <h4>Attendance here!!</h4>
      </p>
      <p>
        <a href="profile.php" class="menuItem">Back</a>
      </p>
      

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

        <?php
          $attendance = Student::view_attendance($_SESSION['user_id']);
          if(!empty($attendance)) {
        ?>
            <table class="bordered">
              <caption>Attendance Details</caption>
              <tr>
                <th>Date</th>
                <th>Status</th>
              </tr>
            <?php foreach($attendance as $a) { ?>
              <tr>
                <td><?php echo $a['date']; ?></td>
                <td><?php echo $a['status']; ?></td>
              </tr>
            <?php } ?>
            </table>
            <?php
          }
      else {
        echo "No records!!<br/>";
      }
      ?>


<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
