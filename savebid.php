<?php
session_start();

if(empty($_REQUEST['price'])){
  echo "Cannot Leave The Price Empty";
}
else{


print_r($_REQUEST);


$query="insert into bids(pid,bidder,name,price,closed) values ('$_REQUEST[id]','$_SESSION[email]','$_SESSION[name]','$_REQUEST[price]','0') ";
$conn = mysqli_connect("localhost", "root", "","vendued");
$result = mysqli_query($conn,$query);
echo "working";
 /* $file=fopen('bids.txt','a');
fwrite($file,$_REQUEST['id']);
fwrite($file,'-');
fwrite($file,$_SESSION['email']);
fwrite($file,'-');
fwrite($file,$_SESSION['name']);
fwrite($file,'-');
fwrite($file,$_REQUEST['price']);
fwrite($file,"\r\n");
*/

header("Location:/vendued/bid.php?id=".$_REQUEST['id']);

}
 ?>
