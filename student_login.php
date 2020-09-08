
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
	<title>STUDENT | LOGIN</title>
</head>
<style>
 input[type=email],[type = password]{
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
input[type=email]:focus,[type=password]:focus{
    background-color: #ddd;
    outline: none;
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
	border-radius: 4px ;
	box-sizing: border-box;
	cursor: pointer;

}
 

 .hello{
 	width: 100%;
 	padding: 12px 20px;
 	margin:8px 0;
 	border: 1px solid #ccc;
 	border-radius: 4px;
 	box-sizing: border-box;
 }
 body{
 	background-image: url(Images/clgfront.jpg);background-size: cover;
 
 }
 fieldset{
 	padding: 20px;
 	background: rgba(2,50,100,0.5);
 	color: white;

 }
</style>
<body>
	<p  align = "center" style="font-size: 50px">PES BOYS HOSTEL</p>
	<fieldset style="height: 365px;width: 30%;margin-top: 75px;margin-left: 34%;">
		<p style="font-size: 30px;margin-top: 5px;text-align: center;">STUDENT LOGIN </p>
		<form  method="POST" action="">
			<label style="font-family: 'Fredoka One', cursive;margin-left: 1px;">EMAIL-ID<input type="email" name="username" placeholder="Email-ID" class="hello" required=""></label><br><br>
			<label style="font-family: 'Fredoka One', cursive;">PASSWORD<input type="password" name="password" placeholder="Password" class="hello" required=""></label><br><br><br>
			<center><input type="submit" value="Login" style="padding: 12px 20px;" class="button"></center><br>
			<center><a href="forgot_password.html" style="text-decoration: none;color: yellow">forgot password?</a></center>
		</form>
		
	</fieldset>


</body>
</html>
<?php

	include('init.php');
	if (!$conn) 
	    die("Connection failed: " . mysqli_connect_error());
	
	if(isset($_POST['username'],$_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];


		$query = mysqli_query($conn,"SELECT Email,PWORD,Reg_no FROM Student WHERE Email = '$username' AND PWORD = '$password'");
  
        
		$rows = mysqli_num_rows($query);
		if($rows == 1)
		{
			$rows = mysqli_fetch_assoc($query);
			$_SESSION['Reg_no']=$rows['Reg_no'];
			header("Location: dash.php");
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Invalid Username or Password")';
			echo '</script>';
			
		}
	}
?>