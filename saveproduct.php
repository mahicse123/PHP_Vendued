<?php

session_start();

$products=array();
$ar=array();
$file=fopen("products.txt","r") or die("file error");

while($c=fgets($file)){

  $ar=explode("-",$c);
  //echo "<br> <br>";
  //echo $ar[0];
  //echo $ar[1];
  //echo $ar[2];
  //echo $ar[3];
  $products['id']=trim($ar[1]);
}

if (empty($products['id'])) {
  $products['id']=1;
}
else {
  $products['id']+=1;
}

//echo "<br> <br>";
//echo $products['id'];

$source=$_FILES['photo']['tmp_name'];
$target="productImage/".$_FILES['photo']['name'];
move_uploaded_file($source,$target);


fclose($file);

$writef=fopen("products.txt",'a');

if((empty($_REQUEST['name']))){
  echo "<h1> product title is mandatory!</h1>";
  $v1=0;
}
else{
  $v1=1;
}

  if((empty($_REQUEST['details']))){
  echo "<h1> product details is mandatory!</h1>";
  $v2=0;
}else{
  $v2=1;
}

  if((empty($_REQUEST['price']))){
  echo "<h1> product price is mandatory!</h1>";
  $v3=0;
}else{
  $v3=1;
}

  if((empty($_REQUEST['categories']))){
  echo "<h1> please select a Category!</h1>";
  $v4=0;
}else{
  $v4=1;
}


if (empty($_FILES['photo'])) {
    echo "<h1>photo is mandatory</h1>";
  $v5=0;
}
else {
  $v5=1;
}

//echo $v1=1 && $v2=1 && $v3=1 && $v4=1;

$query="insert into products (owner,title,details,price,category,image,approved,closed) values ('$_SESSION[email]','$_REQUEST[name]','$_REQUEST[details]','$_REQUEST[price]','$_REQUEST[categories]','$target','0','0')";
$conn = mysqli_connect("localhost", "root", "","vendued");

echo $query;



if($v1==1 && $v2==1 && $v3==1 && $v4==1 && $v5==1){


  $result = mysqli_query($conn,$query);


  echo "<h1>Product inserted</h1>";
  $_SESSION['adposted']=1;

  header("Location:postad.php");
}
else {
  echo "<h3><a href='postad.php'>Back To Post Ad</a></h3>";
}



 ?>
