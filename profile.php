<?php
	session_start();
	$aid=$_SESSION['Reg_no'];
	
	include('init.php');
	if (!$conn)
    	die("Connection failed: " . mysqli_connect_error());

	if(isset($_POST['update']))
	{
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$dob = $_POST['dob'];
		$smobile1=$_POST['smobile1'];
		$smobile2=$_POST['smobile2'];
		$email=$_POST['email'];
		$saddress=$_POST['saddress'];
		$city=$_POST['city'];
		$state=$_POST['state'];
		$pincode=$_POST['pincode'];
		$dname=$_POST['dname'];
		$year=$_POST['year'];
		$srn=$_POST['srn'];
		$pname=$_POST['pname'];
		$paddress=$_POST['paddress'];
		$pmobile1=$_POST['pmobile1'];
		$gname=$_POST['gname'];
		$gaddress=$_POST['gaddress'];
		$gmobile1=$_POST['gmobile1'];
		

		$studentsql = "UPDATE Student SET Firstname = '$fname', Lastname = '$lname', DOB = '$dob', Smobile1 = '$smobile1',Smobile2 = '$smobile2', Email = '$email', Address = '$saddress', City = '$city', State = '$state', Pincode = '$pincode', Dname = '$dname', Year = '$year', SRN = '$srn' WHERE Reg_no = '$aid'";

		$parentsql = "UPDATE Parent SET Pname = '$pname', Address = '$paddress', Pmobile1 = '$pmobile1' WHERE Reg_no = '$aid'";
		
		$lgsql = "UPDATE LG SET Lname = '$gname', Laddress = '$gaddress', Lmobile1 = '$gmobile1' WHERE Reg_no = '$aid'";
		
		if (mysqli_query($conn,$studentsql) AND mysqli_query($conn,$parentsql) AND mysqli_query($conn,$lgsql)) 
		    echo"<script>alert('Profile Updated Succssfully..........');</script>";
		else
		    echo"<script>alert('Error in updating record!');</script>";
		
	}
	mysqli_close($conn);
?>


<!doctype html>
<html lang="en">
<head>
	<title>Dashboard | Profile</title>
	<link rel="shortcut icon" href="Images/user2.png">
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
input[type=text],[type = date],[type = number],[type = email]{
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
 	height: 1280px;
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
	
	include('init.php');
	$aid=$_SESSION['Reg_no'];

	$sql = "SELECT * FROM Student WHERE Reg_no = '$aid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_num_rows($result);
	   if($row == 1)
	  	{
	  		$rows = mysqli_fetch_assoc($result);

			$parentsql = "SELECT * FROM Parent WHERE Reg_no = '$aid'";
			$parentres = mysqli_query($conn, $parentsql);
			$parent = mysqli_fetch_assoc($parentres);

			$lgsql = "SELECT * FROM LG WHERE Reg_no = '$aid'";
			$lgres = mysqli_query($conn, $lgsql);
			$lg = mysqli_fetch_assoc($lgres);

			?>
			<p style="font-size: 30px;font-family: garamond;color: grey;padding-left: 330px"><?php echo $rows['Firstname'];?>'s&nbsp;Profile</p>
			<form method="post" action="" name="registration" onSubmit="return valid();">
			<div>
			<fieldset style="width :125px;height: 1055px">
			<h1 style="color: green;">Personal Details</h1>
			<label>Registration No <br><input type="number" name="Reg_no" required value="<?php echo $rows['Reg_no'];?>" readonly></label><br>
			<label>First Name <br><input type="text" name="fname" required value="<?php echo $rows['Firstname'];?>"></label><br>	
			<label>Last Name <br><input type="text" name="lname" required value="<?php echo $rows['Lastname'];?>"></label><br>
			<label>Date Of Birth<br><input type="date" maxlength="10" name="dob" required value="<?php echo $rows['DOB'];?>" ></label><br>	
			<label>Mobile Number<br><input type="number" maxlength="10" name="smobile1" required value="<?php echo $rows['Smobile1'];?>" ></label><br>
			<label>Emergency Mobile Number<br><input type="number" maxlength="10" name="smobile2" required value="<?php echo $rows['Smobile2'];?>" ></label><br>
			
          	<label>Email-ID<br><input type="email" name="email" required=""  value="<?php echo $rows['Email'];?>"></label><br>
          	<label>Address<br> <input type="text" name="saddress" value="<?php echo $rows['Address'];?>"></label><br>
          	<label>City<br><input type="text" name="city" value="<?php echo $rows['City'];?>" ></label><br>
          	<label>
          		State<br>
          		<select name="state" required="">
          			<option value="<?php echo $rows['State'];?>"><?php echo $rows['State'];?></option>
          			<option>KA</option>
          			<option>AP</option>
          			<option>MH</option>
          			<option>HP</option>
          			<option>UP</option>
          			<option>WB</option>
          			<option>TN</option>
          			<option>DL</option>
          			<option>PB</option>
          			<option>MP</option>
          		</select>
          	</label><br>
          	<label>Pin Code<br><input type="number" name="pincode" value="<?php echo $rows['Pincode'];?>" ></label>
          	</fieldset>
   			</div>
          	<div style="padding-left: 250px">
				<fieldset style="width: 125px;height: 98.4%;padding-top: 6px">
          		<h1 style="color: green;">Educational Details</h1>
			<label>
				Department<br>
				<select name="dname" value="<?php echo $rows['Dname'];?>">
					<option value="<?php echo $rows['Dname'];?>"><?php echo $rows['Dname'];?></option>
					<option>CSE</option>
					<option>ECE</option>
					<option>EEE</option>
					<option>BT</option>
					<option>ME</option>
					<option>CV</option>
				</select>
			</label><br>
			<label>Year Of Joining<br><input type="number" maxlength="10" name="year" required value="<?php echo $rows['Year'];?>" ></label><br>
			<label>SRN <br><input type="text" name="srn" required value="<?php echo $rows['SRN'];?>" readonly></label>
			<h1 style="color:green;">Parent Details</h1><br>
			<label>Parent Name <br><input type="text" name="pname" required value="<?php echo $parent['Pname'];?>"></label><br>
			<label>Parent Address<br><input type="text" name="paddress" value="<?php echo $parent['Address'];?>" ></label><br>
			<label>Mobile Number<br><input type="number" maxlength="10" name="pmobile1" required="" value="<?php echo $parent['Pmobile1'];?>" ></label><br>
				
			<h1 style="color:green;">Guardian Details</h1><br>
			<label>Guardian Name <br><input type="text" name="gname" required value="<?php echo $lg['Lname'];?>"></label><br>
			<label>Guardian Address<br><input type="text" name="gaddress" value="<?php echo $lg['Laddress'];?>">
			</label><br>
			<label>Mobile Number<br><input type="number" maxlength="10" name="gmobile1" required="" value="<?php echo $lg['Lmobile1'];?>" ></label><br>
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