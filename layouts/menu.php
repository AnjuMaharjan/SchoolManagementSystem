</head>

<body>



<!-- Main site container -->
<div id="siteBox">

  <!-- Main site header : holds the img, title and top tabbed menu -->
  <div id="header">

    <!-- top rounded corner -->
    <img src="images/corner_tl.gif" alt="corner" style="float:left;" />


    <!-- Site title and subTitle -->
    <span class="title">
      <span>School Management System</span>
      <span class="subTitle">
        SMS
      </span>
    </span>

    <?php 
      if(!isset($_SESSION['user_type'])) {
    ?>

      <!-- Menu is displayed in reverse order from how you define it (caused by float: right) -->
    <a href="login.php" title="login" class="lastMenuItem">Login</a>
    <a href="aboutus.php" title="about us">about us</a>
    <a href="index.php" title="home" class="active">home<span class="desc">welcome</span></a>

    <?php    
        }
        else {
    ?>

      <a href="logout.php" title="logout" class="lastMenuItem">Logout</a>
     
      <?php
        if(strcmp($_SESSION['user_type'],"admin")== 0){
            echo ' <a href="admin/profile.php" title="profile" >Profile</a>';
            echo '<a href="admin/account.php" title="routine">Account<span class="desc">Section</span></a>';
            echo '<a href="admin/routines.php" title="routine">Routines</a>';
            echo '<a href="admin/admin_subject.php" title="subject">Subjects</a>';
            echo '<a href="admin/users.php" title="users">Users<span class="desc">Manage Users</span></a>';
        }
        else if(strcmp($_SESSION['user_type'],"teacher")== 0){
            echo ' <a href="teacher/profile.php" title="profile" >Profile</a>';
            echo '<a href="teacher/routines.php" title="routine">Routines</a>';
        }
        else if(strcmp($_SESSION['user_type'],"student")== 0){
            echo '<a href="student/profile.php" title="profile" >Profile</a>';
            echo '<a href="student/routines.php" title="routine">Routines</a>';
        }
      ?>
      
      <a href="index.php" title="home" >home<span class="desc">welcome</span></a>


    <?php
        }
    ?>

  </div>