<?php

$conn = mysqli_connect("localhost", "root", "","vendued");
$query="select email from users where email='$_REQUEST[email]'";
//echo $query;
$result = mysqli_query($conn,$query);
$data=array();

while($row = mysqli_fetch_assoc($result)){
  $data[]=$row;
}

//print_r($data);

if(sizeof($data)>0){
  echo "1";
}


 ?>
