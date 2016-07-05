<?php require_once('../includes/initialize.php'); ?>
<?php
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
?>
<?php include_layout_template('header_inner.php'); ?>
    <script src="../js/student.js"></script>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

<p>
        <span class="header">links</span>
        Manage Users:
      </p>

      <p>
        <a href="student_search.php" class="menuItem">Back</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<?php
  if(empty($_GET['id'])) {
    $session->message("No student ID was provided.");
  }
  else {
  	$student = Admin::find_student_by_id($_GET['id']);
    $parent = User::get_parent($student['id'],$student['parent_id']);
    ?>

    <?php 
    
    echo "Full Name: ".full_name($student['fname'],$student['lname'],$student['mname'])."<br/>";
    echo "Class: ".upcase(Routine::get_class($student['class_id']))."<br/>";
    echo "Gender: ".upcase($student['gender'])."<br/>";
    echo "Date of Birth: ".$student['dob']."<br/>";
    echo "Blood Group: ".strtoupper($student['blood_group'])."<br/>";
    echo "Nationality: ".upcase($student['nationality'])."<br/>";
    echo "Email: ".$student['email']."<br/>";
    echo "Admission Date: ".$student['admission_date']."<br/>";
    echo "Previous School: ".$student['previous_school']."<br/>";

    echo '<a href = "#" id="contact">Contact Details</a>';
    echo '<div id="contact_div" style="display:none;">';
      echo "Home Phone: ".$student['contact']['home_phone']."<br/>";
      echo "<br/>Permanent: <br/>";
      echo "Zone: ".$student['contact']['permanent']['zone']."<br/>";
      echo "District: ".$student['contact']['permanent']['district']."<br/>";
      echo "City: ".$student['contact']['permanent']['city']."<br/>";
      echo "Ward No.: ".$student['contact']['permanent']['ward_no']."<br/>";
      echo "Tole: ".$student['contact']['permanent']['tole']."<br/>";
      echo "House No.: ".$student['contact']['permanent']['house_no']."<br/>";

      if(!empty($student['contact']['temporary'])) {
        echo "<br/>Temporary: <br/>";
        echo "Zone: ".$student['contact']['temporary']['zone']."<br/>";
        echo "District: ".$student['contact']['temporary']['district']."<br/>";
        echo "City: ".$student['contact']['temporary']['city']."<br/>";
        echo "Ward No.: ".$student['contact']['temporary']['ward_no']."<br/>";
        echo "Tole: ".$student['contact']['temporary']['tole']."<br/>";
        echo "House No.: ".$student['contact']['temporary']['house_no']."<br/>";
      }
    echo "</div>";

    //parent ko details
    echo '<br/><a href = "#" id="parent">Parent Details</a>';
    echo '<div id="parent_div" style="display:none;">';
      echo "Name: ".full_name($parent['fname'],$parent['lname'],$parent['mname'])."<br/>";
      echo "Gender: ".$parent['gender']."<br/>";
      echo "Occupation: ".$parent['occupation']."<br/>";
      echo "Mobile Number: ".$parent['mobile']."<br/>";
      echo "Relationship: ".$parent['relation']."<br/>";
      if(!empty($parent['email']))
      echo "Email: ".$parent['email']."<br/>";
    echo "</div>";
    echo '<br/>';
  ?>




    <?php

  } 



?>
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>