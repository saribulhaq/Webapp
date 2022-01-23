<?php
include_once 'db.php';
if(!isset($_SESSION['loggedinId']))
{
	header('location:index.php');
}
if(isset($_SESSION['uname']))
{
	
}

$result = mysqli_query($conn,"SELECT * FROM post");
$userid=$_SESSION['loggedinId'];
$getdata=mysqli_query($conn,"SELECT * FROM registration WHERE id='$userid'");
$row=mysqli_fetch_assoc($getdata);

?>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="mainpage">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
<div>
        <header><img src=" images/pic" /></header>
</div>
<hr class="l">
<form method="POST" action="login_code.php">
<nav>
<div class="searchbox">
<img src="images/search.png">
<input type="text" name="searchh" placeholder="Search">
</div>

 <section class="s4">
      <a href="mainpage.php" class="iconbtn fas fa-home"></a>
      <a href="" class="iconbtn fas fa-comment-alt"></a>
      <a href="profile.php" class="iconbtn fas fa-user"></a>
      <a href="settings.php" class="iconbtn fas fa-cog"></a>
    </section>
<div class="pfpic">

<a href="profile.php"><img src="images/<?php echo $row['image'];?>"><a>
<a href="profile.php"><li><span style="color:white;"><?php echo $row['u_name'];?></span></li></a>
</div>
<div class="post">
<a href="post" class=".f fas fa-image">Add Post</a>
</div>
</nav>
<?php
$i=0;
while($res = mysqli_fetch_array($result)) {
?>

<tr >
<div class="un">
<td><a style="color:white; border:2px solid white;" ><?php echo $res["username"];
?></a></td>
</div>
<div class="poo">
<td><?php echo '<img
src="data:image/jpeg;base64,'.base64_encode($res['image']
).'" height="300" width="300" style="margin-top:25px; border:2px solid white;"/>'; ?></td></br>
<div class="cap">
<td><a>Caption :: <?php echo $res["caption"]; ?></a></td>
</div>
<div class="lik">
<input type="radio" name="like" id="card">
<label for="card">
    <i class="fa fa-heart" aria-hidden="true"></i>
</label>

<td><a class="fas fa-comment" href="comment.php" style="color:white; margin-left:50px;">Comment</a></td>
</tr>
</div>

<?php
$i++;
}
?>

</form>
</body>
</html>