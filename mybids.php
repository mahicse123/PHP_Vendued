<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css\mybidsStyle.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <title>My Bids | vendued</title>
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
          <a href="myads.php" class="navmenu"><li>My Ads</li></a>
          <a href="mybids.php" class="navmenu"><li>My Bids</li></a>
          <a href="postad.php" class="navmenu"><li>Post Ad</li></a>
        </ul>
      </div>
    </div>

    <?php
    session_start();
     ?>

    <div class="content">

      <div class="rightcontent">

        <h1>Active Bids</h1>
        <div class="mybidstable">

          <table cellspacing="0">

            <?php
            $ar=array();
            $bids=array();
            $query="select pid from bids where bidder='$_SESSION[email]' and closed='0' group by pid";
            $conn = mysqli_connect("localhost", "root", "","vendued");
            $result = mysqli_query($conn,$query);


            while($row = mysqli_fetch_assoc($result)){

              $bids[]=$row["pid"];
            }

            //print_r($bids);


            $ar=array();
            $product=array();
            $products=array();
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

                foreach ($bids as $b) {
                  if($products[$k]['id']==$b){
                    $otherproducts[]=$products[$k];
                  }
                }

              }
              //print_r($otherproducts);
              $products=$otherproducts;

            }else{

            }


            if(empty($products)){
              echo "<h4>-------Sorry! Looks like it's empty</h4>";
            }


            //print_r($products[11]);
            //echo "<br> <br>";
            //echo $products[11]['title'];

                      for ($i=0; $i <count($products) ; $i++) {


                        if(empty($products[$i])){
                          break;
                        }


                    echo '    <tr>
                           <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                            '.$products[$i]['details'].'
                           </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">More Options</a> </td> ';

                           ++$i;
                           if(empty($products[$i])){
                             break;
                           }


                      echo  '   <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                            '.$products[$i]['details'].'
                           </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">More Options</a> </td> ';

                           ++$i;
                           if(empty($products[$i])){
                             break;
                           }


                      echo  '   <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                            '.$products[$i]['details'].'
                           </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">More Options</a> </td> ';

                           ++$i;
                           if(empty($products[$i])){
                             break;
                           }


                      echo '     <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                            '.$products[$i]['details'].'
                           </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">More Options</a> </td> ';

                           //++$i;
                           if(empty($products[$i])){
                             break;
                           }


                      echo '</tr>';

                      }

             ?>

          </table>

        <h1>Bids I have Won</h1>

        <div class="mybidstable">

          <table cellspacing="0">

            <?php
            $ar=array();
            $bids=array();
            $query="select pid from closedbids where bidder='$_SESSION[email]' ";
            $conn = mysqli_connect("localhost", "root", "","vendued");
            $result = mysqli_query($conn,$query);


            while($row = mysqli_fetch_assoc($result)){

              $bids[]=$row["pid"];
            }

            //print_r($bids);


            $ar=array();
            $product=array();
            $products=array();
            $query="select * from products where approved='1' and closed='1'";
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

                foreach ($bids as $b) {
                  if($products[$k]['id']==$b){
                    $otherproducts[]=$products[$k];
                  }
                }

              }
              //print_r($otherproducts);
              $products=$otherproducts;

            }else{

            }

            if(empty($products)){
              echo "<h4>-------Sorry! Looks like it's empty</h4>";
            }


            //print_r($products[11]);
            //echo "<br> <br>";
            //echo $products[11]['title'];

                      for ($i=0; $i <count($products) ; $i++) {


                        if(empty($products[$i])){

                          break;
                        }


                    echo '    <tr>
                           <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                            '.$products[$i]['details'].'
                           </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">More Options</a> </td> ';

                           ++$i;
                           if(empty($products[$i])){
                             break;
                           }


                      echo  '   <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                            '.$products[$i]['details'].'
                           </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">More Options</a> </td> ';

                           ++$i;
                           if(empty($products[$i])){
                             break;
                           }


                      echo  '   <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                            '.$products[$i]['details'].'
                           </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">More Options</a> </td> ';

                           ++$i;
                           if(empty($products[$i])){
                             break;
                           }


                      echo '     <td><img src='.$products[$i]['image'].' alt="" /> <br> <b style="font-size:20px">'.$products[$i]['title'].'</b>  <br> <div class="productDetails">
                            '.$products[$i]['details'].'
                           </div> <br> <a href="bid.php/?id='.$products[$i]['id'].'" class="bidbutton">More Options</a> </td> ';

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
