<?php

//print_r($GLOBALS);
//echo "<br> <br>";


//echo "<br> <br>";
//echo "<br> <br>";

session_start();

if((empty($_REQUEST['title']))){
  echo $_REQUEST['title'];
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



if (empty($_FILES['photo']['name'])) {


  $target=$_SESSION['photo'];
}
else {

  $source=$_FILES['photo']['tmp_name'];
  $target="productImage/".$_FILES['photo']['name'];
  move_uploaded_file($source,$target);
}

unset($_SESSION['photo']);

if($v1==1 && $v2==1 && $v3==1 && $v4==1){



//print_r($products);
//echo "<br> <br>";

//echo "<br> <br>";

//echo $target;

//fclose($file);

if(isset($_SESSION['email'])){

  $query="update products set title='$_REQUEST[title]',details='$_REQUEST[details]',price='$_REQUEST[price]',category='$_REQUEST[categories]',image='$target' where id='$_REQUEST[id]' ";
  $conn = mysqli_connect("localhost", "root", "","vendued");
  $result = mysqli_query($conn,$query);

}



header("Location:/vendued/addetails.php?id=".$_REQUEST['id']."&modified=true");

}
else {
  echo "<h3><a href=/vendued/modifyad.php?id=".$_REQUEST['id'].">Back To Modify Ad</a></h3>";
}

 ?>
