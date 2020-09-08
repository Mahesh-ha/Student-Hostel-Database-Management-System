<!DOCTYPE html>
<html>
<head>
  <title>PBH | Dashboard</title>
<style>
header {
	height: 110px;
	width: 100%;
	padding-top: 1px;
	background-color: black;
	color: red;
}
header p {
	font-size: 35px;
	padding-left: 30px;
}
nav{
	float :left;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 205px;
 	  height: 480px;
    background-color: grey;
}
/*ul li{
  background-color: grey
}*/

li a {
    display: block;
    color: #000;
    padding: 20px 16px;
    font-size: 25px;
    text-decoration: none;
}
article {
	float: left;
	padding-left: 35px;
	padding-top: 25px;

}
/* Change the link color on hover */
li a:hover {
    background-color: #555;
    color: white;
}
div.card {
  width:300px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}

div.header {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    font-size: 25px;
}

div.container {
    padding: 10px;
}

</style>
</head>
<body>
<header><p align="center">PES UNIVERSITY BOYS HOSTEL</p>
</header>
<section>
	<nav>
<ul>
  <li><a href="dash.php">Dashboard</a></li>
  <li><a href="profile.php">Profile</a></li>
  <li><a href="leave.php">Leave Application</a></li>
  <li><a href="complaint.php">Complaint</a></li>
  <li><a href="change_password.php">Change Password</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</nav>
</section>
<article>
  <?php 
  session_start();
  $aid=$_SESSION['Reg_no'];
  include('init.php');
  $sql = "SELECT * FROM Student WHERE Reg_no = '$aid'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);
  if($row == 1)
  {
    $rows = mysqli_fetch_assoc($result)
    ?>
    <h1 style="color: violet;padding-left: 350px">Hello&nbsp;,&nbsp;<?php echo $rows['Firstname']." ".$rows['Lastname'];?></h1>
  <?php }
  ?>
<div  style="width:350px;float: left;margin-left: -80px;padding-left: 205px;padding-bottom: 75px">
<div class="card" >
  <div class="header">
    <h1>Profile</h1>
  </div>

  <div class="container">
    <p><a href="profile.php" style="text-decoration: none">See more Details.</a></p>
  </div>
</div>
</div>

<div  style="width:250px;float: right;margin-right: 50px;padding-top:  0px">
<div class="card" >
  <div class="header">
    <h1>Room and Mess</h1>
  </div>

  <div class="container">
    <p><a href="Room_mess.php" style="text-decoration: none">See more Details.</a></p>
  </div>
</div>
</div>
</article>
<br>
<br>
</body>

</html>
