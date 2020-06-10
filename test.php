<?php

$ar=array();
$product=array();
//$products=array();



  $query="select * from products where approved='1' and id='3'";
  $conn = mysqli_connect("localhost", "root", "","vendued");
  $result = mysqli_query($conn,$query);

      while($row=mysqli_fetch_assoc($result)){
        $ar[]=$row;
      }

      $jsonproduct=json_encode($ar);

      $products=json_decode($jsonproduct);

print_r($products);

echo $products[0]->id;
echo "<br>";
echo $products[0]->details;
echo "<br>";

  //print_r($currentproduct);
  //$products=$currentproduct;
//  echo '/vendued/'.$products[0]['image'];


 ?>
