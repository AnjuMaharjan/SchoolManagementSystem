</head>

<body>


<!-- Main site container -->
<div id="siteBox">

  <!-- Main site header : holds the img, title and top tabbed menu -->
  <div id="header">

    <!-- top rounded corner -->
    <img src="../images/corner_tl.gif" alt="corner" style="float:left;" />


    <!-- Site title and subTitle -->
    <span class="title">
      <span>School Management System</span>
      <span class="subTitle">
        SMS
      </span>
    </span>

    <!-- Menu is displayed in reverse order from how you define it (caused by float: right) -->
    <a href="../logout.php" title="logout" class="lastMenuItem">Logout</a>
    <a href="profile.php" title="profile">Profile</a>
    <?php
      if(strcmp($_SESSION['user_type'],"admin")== 0){
          echo '<a href="account.php" title="routine">Account<span class="desc">Section</span></a>';
          echo '<a href="routines.php" title="routine">Routines</a>';
          echo '<a href="admin_subject.php" title="subject">Subjects</a>';
          echo '<a href="users.php" title="users">Users<span class="desc">Manage Users</span></a>';
      }
      else if(strcmp($_SESSION['user_type'],"teacher")== 0){
          echo '<a href="student_attendance.php" title="std_attendance">Attendance<span class="desc">Student</span></a>';
          echo '<a href="subject.php" title="subject">Subjects</a>';
          echo '<a href="routines.php" title="routine">Routines</a>';

      }
      else if(strcmp($_SESSION['user_type'],"student")== 0){
          echo '<a href="routines.php" title="routine">Routines</a>';
      }
    ?>
    
    <a href="index.php" title="home" >home<span class="desc">welcome</span></a>

  </div>