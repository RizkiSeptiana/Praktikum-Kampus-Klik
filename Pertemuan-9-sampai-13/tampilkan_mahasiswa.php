<?php 
include_once "connect.php";

$proses = mysqli_query($connect, "SELECT * FROM data") or die(mysqli_error($connect));


?>