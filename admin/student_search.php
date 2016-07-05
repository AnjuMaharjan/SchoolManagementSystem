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
        <span class="header">links</span>
      </p>

      <p><h3>Search students!!</h3></p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

<?php 
  if(isset($_POST['submit'])) {
    $result = Admin::search_student($_POST);

    foreach($result as $r)
    {
      echo '<a href = "student_details.php?id= '.$r['id'].'">'.full_name($r['fname'],$r['lname'],$r['mname']).'</a>'.'</br>';
    }
  }
 else {
?>
<form method = "POST" action = "">
    <fieldset>
    <legend>Search</legend>
    <label>Search By:</label>
    <SELECT NAME="search_type">
          <OPTION VALUE=0>Search:
      <OPTION VALUE="fname">By Name
      <OPTION VALUE="id">By Id
        </SELECT><br/><br/>
      <label>KeyWord:</label>
      <input type="text" name="keyword" required="true" size=15/></br>
      <input type="submit" name="submit" value="Search"/><br/><br/>
  </fieldset>
</form>
<?php } ?>
  
<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
	


		
