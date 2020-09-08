<?php
	session_start();
	$aid=$_SESSION['username'];
	include('init.php');

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	if(isset($_POST['update']))
	{
		
		$name=$_POST['name'];
		$Wmobile1=$_POST['Wmobile1'];
		$Wmobile2=$_POST['Wmobile2'];
		
		$sql = "UPDATE Warden SET Wname = '$name',Wmobile1 = '$Wmobile1',Wmobile2 = '$Wmobile2' WHERE Email = '$aid'";
		if(mysqli_query($conn,$sql))
			echo"<script>alert('Profile Updated Succssfully..........');</script>";
		else
			echo"<script>alert('Error in updating records');</script>";
	}
	
?>

<!doctype html>
<html lang="en">
<head>
<style>
	div {
			display: inline-grid;
		}
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
input[type=text],[type = datetime-local],[type = number],[type = email]{
    width: 350px;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus,[type=number]:focus,[type=datetime-local]:focus,select:focus,[type = email]{
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
    padding: 0 ;
    width: 205px;
 	  height: 630px;
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
	padding-left: 40px;
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
	include('init.php');
	$aid=$_SESSION['username'];
	$sql = "SELECT * FROM Warden WHERE Email = '$aid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($result);
	   if($row == 1)
	  	{
	  		$rows = mysqli_fetch_assoc($result)
			?>
			<p style="font-size: 30px;font-family: garamond;color: grey;padding-left: 330px;margin-top: 3px"> Hello Warden</p>
			<form method="post" action="" name="registration" onSubmit="return valid();">
			<div style="padding-left: 220px">
			<fieldset style="width :125px;height: 98%">
			<label>Name <br><input type="text" name="name" required value="<?php echo $rows['Wname'];?>"></label><br>
			<label>Warden ID<br><input type="number" name="W_id" required value="<?php echo $rows['W_id'];?>" readonly></label><br>	
			<label>User Name<br><input type="email" name="Email" required value="<?php echo $rows['Email'];?>" readonly></label><br>	
			<label>Mobile Number-1<br><input type="number" name="Wmobile1" required value="<?php echo $rows['Wmobile1'];?>"></label><br>
			<label>Mobile Number-2<br><input type="number" name="Wmobile2" required value="<?php echo $rows['Wmobile2'];?>"></label><br>	
			
			</fieldset>
		</div><br><br><br>
		<div style="padding-left: 350px">
      		<input type="submit" value="UPDATE" class="button" id="hello" name="update">
    	</div>
			</form>
		<?php } 
		else
			echo "0 result find"; 
		?>
	</article>
</body>
</html>
