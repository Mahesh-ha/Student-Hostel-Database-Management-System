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
select{
    width: 300px;
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
 	  height: 610px;
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
  <h1 style="padding-left: 420px;color: brown">LEAVE APPLICATIONS</h1>
  <div style="padding-left: 150px">
  <table border="" cellpadding="8" cellspacing="0">
<thead>
<tr>
  <th>S.NO</th>
  <th>Reg_No</th>
  <th>Student Name</th>
  <th>Block</th>
  <th>Room No</th>
  <th>Mobile No</th>
  <th>Place</th>
  <th>Check Out</th>
  <th>Check In</th>
</tr>
</thead>
<tbody>
	<?php
		$count=1;
		session_start();
		$aid=$_SESSION['username'];
		include('init.php');
		if (!$conn) 
			die("Connection failed: " . mysqli_connect_error());
		
		$findid = "SELECT W_id FROM Warden WHERE Email = '$aid'";
		$findidres = mysqli_query($conn,$findid);

		if(mysqli_num_rows($findidres) == 1)
		{
			$ids = mysqli_fetch_assoc($findidres);
			$id = $ids['W_id'];
			$sql = "SELECT * FROM Student JOIN Leave_application ON Student.Reg_no = Leave_application.Reg_no WHERE Leave_application.W_id = '$id'";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0)
			{
				while($row = mysqli_fetch_assoc($result))
				{
					?>

					<tr><td><?php echo $count++;?><td><?php echo $row['Reg_no'];?></td></td><td><?php echo $row['Firstname'];?></td><td><?php echo $row['Block'];?></td><td><?php echo $row['Room_no'];?></td>
					<td><?php echo $row['Smobile1'];?></td>&nbsp;<td><?php echo $row['Place'];?></td><td><?php echo $row['Check_out'];?></td><td><?php echo $row['Check_in'];?></td></tr>
					
					<?php 
				}
				mysqli_close($conn);
			}
		}
		else
			echo "<script>alert('Warden ID Not Found!');</script>";
	?>
</tbody>
</table>
</div>
</article>
</body>
</html>