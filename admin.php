<?php
  session_start();
?>
</html>
<!DOCTYPE html>
<html>
<head>
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
    height: 610px;
    background-color: grey;
}

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
  <li><a href="admin.php">Dashboard</a></li>
  <li><a href="admin_profile.php">Profile</a></li>
  <li><a href="retrieve_leave.php">Leave Applications</a></li>
  <li><a href="retrieve_complaint.php">Complaints</a></li>
  <li><a href="manage.php">Student Details</a></li>
  <li><a href="remove_student.php">Remove Student</a></li>
  <li><a href="admin_change_pass.php">Change Password</a></li>
  <li><a href="index.html">Logout</a></li>
</ul>
</nav>
</section>
<article>
  <?php 
  
  $aid=$_SESSION['username'];
  include('init.php');
  $sql = "SELECT * FROM Warden WHERE Email = '$aid'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);
  if($row == 1)
  {
    $rows = mysqli_fetch_assoc($result)
    ?>
    <!--<h1 style="color: violet;padding-left: 350px">Hello&nbsp;,&nbsp;<?php echo $rows['Wname'];?></h1>-->
    <h1 style="color: violet;padding-left: 350px"> Hello Warden</h1>
  <?php }
  ?>
<div  style="width:350px;float: left;margin-left: 50px;padding-left: 211px">
<div class="card" >
  <div class="header">
    <h1>Admin Profile</h1>
  </div>

  <div class="container">
    <p><a href="admin_profile.php" style="text-decoration: none">See more Details.</a></p>
  </div>
</div>
</div>

</article>
<br>
<br>
</body>
</html>
