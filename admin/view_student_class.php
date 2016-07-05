<?php

	$classes = array('Nursery','LKG','UKG','1','2','3','4','5','6','7','8','9','10');
	$class_id = 1;


	foreach($classes as $v)
	{
        echo '<a href="#" class="anchor" id="'.$class_id.'">Class '.$v.'</a></br>';
		$class_id = $class_id + 1;
	}

?>
<script type="text/javascript">

            $(document).ready(function(){
                $(document).on("click",".anchor", function(){
                	var id = $(this).attr("id");
                	$("#contentRight").load("show_students.php?classes="+id);                       
            	});
            });

</script>             