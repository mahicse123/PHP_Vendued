<?php

$v1=0;
$v2=0;

if ($_REQUEST['email']=='admin@abc.com') {
  // code...
  $v1=1;
}


if ($_REQUEST['password']=='admin') {
  // code...
  $v2=1;
}

if ($v1==1 && $v2==1) {
  // code...
  setcookie("adminlogged","true",time()+(300));
  header("Location:admin.php");
}else{
  setcookie("adminfailed","1",time()+(60));
  header("Location:adminlogin.php");
}

 ?>
