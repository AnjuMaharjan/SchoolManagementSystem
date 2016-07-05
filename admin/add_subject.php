<?php
require_once('../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("../login.php"); }
?>
<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>
      <p>
        <span class="header">links</span>
        Manage Users:
      </p>

      <p>
        <a href="add_subject.php" class="menuItem">Add Subject</a>
        <a href="view_subject.php" class="menuItem">View Subjects</a>
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

	<h2>Add Subject</h2>

	<?php echo output_message($message); ?>
<form method="POST" action="admin_subject.php"  id="add_subject" name="add">
    <fieldset>
    <legend>Subject Information</legend>

    <label>Subject Name:</label>
    <input type="text" name="name"  required="true" size =50/><br/><br/>
    <label>Class:</label>
   	    <SELECT NAME="class_id">
        	<OPTION VALUE=0>Choose
        	<?php echo Routine::get_all_class() ;?>
    	</SELECT></br><br/>
      <label>Full Marks:</label><input type = "text" name="fm" required="true" size=10/><br/><br/>
      <label>Pass Marks:</label><input type = "text" name="pm" required="true" size=10/><br/><br/>
    <label>Type:</label>
       	<SELECT NAME="remark">
          <OPTION VALUE=0>Choose
			   <OPTION VALUE="theory">Theory
			   <OPTION VALUE="practical">Practical        	   	
        </SELECT><br/><br/>
    <input type="submit" name="submit" value="Add" /><br/>
    </fieldset>
  </form>
  

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
		
