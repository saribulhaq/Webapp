
<html>
<head>
<title></title>
<script>
 function view()
 {
	 pic.src=URL.createObjectURL(event.target.files[0]);
 }
</script>
<link rel="stylesheet" type="text/css" href="post">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<?php
include_once 'db.php';
$msg = '';
if($_SERVER['REQUEST_METHOD']=='POST'){
 $cmt = $_POST['caption'];
 $image = $_FILES['image1']['tmp_name'];
 $fimg = file_get_contents($image);

 $sql = "insert into post (image,caption,username) values(?,'$cmt','$_SESSION[uname]')";
 $getimg = mysqli_prepare($conn,$sql);
 mysqli_stmt_bind_param($getimg, "s",$fimg);
 mysqli_stmt_execute($getimg);
 $check = mysqli_stmt_affected_rows($getimg);
 if($check==1){
 $msg = "<script>alert('Image Successfullly UPloaded')</script>";
 }else{
 $msg = "<script>alert('Error uploading image')</script>";
 }
 mysqli_close($conn);
}
?>

<form action="" enctype="multipart/form-data" method="post">
<div class="back">
 <a href="mainpage.php"><img src="images/back.png" ></a>
 </div>

	 
<div class="pfpic">
<img id="pic" src="">
<input type="text" name="caption" placeholder="Write a caption ">
<input type="file" name="image1" onchange="view()"  accept=".jpg, .jpeg, .png" >
</div>
<div class="upload">
<button class="fas fa-upload">Upload post</button>
</div>
</nav>
</form>
<?php
echo $msg;
?>
</body>
</html>