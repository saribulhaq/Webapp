<?php
include_once 'db.php';
 if(isset($_POST['Submit']))
 {
  $com=$_POST['Comm'];
  $re = mysqli_query($conn,"INSERT INTO post (comments) VALUES ('$com')" );
  echo "comment Uploaded successfully";
 
  
 }
  
  $userid=$_SESSION['loggedinId'];
$getdata=mysqli_query($conn,"SELECT * FROM registration WHERE id='$userid'");
$row=mysqli_fetch_assoc($getdata);
$plus= mysqli_query($conn,"SELECT * FROM post wHERE comments='$com'" );
$rrr=mysqli_fetch_assoc($plus);
?>

<html>
 <head>
  <style>
  body{
	  background-color:black;
  }
  
  </style>
 </head>

 <body>

  <form action="" method="POST">

   <label style="color:white;"> Name: 
    <input type="text" name="Name" class="Input" style="width: 225px" value="<?php echo $row['u_name'];?>">
   </label>
   <br><br>
   <label style="color:white;"> Comment: <br>
    <textarea name="Comm" class="Input" style="width: 300px" required></textarea>
   </label>
   <br><br>
   <input type="submit" name="Submit" value="Submit Comment" class="Submit"></br></br></br>
   <a style="color:white;">Comments</a></br></br></br>
   <a style="color:white;"><?php echo $row['u_name'];?> :: <?php echo $rrr['comments'];?></a></br></br></br></br></br></br></br>
   
   <a href="mainpage.php">Back to Homepage</a>

  </form>

 </body>

</html>