<?php
session_start();
include('connectDB.php');
$Picture = $_POST['Picture'];
$ID = $_SESSION['ID'];

$Picture = substr($Picture,11,100);
$sql = "update profile set
Picture = '".$Picture."'
where ID = '".$ID."'";

$query = mysqli_query($cid,$sql);

?>



