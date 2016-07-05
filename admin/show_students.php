<?php require_once('../includes/initialize.php'); ?>
<?php
	
	$classes=$_GET['classes'];
	$view=Admin::view_students($classes);
	
	if(empty($view)){echo "There are no students";}
	else {echo "There are ".count($view)." students.<br><br>"; }
	foreach($view as $show)	
	{	
		echo '<ul>';
		echo '<li><a href="student_details.php?id='.$show['id'].'" class = "anchor" id="'.$show['id'].'">'.$show['fname'].' '.$show['lname'].'</a></br>';
		echo '</ul>';
	}


	

?>

