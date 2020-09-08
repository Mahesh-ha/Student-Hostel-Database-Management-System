<?php
  session_start();
?>
</html>
<!DOCTYPE html>
<html>
<head>
<style>
.button{
  background-color: orange;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;

}
input[type=password]{
    width: 450px;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=password]:focus{
    background-color: #ddd;
    outline: none;
}
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
    height: 715px;
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
  <h1 style="padding-left: 345px">CHANGE PASSWORD</h1><br>
  <form method="POST" action="">
    <div style="padding-left: 220px">
    <input type="password" name="password" placeholder="Old Password"><br><br>
    <input type="password" name="newpassword" placeholder="New password"><br><br>
    <input type="password" name="cnewpassword" placeholder="Confirm password"><br><br>
    </div>
    <div style="padding-left:408px">
      <input type="submit" name="submit" value="Save" class="button">
    </div>
  </form>
  <script>
    var p;
    p=document.getElementById("hello");
    p.addEventListener("mouseover",handler,false);
  
      function handler(){
    p.style.width = "60%";
    p.style.height = "60%";
    p.style.fontSize="120%";
  }
  p.addEventListener("mouseout",handler1,false);
  function handler1(){
    p.style.width = "33.55%";
    p.style.height ="50%";
    p.style.fontSize="100%";
  }
</script>
</article>
<br>
<br>
</body>
</html>

<?php
include('init.php');

if(isset($_POST['password'],$_POST['newpassword'],$_POST['cnewpassword']))
  {
    $old = $_POST['password'];
    $new = $_POST['newpassword'];
    $cnew = $_POST['cnewpassword'];
    $query = mysqli_query($conn,"SELECT WPWORD FROM Warden WHERE WPWORD = '$old'");
    $rows = mysqli_num_rows($query);
    if($rows == 1)
    {
        if($new == $cnew)
        {
            $sql = "UPDATE Warden SET WPWORD ='$new' WHERE WPWORD = '$old'";  
            if ($conn->query($sql) === TRUE)
            {
              echo '<script language="javascript">';
              echo 'alert("Password changed successfully......")';
              echo '</script>';
            }
        }
        else
        {
              echo '<script language="javascript">';
              echo 'alert("Your password miss matched......")';
              echo '</script>';
        }
    }
    else
    {
      echo '<script language="javascript">';
      echo 'alert("Invalid password.........")';
      echo '</script>';
    }
  }
?>