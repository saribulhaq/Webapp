
<?php
include_once 'db.php';
$sql = "DELETE FROM registration WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
 echo "<script>alert('Your account has been deleted successfully')</script>";
} else {
 echo "<script>alert('Error deleting record')<script> " . mysqli_error($conn);
}
mysqli_close($conn);
?>
<a style="color:red;" href="index.php">Go to Login page</a></br></br></br></br>
<a style="color:red; margin-top:50px;" href="register.php">Go to Registration page</a>
