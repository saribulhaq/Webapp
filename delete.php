<?php
include_once 'db.php';
$sql = "DELETE FROM post WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
 echo "<script>alert('Record deleted successfully')</script>";
} else {
 echo "<script>alert('Error deleting record')<script> " . mysqli_error($conn);
}
mysqli_close($conn);
?>
<a href="mainpage.php">Back to home page</a>