<?php

$query="delete from products where id='$_REQUEST[id]'";
$conn = mysqli_connect("localhost", "root", "","vendued");
$result = mysqli_query($conn,$query);

header("Location:/vendued/myads.php");

 ?>
