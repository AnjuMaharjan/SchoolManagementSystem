<?php
require_once('../includes/initialize.php');
if (!$session->is_logged_in()) { redirect_to("../login.php"); }
?>
<?php
	$max_file_size = 1048576;   // expressed in bytes
	                            //     10240 =  10 KB
	                            //    102400 = 100 KB
	                            //   1048576 =   1 MB
	                            //  10485760 =  10 MB

	if(isset($_POST['submit'])) {
		$routine = new Routine();
		$routine->image_type = $_POST['image_type'];
		$routine->class_id = $_POST['class_id'];
		$routine->attach_file($_FILES['file_upload']);
	
		if($routine->save()) {
			// Success
      		$session->message("Routine uploaded successfully.");
			redirect_to('routines.php');
		} else {
			// Failure
      		$message = join("<br />", $routine->errors);
		}
	 }
	
?>

<?php include_layout_template('header_inner.php'); ?>
<?php include_layout_template('menu_inner.php'); ?>
<?php include_layout_template('content_start_inner.php'); ?>
<?php include_layout_template('content_left_start_inner.php'); ?>
      

      <p>
        <a href="routines.php" class="menuItem">Back</a>
        
      </p>

<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>

	<h2>Photo Upload</h2>

	<?php echo output_message($message); ?>
  <form action="upload_routine.php" enctype="multipart/form-data" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>" />
    <p><input type="file" name="file_upload" /></p>
    <label>Class:</label>
   	    <SELECT NAME="class_id">
        	<OPTION VALUE=0>Choose
        	<?php echo Routine::get_all_class() ;?>
    	</SELECT></br><br/>
    <label>Type:</label>
       	<SELECT NAME="image_type">
        	<OPTION VALUE=0>Choose
			<OPTION VALUE="class">Class
			<OPTION VALUE="exam">Exam        	   	
        </SELECT><br/><br/>
    <input type="submit" name="submit" value="Upload" />
  </form>
  

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>
		
