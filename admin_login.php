<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
</head>
<style>
 input[type=text],[type = password]{
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}
input[type=text]:focus,[type=password]:focus{
    background-color: #ddd;
    outline: none;
}
 .button{
	background-color: brown;
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
 	display: inline-block;
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
</style>
<body>
	<p align="center" style="font-size: 50px">PES BOYS HOSTEL</p>
	<center>
	<fieldset style="height: 365px;width: 30%;margin-top: 75px">
		<p style="font-size: 30px">ADMIN LOGIN </p>
		<form method="POST" action="">
			<label><input type="text" name="username" placeholder="Username" class="hello"></label><br><br>
			<input type="password" name="password" placeholder="password" class="hello"><br><br><br>
			<input type="submit" name="submit" class = "button"style="padding: 12px 20px;display: inline-block;border-radius: 4px ;box-sizing: border-box;"><br><br>
			<center><a href="forgot_password.html" style="text-decoration: none;color: yellow">forgot password?</a></center>
		</form>

		
	</fieldset>
    </center>

</body>
</html>
<?php
	
	/*$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "DBMS";	
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	*/

	include('init.php');
	if (!$conn) 
	{
	    die("Connection failed: " . mysqli_connect_error());
	}
	//session_start();
	if(isset($_POST['username'],$_POST['password']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];


		$query = mysqli_query($conn,"SELECT Email,WPWORD FROM Warden WHERE Email = '$username' AND WPWORD = '$password'");
		$_SESSION["username"]=$username;
		$rows = mysqli_num_rows($query);
		if($rows == 1)
		{
			header("Location: admin.php"); //redirecting to other page
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Invalid Username or Password")';
			echo '</script>';
			
		}
	}
?>