<?php
	require_once("../includes/initialize.php");
	
	if(!$session->is_logged_in()) {
        redirect_to("../index.php");
    }
    
    if($_SESSION['form_data']['personal']['type']==3) {
    	foreach($_POST as $key=>$value){
        	$_SESSION['form_data']['personal'][$key]=$value;
    	}
    }
    else if($_SESSION['form_data']['personal']['type']==2) {
    	foreach($_POST as $key=>$value){
        	$_SESSION['form_data']['address'][$key]=$value;
    	}
    }

    
?>
<?php 
	Admin::register_user($_SESSION['form_data']);
	unset($_SESSION['form_data']);
	 redirect_to("users.php");
?>