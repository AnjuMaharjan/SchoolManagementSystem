$(document).ready(function(){
    //alert("click");
	$(document).on("click",".routine", function(){
        $source = $(this).attr('src');
        $("#contentRight").html("<a href='routines.php' id=''>Back</a></br><img src="+$source+" width = 900>");
    });

});