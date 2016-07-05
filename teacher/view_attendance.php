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
        <a href="take_attendance.php" class="menuItem">Take Attendance</a>
        <a href="view_attendance.php" class="menuItem">Back</a>
      </p>
      

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

 <?php
    $class_id = Teacher::check_classteacher($_SESSION['user_id']); 
    if(!$class_id) {
      echo "You are not allowed to access this section!".'</br>';
    }
    else {
      if ($_SERVER["REQUEST_METHOD"] == "POST") { 
          $attendance = Teacher::view_attendance($_POST);
          if(!empty($attendance)) {
            echo "Date: ".$_POST['date']."<br/>";
            ?>
            <table class="bordered">
              <tr>
                <th>Student </th>
                <th>Status</th>
                <!-- <th>Action</th> -->
              </tr>
            <?php foreach($attendance as $a) { ?>
              <tr>
                <td><?php echo full_name($a['fname'],$a['lname'],$a['mname']); ?></td>
                <td><?php echo $a['status']; ?></td>
                <!-- <td><a href="#">Edit</a></td> -->
              </tr>
            <?php } ?>
            </table>
            <?php
          }
      }
      else {
      ?>
      <form method="POST" action="" >
        <fieldset>
          <legend>View Attendance</legend>
          <label>Date:<label/>
         
          <SELECT NAME="date">
            <?php Teacher::get_all_date_option($class_id) ;?>
          </SELECT> </br><br/>
          <input type="hidden" name="class_id" value="<?php echo $class_id; ?>"/>
          <input type="submit" name="submit" value="View"/><br/><br/>

        </fieldset>
      </form>

      <?php
      }

      
    }
  ?>


<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
