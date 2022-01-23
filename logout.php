<?php
include_once 'db.php';
session_unset($_SESSION['loggedinId']);
session_destroy();
header('location:index.php');

?>
