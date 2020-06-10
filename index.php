<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/indexStyle.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <title>Vendued</title>
  </head>
  <body>
    <div class="navbar">
      <div class="leftnav">
        <a href="index.php"><img style="float:left" src="media/logo.png" height="60" width="60" alt=""></a>
        <a href="index.php"><h1 style="float:left;margin-left:10px">vendued</h1></a>
      </div>
      <div class="rightnav">
        <ul>
          <a href="index.php" class="navmenu"><li>Home</li></a>
          <?php
          session_start();

          $log=isset($_SESSION['email']);

          if ($log==1) {
            echo "<a href='myads.php' class='navmenu'><li>My Ads</li></a>
                  <a href='mybids.php' class='navmenu'><li>My Bids</li></a>
                  <a href='postad.php' class='navmenu'><li>Post Ad</li></a>
                  <a href='logout.php' class='navmenu'><li>Logout</li></a>";
          }

                  if (!isset($_SESSION['email'])) {
                    echo "<a href='registration.php' class='navmenu'><li>Sign Up</li></a>
                          <a href='login.php' class='navmenu'><li>Login</li></a>
                          <a href='admin.php' class='navmenu'><li>Admin</li></a>";
                  }


           ?>

        </ul>
      </div>
    </div>

    <div class="content">

      <div class="leftcontent">

        <?php
        $xml=simplexml_load_file("content.xml");
        $xmlcontent=array();
        $xm=array();
        foreach ($xml->choose as $xmlchoose) {
          // code...
          $xm['title']=$xmlchoose->title;
          $xm['photo']=$xmlchoose->photo;
          $xmlcontent[]=$xm;
        }

        //print_r($xmlcontent);
         ?>


        <h2>How It Works</h2>

        <li></li>
        <div style="width:30px;height:30px;" class="">
          <img src="<?php echo $xmlcontent[0]['photo']; ?>" alt="" style="width:100%;height:100%;">
        </div>
        <h4><?php echo $xmlcontent[0]['title']; ?></h4>
        <p>Select an ad from the wide ranges of ads posted by the sellers. You will always find something to bid on to. Choose your desired product or ad and proceed to bidding.</p>
        <li></li>


        <div style="width:30px;height:30px;" class="">
          <img src="<?php echo $xmlcontent[1]['photo']; ?>" alt="" style="width:100%;height:100%;">
        </div>
        <h4><?php echo $xmlcontent[1]['title']; ?></h4>
        <p>Once selected an ad you will be presented with a bidding window. See the price initially set by the seller. Bid and offer something more than the initial price. Beware! You have a competition ahead.</p>
        <li></li>


        <div style="width:30px;height:30px;" class="">
          <img src="<?php echo $xmlcontent[2]['photo']; ?>" alt="" style="width:100%;height:100%;">
        </div>
        <h4><?php echo $xmlcontent[2]['title']; ?></h4>
        <p>So, you're not the only one here. Others will bid here too. If you really want to own the product you are bidding on, you will have to be competitive in offering price.</p>
        <li></li>


        <div style="width:30px;height:30px;" class="">
          <img src="<?php echo $xmlcontent[3]['photo']; ?>" alt="" style="width:100%;height:100%;">
        </div>
        <h4><?php echo $xmlcontent[3]['title']; ?></h4>
        <p>Finally, if you have offered the highest price and the seller has ended the bidding then congratulations! You are the winner now.</p>



      </div>

      <div class="rightcontent">
        <img src="media\banner.png" height="350" width="1450" alt="">
        <?php


        if (isset($_SESSION['register']) && $_SESSION['register']===1) {
          echo "<h1>Registration Successfull. Please Login</h1>";
          unset($_SESSION['register']);
        }

        if (isset($_SESSION['email'])) {
          echo "<h3>Logged in as ".$_SESSION["email"]."</h3>";
        //  print_r ($_COOKIE);
        //  print_r ($_SESSION);
        }
        //echo !isset($_SESSION['email']);
         ?>

        <h1>Latest Ads For Bidding</h1>

        <div class="table-users">

           <table cellspacing="0">

<?php
$ar=array();
$product=array();
$products=array();
//$file=fopen("products.txt","r");


$query="select * from products where approved='1' and closed='0'";
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

//fclose($file);

if(isset($_SESSION['email'])){

  $otherproducts=array();
  foreach ($products as $k => $p) {

    if ($products[$k]['owner']!=$_SESSION['email']) {
      $otherproducts[]=$products[$k];
    }

  }
  //print_r($products);
  $products=$otherproducts;

}else{

}


//print_r($products);
//echo "<br> <br>";
//echo $products[11]['title'];

          for ($i=0; $i <count($products) ; $i++) {


            if(empty($products[$i])){
              break;
            }


        echo '    <tr>
               <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                '.$products[$i]['details'].'
               </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">Bid This</a> </td> ';

               ++$i;
               if(empty($products[$i])){
                 break;
               }


          echo  '   <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                '.$products[$i]['details'].'
               </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">Bid This</a> </td> ';

               ++$i;
               if(empty($products[$i])){
                 break;
               }


          echo  '   <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                '.$products[$i]['details'].'
               </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">Bid This</a> </td> ';

               ++$i;
               if(empty($products[$i])){
                 break;
               }


          echo '     <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                '.$products[$i]['details'].'
               </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">Bid This</a> </td> ';

               //++$i;
               if(empty($products[$i])){
                 break;
               }


          echo '</tr>';

          }

 ?>

           </table>
        </div>

      </div>



    </div>

    <div style="width:100%;height:100px;background-color:black;float:left;color:white;text-align:center;">
      ©vendued 2019-2020 webtech project
      <br>
      instructor: md ezazul islam
      <br>
      american international university-bangladesh
      <br>
      ferdous|nusiba|nobel
    </div>

  </body>
</html>




<style >
body {
  margin: 0;
  font-family: 'Nunito', sans-serif;
}
</style>
