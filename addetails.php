<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location:/vendued/unsignedbid.html");
}

 ?>


<style media="screen">
body {
  margin: 0;
  padding: 0;
}

</style>


<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="/vendued/css/myaddetailsstyle.css" rel="stylesheet">
    <title>Bidding | Vendued</title>
  </head>

  <?php
  $ar=array();
  $product=array();
  $products=array();
  $query="select * from products where approved='1'";
  $conn = mysqli_connect("localhost", "root", "","vendued");
  $result = mysqli_query($conn,$query);


  while($row = mysqli_fetch_assoc($result)){

    $product['owner']=$row["owner"];
    $product['id']=$row["id"];
    $product['title']=$row["title"];
    $product['details']=$row["details"];
    $product['price']=$row["price"];
    $product['category']=$row["category"];
    $product['image']=$row["image"];
    $products[]=$product;
  }

//  fclose($file);

  if(isset($_SESSION['email'])){

    $currentproduct=array();
    foreach ($products as $k => $p) {

      if ($products[$k]['id']==$_REQUEST['id']) {
        $currentproduct[]=$products[$k];
      }

    }
    //print_r($currentproduct);
    $products=$currentproduct;
  //  echo '/vendued/'.$products[0]['image'];

  }

  //print_r($products);

  ?>


  <body>


    <div class="content">

      <div class="navbar">
        <div class="leftnav">
          <a href="/vendued/index.php"><img style="float:left" src="/vendued/media/logo.png" height="60" width="60" alt=""></a>
          <a href="/vendued/index.php"><h1 style="float:left;margin-left:10px">vendued</h1></a>
        </div>
        <div class="rightnav">
          <ul>
            <a href="/vendued/index.php" class="navmenu"><li>Home</li></a>

            <a href="/vendued/myads.php" class="navmenu"><li>My Ads</li></a>
            <a href="/vendued/mybids.php" class="navmenu"><li>My Bids</li></a>
            <a href="/vendued/postad.php" class="navmenu"><li>Post Ad</li></a>
          </ul>
        </div>
      </div>

      <div class="bidwindow">
        <div class="winner">

        </div>

        <div class="bidding">
          <div class="image">
            <?php

            echo '<img src="/vendued/'.$products[0]['image'].'" alt="">';

              ?>
          </div>
          <div class="details">
            <div class="adtitle">
              <?php
              echo $products[0]['title'];

              echo "<h5 style='color:indigo'> Price Excepted By You: ".$products[0]['price']."/- </h5>";

               ?>
            </div>
             <div class="addetails">
               <?php
               echo $products[0]['details'];
                ?>
             </div>

          </div>
        </div>


        <div class="bidboard">

          <div class="offer">
            <div class="topbidder">
              <div class="text">
                <br>
                <?php
                if (isset($_REQUEST['modified'])&&$_REQUEST['modified']=="true") {
                  // code...
                  echo '

                  <div class="" style="color:red;">
                    Your Ad Has Been Modified
                  </div>

                  ';
                }
                $_REQUEST['modified']="";

                 ?>

                <br>
                Choose An Action Below

              </div>
              <br>
              <br>

              <b>Modify</b>: Edit Ad Details. Once Bidding has Started This Can't Be Done
              <br>
            </div>
            <div class="topbidder">
              <br>
              <b>Bidding Window</b>: See Current Bidding For This Product
              <br>
            </div>
            <div class="topbidder">
              <br>
              <b>Delete</b>: Click This To Delete Your Ad Anytime
              <br>
              <br>
            </div>
            <div class="offerform">
              <form class="" action="/vendued/modifyad.php/?id=<?php echo $products[0]['id']; ?>" method="post">
                <input class="modifyad" type="submit" value="Modify Ad">
              </form>
              <form class="" action="/vendued/declare.php/?ended=false&id=<?php echo $products[0]['id']; ?>" method="post">
                <input class="biddetails" type="submit" value="Bidding Window">
              </form>
              <form class="" action="/vendued/deletead.php/?id=<?php echo $products[0]['id']; ?>" method="post">
                <input onclick="return confirm('Are you sure to delete ad')" class="deletead" type="submit" value="Delete Ad">
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>


  </body>
</html>
