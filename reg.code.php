<?php
include_once 'db.php';
if($_POST['pass'] == $_POST['conf'])
{
if(isset($_POST['save']))
{
	$email=$_POST['email'];
	$username=$_POST['uname'];
	$sql="SELECT * FROM registration WHERE email='$email'";
	$un="SELECT * FROM registration WHERE u_name='$username'";
	$res = mysqli_query($conn,$sql);
	$pol = mysqli_query($conn,$un);
	if(mysqli_num_rows($res)>0)
	{
		echo "<p style='color:white;'>Email is already Taken</p>";
	}
	if(mysqli_num_rows($pol)>0)
	{
		echo "<p style='color:white;'>Username is already Taken</p>";
	}
	else 
	{
		$usname=$_REQUEST['uname'];
		$funame=$_REQUEST['fname'];
		$email=$_REQUEST['email'];
		$passw=$_REQUEST['pass'];
		$pas=md5($passw);
     $sql ="INSERT INTO registration (u_name, f_name, email, password,`join_date`) 
	        VALUES ('$usname','$funame','$email','$pas',now())";
	if(mysqli_query($conn,$sql))
	{
		echo "<p style='color:white;'>Registered Successfully</p>";
	}
	else 
	{
		echo "Error" .$sql . " " . mysqli_error($conn);
	}
	mysqli_close($conn);
	}
}
}
else 
{
	echo "<p style='color:white;'>Password should be same</p>";
}

?>
<?php
include "register.php";
?>
