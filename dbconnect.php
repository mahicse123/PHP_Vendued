<?php



function dbexecute($query){
  $result = mysqli_query($conn,$query);
}

function dbreturn($query){
  $result=mysqli_query($con.$query);
}

?>
