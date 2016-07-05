<?php require_once('../includes/initialize.php'); ?>
<?php
	
	//check login
	if(!$session->is_logged_in()) {
  		redirect_to("../index.php");
	}
  else if(strcmp($_SESSION['user_type'],"student")==0 || strcmp($_SESSION['user_type'],"admin")==0 ){
    redirect_to("../".$_SESSION['user_type']."/index.php");
  }

  $teacher = Admin::find_teacher_by_id($_SESSION['user_id']);

?>
<?php include_layout_template('header_inner.php'); ?>
  <script src="../js/student.js"></script>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>

      <p>
        <h4>Teacher Here</h4>
      </p>
      <p>
        <a href="../change_password.php" class="menuItem">Change Password</a>
        <a href="view_salary.php" class="menuItem">View Salary</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>
<?php
    echo "<b>Full Name: </b>".full_name($teacher['fname'],$teacher['lname'],$teacher['mname'])."<br/>";

    $class_id = Teacher::check_classteacher($_SESSION['user_id']);
    if($class_id) {
      echo "Class Teacher of Class: ".strtoupper(Routine::get_class($class_id))."<br/>";  
    }
    
    echo "Gender: ".upcase($teacher['gender'])."<br/>";

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


 ?>

  
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
