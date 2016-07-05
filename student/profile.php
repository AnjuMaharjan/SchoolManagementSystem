<?php require_once('../includes/initialize.php'); ?>


<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
  else if(strcmp($_SESSION['user_type'],"teacher")==0 || strcmp($_SESSION['user_type'],"admin")==0 ){
    redirect_to("../".$_SESSION['user_type']."/index.php");
  }

  $me = User::find_student_by_id($_SESSION['user_id']);
  //print_array($me);
?>
<?php include_layout_template('header_inner.php'); ?>
  <script src="../js/student.js"></script>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <h4>Student Here</h4>
      </p>
      <p>
        <a href="../change_password.php" class="menuItem">Change Password</a>
        <a href="view_attendance.php" class="menuItem">View Attendance details</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
	<center>
    <h2>My Profile</h2></br>
    <p><h3>Today is: <?php echo date("Y-m-d") . "<br />"; ?></h3></p>
  </center>

  <?php 
    
    echo "Full Name: ".full_name($me['fname'],$me['lname'],$me['mname'])."<br/>";
    echo "Gender: ".upcase($me['gender'])."<br/>";
    echo "Date of Birth: ".$me['dob']."<br/>";
    echo "Blood Group: ".strtoupper($me['blood_group'])."<br/>";
    echo "Nationality: ".upcase($me['nationality'])."<br/>";
    echo "Email: ".$me['email']."<br/>";

    echo '<a href = "#" id="contact">Contact Details</a>';
    echo '<div id="contact_div" style="display:none;">';
      echo "Home Phone: ".$me['contact']['home_phone']."<br/>";
      echo "<br/>Permanent: <br/>";
      echo "Zone: ".$me['contact']['permanent']['zone']."<br/>";
      echo "District: ".$me['contact']['permanent']['district']."<br/>";
      echo "City: ".$me['contact']['permanent']['city']."<br/>";
      echo "Ward No.: ".$me['contact']['permanent']['ward_no']."<br/>";
      echo "Tole: ".$me['contact']['permanent']['tole']."<br/>";
      echo "House No.: ".$me['contact']['permanent']['house_no']."<br/>";

      if(!empty($me['contact']['temporary'])) {
        echo "<br/>Temporary: <br/>";
        echo "Zone: ".$me['contact']['temporary']['zone']."<br/>";
        echo "District: ".$me['contact']['temporary']['district']."<br/>";
        echo "City: ".$me['contact']['temporary']['city']."<br/>";
        echo "Ward No.: ".$me['contact']['temporary']['ward_no']."<br/>";
        echo "Tole: ".$me['contact']['temporary']['tole']."<br/>";
        echo "House No.: ".$me['contact']['temporary']['house_no']."<br/>";
      }
    echo "</div>";

    echo '<br/><a href = "#" id="parent">Parent Details</a>';
    echo '<div id="parent_div" style="display:none;">';
      echo "Name: ".full_name($me['parent']['fname'],$me['parent']['lname'],$me['parent']['mname'])."<br/>";
      echo "Gender: ".$me['parent']['gender']."<br/>";
      echo "Occupation: ".$me['parent']['occupation']."<br/>";
      echo "Mobile Number: ".$me['parent']['mobile']."<br/>";
      echo "Relationship: ".$me['parent']['relation']."<br/>";
      if(!empty($me['parent']['email']))
      echo "Email: ".$me['parent']['email']."<br/>";
    echo "</div>";
    echo '<br/>';
  ?>
  
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
