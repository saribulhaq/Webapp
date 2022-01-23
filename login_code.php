<?php
include_once 'db.php';
if(isset($_SESSION['loggedinId']))
{
	header('location:mainpage.php');
}
if(isset($_POST['submit']))
{
	$email=$_POST['uname'];
	$pas=$_POST['passwo'];
	$pass=md5($pas);
	$sql="SELECT * FROM registration WHERE u_name='$email' && password='$pass'";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)>0)
	{
		$rt=mysqli_fetch_assoc($res);
		$userid=$rt['id'];
		$_SESSION['loggedinId']=$userid;
		$_SESSION['uname']=$email;
		header('Location:mainpage.php');
		
	}
	else
	{
		echo "<script>alert('Invalid Username or Password')</script>";
		include 'index.php';
	}
}

?>