<?php
      session_start();
      include('init.php');
      $aid=$_SESSION['Reg_no'];
    
      if(isset($_POST['submit']))
      {
        
        $Mname = $_POST['Mname'];
        $tempname = $_POST['tempname'];
        $block_room = explode(" - ",$tempname);
        $sql = "UPDATE Student SET Block = '$block_room[0]', Room_no = '$block_room[1]', Mname = '$Mname', Allot = 1 WHERE Reg_no = '$aid'";
        
        $explodefrac = explode("/",$block_room[2]);
        $incvalue = ($explodefrac[1] - $explodefrac[0]) + 1;
        $incre_occ = "UPDATE RoomAllotment SET No_of_occupants = '$incvalue' WHERE Room_no = '$block_room[1]'";

        if (mysqli_query($conn, $sql) AND mysqli_query($conn,$incre_occ)) 
            echo"<script>alert('Room and Mess are selected!');</script>";

        else
            echo"<script>alert('Error in selecting Room and Mess!');</script>".mysqli_error($conn);
        mysqli_close($conn);
      }
?>

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
select{
    width: 450px;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type= number],input[type=text]
{
    
    width: 420px;
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
        include('init.php');
        $aid=$_SESSION['Reg_no'];
        $sql = "SELECT Allot FROM Student WHERE Reg_no = '$aid'";
        $findallotquery = mysqli_query($conn, $sql);
        $findallot = mysqli_fetch_assoc($findallotquery);
        if($findallot['Allot'] == 0)
        { 
        ?>
            <h1 style="padding-left: 290px">ROOM AND MESS ALLOTMENT</h1><br>
            <form method="POST" action="">
                <div style="padding-left: 220px">
                    <label>BLOCK - ROOM NO - AVAILABILITY<br>
                        <select name="tempname">
                            <?php
                      
                            $query = "SELECT * FROM RoomAllotment WHERE No_of_occupants < Capacity ORDER BY Room_no";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                              while($row = mysqli_fetch_assoc($result))
                              {
                                $avail = $row['Capacity']-$row['No_of_occupants'];
                                ?>
                                <option ><?php echo $row['Block']." - ".$row['Room_no'].' - '.$avail.'/'.$row['Capacity'];?></option>
                                <?php
                              }
                            }
                            ?> 
                        </select>
                    </label><br><br>
                    <label>MESS :<br>
                        <select name="Mname" required="">
                            <?php
                      
                            $query = "SELECT * FROM Mess";
                            $result = mysqli_query($conn, $query);
                            if(mysqli_num_rows($result) > 0)
                            {
                              while($row = mysqli_fetch_assoc($result))
                              {
                                ?>
                                <option ><?php echo $row['Mname'];?></option>
                                <?php
                              }
                            }
                            ?> 
                        </select>
                    </label>
                </div>
                <div style="padding-left:408px">
                    <input type="submit" name="submit" value="Save" class="button">
                </div>
            </form>
        <?php
        }
        else
        {
        ?>
            <h1 style="padding-left: 290px">ROOM AND MESS</h1><br>
            <div style="padding-left: 220px">
              <?php
                  
                  $query = "SELECT * FROM Student WHERE Reg_no = '$aid'";
                  $result = mysqli_query($conn, $query);
                  if(mysqli_num_rows($result) > 0)
                  {
                      $rows = mysqli_fetch_assoc($result);
                      ?>
                      <label> BLOCK :<br><input type="text" value="<?php echo $rows['Block'];?>" readonly></label><br><br>
                      <label> ROOM NUMBER :<br><input type="number" value="<?php echo $rows['Room_no'];?>" readonly></label><br><br>
                      <label> MESS :<br><input type="text" value="<?php echo $rows['Mname'];?>" readonly></label><br><br>

                  <?php
                  }
                  ?> 

                </div>
        <?php
        }
        ?>
    </script>
</article>
<br>
<br>
</body>

</html>
