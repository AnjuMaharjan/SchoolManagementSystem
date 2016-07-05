
$(document).ready(function(){
	$(document).on("click",".view", function(){
        $type = $(this).attr('type');
        if($type == "student"){
        	$("#contentLeft").html("<p><ul><li><a href = 'student_search.php'>Search</a><li><a href='#' id='view_by_class' >View By Class</a><li><a href='#' id='student_detail'>View By Name</a></ul></p>");
            $("#contentRight").html("<p><h4>In this section, you can search and view student details..</h4></p>");
        }else if($type == "teacher"){
        	$("#contentLeft").html("<p><ul><li><a href='teacher_search.php' >Search</a><li><a id = 'teacher_detail' href='#' >View By Name</a></ul></p>");
            $("#contentRight").html("<p><h4>In this section, you can search and view teacher details..</h4></p>");
        }
    });

    $(document).on("click","#view_by_class", function(){
        $("#contentRight").load("view_student_class.php");
    });

    $(document).on("click","#teacher_detail", function(){
        $("#contentRight").load("all_teacher.php");
    });

    $(document).on("click","#student_detail", function(){
        $("#contentRight").load("all_student.php");
    });
});