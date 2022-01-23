<?php
    include('db.php');
	if(!isset($_SESSION['loggedinId']))
{
	header('location:index.php');
}

if(isset($_REQUEST['submittt']))
{
	
		$userid=$_SESSION['loggedinId'];
		$up= mysqli_query($conn,"UPDATE `registration` SET `u_name`='$_POST[uname]', `f_name`='$_POST[fname]', `email`='$_POST[email]' WHERE `id`='$userid'");
	
	if(($_FILES['imgg']))
	{
		$img=$_FILES['imgg']['name'];
		$tmpName= $_FILES['imgg']['tmp_name'];
		$uploadDir="images/";
		move_uploaded_file($tmpName,$uploadDir.$img);
		$up= mysqli_query($conn,"UPDATE `registration` SET `image`='$img' WHERE `id`='$userid'");
	
	echo "<p style='color:white;'>Profile updated successfully</p>";
	header('location:mainpage.php');
		exit;
	}

	else
	{
		echo "<p style='color:white;'>Username,fullname and email are required</p>";
		header('location:settings.php');
		exit;
	}

}

	$userid=$_SESSION['loggedinId'];
$getdata=mysqli_query($conn,"SELECT * FROM registration WHERE id='$userid'");
$row=mysqli_fetch_assoc($getdata);


?>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="setting">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<section>
 <header><img src=" images/sett" /></header>
 </section>
 <form method="post" action="" enctype="multipart/form-data">
 <div class="back">
 <a href="mainpage.php"><img src="images/back.png" ></a>
 </div>
<div class="left">
<a href="#"><img src="images/profile.png" class="iconbtn fas fa-user"/>Edit Profile</a></br></br></br>
<a href="paschange"><img src="images/pass.png" style="background-color:white;"/>Change Password</a></br></br></br>
<a   href="logout.php"><img src="images/logout.png">Logout</a></br></br></br>
</div>

<div class="right">
<img src="images/<?php echo $row['image'];?>"></br>
<input type="file" name="imgg" onchange="view()"  accept=".jpg, .jpeg, .png">
 <input type="text" name="uname" placeholder="Enter username" class="ppp" value="<?php echo $row['u_name'];?>" > </br></br>
<input type="text" name="fname" placeholder="Enter fullname" value="<?php echo $row['f_name'];?>" > </br>
<input type="text" name="email" placeholder="Enter Email" value="<?php echo $row['email'];?>"> </br>
<p style="color:white;">Join Date: <?php echo $row['join_date'];?></p>

<input type="submit" name="submittt" value="Update">
<div class="del">
<a  href="delacc.php?id=<?php echo $row["id"];
?>"style="color:white; margin-left:30px;">Delete</a>
</div>


</div>
</form>
</body>
</html>