<?php
	session_start();
	include('init.php');
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 

	if(isset($_POST['name'],$_POST['block'],$_POST['roomno'],$_POST['smobile'],$_POST['whereto'],$_POST['pname'],$_POST['pmobile']))
	{
		
		$name=$_POST['name'];
		$block = $_POST['block'];
		$roomno=$_POST['roomno'];
		$smobile=$_POST['smobile'];
		$whereto=$_POST['whereto'];
		$pname=$_POST['pname'];
		$pmobile=$_POST['pmobile'];
	
		
		
		$query="INSERT INTO leavetable(name,block,roomno,smobile,whereto,pname,pmobile) VALUES (?,?,?,?,?,?,?)";
		$stmt = $conn->prepare($query);
		$stmt->bind_param('ssiissi',$name,$block,$roomno,$smobile,$whereto,$pname,$pmobile);
		$stmt->execute();
		
		header("Location: dash.php");
		$stmt->close();
		$conn->close();
	}
	else 
		echo "Nothing";
?>
