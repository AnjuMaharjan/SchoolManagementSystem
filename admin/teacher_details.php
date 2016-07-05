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
        <?php echo'<a href="assign_subject.php?id='.$_GET['id'].'" class="menuItem">Assign Subject</a>' ?>
        <?php echo'<a href="teacher_subject.php?id='.$_GET['id'].'" class="menuItem">View Subject(s)</a>' ?>
        <?php echo'<a href="teacher_salary.php?id='.$_GET['id'].'" class="menuItem">View Salary and Payments</a>' ?>
        <a href="teacher_search.php" class="menuItem">Back</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<?php
  if(empty($_GET['id'])) {
    $session->message("No teacher ID was provided.");
  }
  else {
  	$teacher = Admin::find_teacher_by_id($_GET['id']);
  	//print_array($teacher);

    echo "Full Name: ".full_name($teacher['fname'],$teacher['lname'],$teacher['mname'])."<br/>";

    $class_id = Teacher::check_classteacher($_GET['id']);
    if($class_id) {
      echo "Class Teacher of Class: ".upcase(Routine::get_class($class_id))."<br/>";  
    }
    
    echo "Gender: ".upcase($teacher['gender'])."<br/>";
    //echo "Date of Birth: ".$teacher['dob']."<br/>";
    // echo "Blood Group: ".strtoupper($teacher['blood_group'])."<br/>";
    // echo "Nationality: ".upcase($teacher['nationality'])."<br/>";
    // echo "Email: ".$teacher['email']."<br/>";
    // echo "Admission Date: ".$teacher['admission_date']."<br/>";
    // echo "Previous School: ".$teacher['previous_school']."<br/>";

    echo '<a href = "#" id="contact">Contact Details</a>';
    echo '<div id="contact_div" style="display:none;">';
      echo "Home Phone: ".$teacher['contact']['home_phone']."<br/>";
      echo "<br/>Permanent: <br/>";
      echo "Zone: ".$teacher['contact']['permanent']['zone']."<br/>";
      echo "District: ".$teacher['contact']['permanent']['district']."<br/>";
      echo "City: ".$teacher['contact']['permanent']['city']."<br/>";
      echo "Ward No.: ".$teacher['contact']['permanent']['ward_no']."<br/>";
      echo "Tole: ".$teacher['contact']['permanent']['tole']."<br/>";
      echo "House No.: ".$teacher['contact']['permanent']['house_no']."<br/>";

      if(!empty($teacher['contact']['temporary'])) {
        echo "<br/>Temporary: <br/>";
        echo "Zone: ".$teacher['contact']['temporary']['zone']."<br/>";
        echo "District: ".$teacher['contact']['temporary']['district']."<br/>";
        echo "City: ".$teacher['contact']['temporary']['city']."<br/>";
        echo "Ward No.: ".$teacher['contact']['temporary']['ward_no']."<br/>";
        echo "Tole: ".$teacher['contact']['temporary']['tole']."<br/>";
        echo "House No.: ".$teacher['contact']['temporary']['house_no']."<br/>";
      }
    echo "</div>";
    echo "<br/>";


  } 



?>
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>