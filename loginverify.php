<style media="screen">

body{
    margin:0;
    padding:0;
    background-image: url("media/bh.jpg");
  }


  .navbar{
    display:float;
  }
  .leftnav{
    height:90px;
    width:40%;
    background-color:black;
    float:left;
  }

  .leftnav h1{
    font-family: 'Nunito', sans-serif;
    color: #00cc33;
  }

  .leftnav img{
    margin-left: 10px;
    margin-top: 10px;
  }

  .rightnav{
    height:90px;
    width:60%;
    background-color:black;
    float:left;
  }

  .rightnav ul{
    float: right;
    margin-top: 35px;
    margin-right: 120px;
    color: white;
    list-style-type: none;
    font-family: 'Nunito', sans-serif;

  }

  .rightnav li{
    display: inline;
    font-size:18px;
    margin-left: 15px;
  }

  .navmenu{
    color: white;
    text-decoration: none;
  }

  .navmenu:hover{
    color: #00cc33;
  }

	.ctext{
		margin-top: 50vh;
		margin-left: 40%;
	}

	</style>


	<html lang="en" dir="ltr">
	  <head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width,initial-scale=1.0">
	    <title></title>
	  </head>
	  <body>

	    <div class="navbar">
	      <div class="leftnav">
	        <a href="index.php"><img style="float:left" src="media\logo.png" height="60" width="60" alt=""></a>
	        <a href="index.php"><h1 style="float:left;margin-left:10px">vendued</h1></a>
	      </div>
	      <div class="rightnav">
	        <ul>
	          <a href="index.php" class="navmenu"><li>Home</li></a>
	          <a href="registration.php" class="navmenu"><li>Sign Up</li></a>
	          <a href="login.php" class="navmenu"><li>Login</li></a>
	        </ul>
	      </div>
	    </div>

			<br>



<?php
$users=array();
$cred=array();
//$file=fopen("users.txt","r") or die("file error");


$conn = mysqli_connect("localhost", "root", "","vendued");
$query = "select * from users where email='$_REQUEST[email]'";
$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)){
	$cred["email"]=$row["email"];
	$cred["name"]=$row["name"];
	$cred["password"]=$row["password"];
	$users[$cred["email"]]=$cred;
}

//foreach($users as $u=>$v){
	//print_r($u);
	//print_r($v);
//}

echo "<div class='ctext'>";

if(empty($_REQUEST['email'])){
	$v1=0;
	echo "<h2>Email cannot be empty!</h2>";
}else{
	$v1=1;
}

if(empty($_REQUEST['password'])){
	$v2=0;
	echo "<h2>Password cannot be empty</h2>";
}else{
	$v2=1;
}


if($v1==1&&$v2==1){
	foreach($users as $u=>$v){
		//print_r($u);
		//print_r($v);
	  if ($u===$_REQUEST['email'] && $v['password']===md5($_REQUEST['password'])) {
	    echo "Login Successfull";
	    session_start();
	    $_SESSION['email']=$u;
			$_SESSION['name']=$v['name'];

	    header("Location:index.php");
	    break;
	  }else{
      setcookie("failed","1",time()+(60));
	    echo "Incorrect Username or Password";
      header("Location:login.php");
	  }
	}
}
else {
	echo "<h2><a href='login.php'>Return To Login</a></h2>";
}



echo "</div>";

?>
