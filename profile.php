<?php
include_once 'db.php';
if(isset($_SESSION['uname']))
{
	
}
$userid=$_SESSION['loggedinId'];
$getdata=mysqli_query($conn,"SELECT * FROM registration WHERE id='$userid'");
$row=mysqli_fetch_assoc($getdata);
$result = mysqli_query($conn,"SELECT * FROM post WHERE username='$_SESSION[uname]'");
?>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="profile.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<div>
        <header><img src=" images/pic" /></header>
</div>
<hr class="l">
<form action="login_code.php" enctype="multipart/form-data" method="post">
<nav>
<div class="searchbox">
<img src="images/search.png">
<input type="text" placeholder="Search">
</div>

 <section class="s4">
      <a href="mainpage.php" class="iconbtn fas fa-home"></a>
      <a href="" class="iconbtn fas fa-comment-alt"</a>
      <a href="profile.php" class="iconbtn fas fa-user"></a>
      <a href="settings.php" class="iconbtn fas fa-cog"></a>
    </section>
	

<div class="pfpic">

<img src="images/<?php echo $row['image'];?>"></br>

<h2 class="usern" style="color:white;"><?php echo $row['u_name']; ?></h2>

</div>
</nav>
<div>
<?php
$i=0;
while($ress = mysqli_fetch_array($result)) {
?>

<div class="pos">
<td><?php echo '<img
src="data:image/jpeg;base64,'.base64_encode($ress['image']
).'" height="300" width="320" style="margin-top:10px; margin-left:12px; border:2px solid white;"/>'; ?></td></br>
<div style="color:white;">
<td><a style="margin-left:35px;">Caption:<?php echo $ress["caption"]; ?></a></td>
</div>
<div class="lik">
<input type="radio" name="payment" id="card">
<label for="card">
    <i class="fa fa-heart"></i>
</label>

<td><a class="fas fa-comment" href="delete.php?id=<?php echo $ress["id"];
?>"style="color:white; margin-left:30px;">Comment</a></td>
<td><a href="delete.php?id=<?php echo $ress["id"];
?>"style="color:white; margin-left:30px;">Delete</a></td>
</div>
</div>

<?php
$i++;
}
?>

</div>
</form>
</body>
</html>