<?php
session_start();
print_r($_REQUEST);

$prdct=array();
$bidlist=array();
$query="select * from bids where pid='$_REQUEST[id]'";
$conn = mysqli_connect("localhost", "root", "","vendued");
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_assoc($result)){
  $prdct['bidmail']=$row['bidder'];
  $prdct['bidder']=$row['name'];
  $prdct['bidprice']=$row['price'];
  $bidlist[]=$prdct;
}
//print_r($bidlist);
//echo "<br>";
//echo $_SESSION['name'];
$prices=array();
$persons=array();
$bidmails=array();
if(empty($bidlist)){
  echo '<td>No Bidders Yet</td>
        <td>No Prices Yet</td>

          </tr>';
}
else{
foreach ($bidlist as $b) {
  // code...
  $prices[]=$b['bidprice'];
  $persons[]=$b['bidder'];
  $bidmails[]=$b['bidmail'];
  echo '<td>'.$b['bidder'].'</td>
        <td>'.$b['bidprice'].'/- </td>
          </tr>';
}
}
//echo "<br>";
print_r($bidmails);
//echo "<br>";
$index=-1;
if (!empty($prices)) {
// code...
$highestbid=max($prices);
}

//echo $highestbid;

foreach ($prices as $k => $p) {
// code...
if ($p==$highestbid) {
  // code...
  $index=$k;
  break;
}
}

echo "<br>";
//echo $persons[$index];
echo "highest bidder ".$persons[$index]." email: ".$bidmails[$index]." price: ".$prices[$index];

$writebid=fopen('endedbids.txt','a');

$query="insert into closedbids(pid,bidder,name,price) values ('$_REQUEST[id]','$bidmails[$index]','$persons[$index]','$prices[$index]') ";
$conn = mysqli_connect("localhost", "root", "","vendued");
$result = mysqli_query($conn,$query);

$query="update products set closed='1' where id='$_REQUEST[id]'";
$conn = mysqli_connect("localhost", "root", "","vendued");
$result = mysqli_query($conn,$query);


$query="update bids set closed='1' where pid='$_REQUEST[id]'";
$conn = mysqli_connect("localhost", "root", "","vendued");
$result = mysqli_query($conn,$query);

header("Location:/vendued/declare.php?ended=true&id=".$_REQUEST['id']);


 ?>
