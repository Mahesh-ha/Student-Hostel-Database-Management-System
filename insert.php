<?php
	include('init.php');
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	} 

	if(isset($_POST['submit']))
	{
		$Reg_no = $_POST['Reg_no'];
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
		$Dname=$_POST['Dname'];
		$year=$_POST['year'];
		$srn=$_POST['srn'];
		$pname=$_POST['pname'];
		$paddress=$_POST['paddress'];
		$pmobile1=$_POST['pmobile1'];
		$pmobile2=$_POST['pmobile2'];
		$gname=$_POST['gname'];
		$gaddress=$_POST['gaddress'];
		$gmobile1=$_POST['gmobile1'];
		$gmobile2=$_POST['gmobile2'];
		$password=$_POST['password'];
		
        $studentsql = "INSERT INTO Student VALUES ('$Reg_no','$fname','$lname','$srn','$smobile1','$smobile2','$dob','$email','$saddress','$city','$state','$pincode','$year','$Dname',NULL,NULL,NULL,'$password',0)";
       
        $parentsql = "INSERT INTO Parent VALUES ('$Reg_no','$pname','$pmobile1','$pmobile2','$paddress')";
       
        $lgsql = "INSERT INTO LG VALUES ('$Reg_no','$gname','$gmobile1','$gmobile2','$gaddress')";

        if (mysqli_query($conn, $studentsql) AND mysqli_query($conn, $parentsql) AND mysqli_query($conn, $lgsql)) 
            header("Location: index.html");

        else
            echo"<script>alert('Error in registering the student!');</script>".mysqli_error($conn);
        
        mysqli_close($conn);
	}
	
?>
