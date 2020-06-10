<?php

$query="update products set approved='1' where id='$_REQUEST[id]'";

$conn = mysqli_connect("localhost", "root", "","vendued");

$result = mysqli_query($conn,$query);

header("Location:admin.php")

?>
