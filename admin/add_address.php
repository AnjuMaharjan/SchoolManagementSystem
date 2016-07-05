<?php require_once('../includes/initialize.php'); ?>
<?php
    
    //check login
    if(!$session->is_logged_in()) {
        redirect_to("../index.php");
    }

    foreach($_POST as $key=>$value){
        $_SESSION['form_data']['personal'][$key]=$value;
    }
?>

<?php 
    if($_POST["type"]==3)
    {
        $action = "add_parent.php";
    }
    else if ($_POST["type"]==2)
    {
        $action = "register_users.php";
    }

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
        <a href="#" class="menuItem">Add Student</a>
        <a href="#" class="menuItem">Add Teacher</a>
      </p>


<?php include_layout_template('content_left_end_inner.php'); ?>
<?php include_layout_template('content_right_start_inner.php'); ?>


 
<form method="POST" action=<?php echo $action; ?> id="add_address" name="add"> 
    <fieldset>
    <legend>Address</legend>

	<label>Permanent: *</label><br/>
    <label>Zone: </label>
    <input type="text" name="p_zone" required="true"/><br/>
    <label>District: </label>
    <input type="text" name="p_district" required="true"/><br/>
    <label>City: </label>
    <input type="text" name="p_city" required="true"/><br/>
    <label>Ward No.: </label>
    <input type="text" name="p_wardno" required="true" size = 5/><br/>
    <label>Tole: </label>
    <input type="text" name="p_tole" required="true"/><br/>
    <label>House No.: </label>
    <input type="text" name="p_houseno" required="true"/><br/>
    <label>Home Phone No.: </label>
    <input type="text" name="home_phone"/><br/>
    
    <label>Temporary: </label><br/>
    <label>Zone: </label>
    <input type="text" name="t_zone" /><br/>
    <label>District: </label>
    <input type="text" name="t_district"/><br/>
    <label>City: </label>
    <input type="text" name="t_city" /><br/>
    <label>Ward No.: </label>
    <input type="text" name="t_wardno" size = 5/><br/>
    <label>Tole: </label>
    <input type="text" name="t_tole"/><br/>
    <label>House No.: </label>
    <input type="text" name="t_houseno"/><br/>

<br/> 
<input type="submit" name="add_btn" value="Submit"/><br/><br/>
</fieldset>
</form>

<?php include_layout_template('content_end_inner.php'); ?>
<?php include_layout_template('footer_inner.php'); ?>