<?php
      session_start();
      include('init.php');
      $aid=$_SESSION['Reg_no'];
      if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
      } 

      if(isset($_POST['submit']))
      {
        
        $nameid = $_POST['nameid'];
        $subject=$_POST['subject'];
        $complaint=$_POST['complaint'];
        $W_id = explode(" - ",$nameid);
        $sql = "INSERT INTO Complaints VALUES ('$aid','$W_id[0]','$subject','$complaint')";

        if (mysqli_query($conn, $sql)) 
            echo"<script>alert('Complaint Sent!');</script>";

        else
            echo"<script>alert('Error in sending complaint');</script>".mysqli_error($conn);
        mysqli_close($conn);
      }
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        input[type=text],[type = email],[type = number],textarea
        {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=text],[type = datetime-local],[type = number]{
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        select
        {
            width: 300px;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus,[type=number]:focus,[type=email]:focus,textarea:focus
        {
            background-color: #ddd;
            outline: none;
        }

        .button
        {
            background-color: blue;
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

        header 
        {
            height: 110px;
            width: 100%;
            padding-top: 1px;
            background-color: black;
            color: red;
        }

        header p 
        {
            font-size: 35px;
            padding-left: 30px;
        }

        nav
        {
            float :left;
        }
        ul 
        {
            list-style-type: none;
            margin: 0;
            padding: 0 ;
            width: 205px;
            height: 1369px;
            background-color: grey;
        }
       
        li a 
        {
            display: block;
            color: #000;
            padding: 20px 16px;
            font-size: 25px;
            text-decoration: none;
        }

        article 
        {
            float: left;
            padding-left: 40px;
            padding-top: 25px;
        }
       
        li a:hover 
        {
            background-color: #555;
            color: white;
        }

    </style>
</head>
<body>
    <header><p align="center">PES UNIVERSITY BOYS HOSTEL</p></header>
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
            ?>
            <h1 align="center" style="padding-left: 100px"> COMPLAINT PAGE </h1>
            <form method="post" action="">
              <label>REGISTRATION NO :<br><input type="number" name="Reg_no" value="<?php echo $rows['Reg_no'];?>" readonly/></label><br><br>
              <label>WARDEN ID - WARDEN NAME:<br>
              <select name="nameid" required="">
                    <?php
                        $query = "SELECT * FROM Warden";
                        $widres = mysqli_query($conn, $query);
                        if(mysqli_num_rows($widres)>0){
                            while($row = mysqli_fetch_assoc($widres))
                            {
                            ?>
                                <option ><?php echo $row['W_id']." - ".$row['Wname'];?></option>
                            <?php
                            }
                        }?>
                </select>
               </label><br><br>
              <label> NAME <br><input type="text" name="name" autofocus size="50" value="<?php echo $rows['Firstname'].' '.$rows['Lastname'];?>" readonly></label><br><br>
              <label> Mobile.NO <br><input type="number" name="mobile" size="50" maxlength="10" minlength="10" value="<?php echo $rows['Smobile1'];?>" readonly></label><br><br>
              <label> EMAIL <br><input type="email" name="email" required size="50" value="<?php echo $rows['Email'];?>" readonly></label><br><br>
              <label> BLOCK <br><input type="text" name="block" value="<?php echo $rows['Block'];?>" readonly></label><br><br>
              <label>ROOM.NO <br> <input type="text" name="roomno" size="50" value="<?php echo $rows['Room_no'];?>" readonly></label><br><br>
              <label>SUBJECT<br><input type="text" name ="subject" size="50" required=""></label><br><br>
              <label>COMPLAINT<br><textarea rows="10" cols="100" name="complaint" required=""></textarea></label><br><br>
              <div style="padding-left: 330px">
                <input type="submit" value="submit" class="button" id="hello" name="submit">
              </div>
            </form>
            <?php
        }
        ?>
        
    </article>
    <br>
    <br>
</body>
</html>
