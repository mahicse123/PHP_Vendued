<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location:/vendued/unsignedbid.html");
}

 ?>

<!DOCTYPE html>


<style>

  body {
    margin: 0;
    padding: 0;
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

  .content{
    overflow:Auto;
  }

  .bidwindow{
    width:850px;
    display:float;
    margin: 200px auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
    overflow:auto;

  }

  .winner{
    display:float;
    float:left;
    width:795px;
    margin-left:25px;
    text-align:center;
    margin-bottom:15px;
  }
  .text{
    font-family: 'Nunito', sans-serif;
    font-weight: bold;
    font-size: 22px;
  }

  .bidding{
    float:left;
    width:350px;
    text-align:center;
    font-family: 'Nunito', sans-serif;
    font-size: 18px;
    margin-left:25px;
  }

  .bidding img {
   border-radius: 2%;
   height: 320px;
   width: 350px;

 }

 .adtitle{
   font-weight:bold;
   font-size: 20px;
   margin-bottom: 10px;
 }

 .bidboard{
   float:left;
   text-align:center;
   font-family: 'Nunito', sans-serif;
   width:450px;

 }

 .offeredprices{
   font-size: 18px;
   font-weight:bold;
 }

.bids{
  overflow-y: auto;
  overflow-x: hidden;
  height:400px;
}

 table{
   width:100%;
   margin-left:6px;
 }

th{
  position: sticky;
  top: 0;
  background-color: #5ECC88;
}

  table td, table th {
   color: #2b686e;
   padding: 10px;
 }

  table td {
   text-align: center;
   vertical-align: middle;
 }

 table tr{
   width: 100%;
 }

 .tablehead {
  background-color: #5ECC88;
}


.price{
  background: rgba(255,255,255,0.6);
  border-color: transparent;
  border-bottom: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 80%;
}

.registerbutton{
  margin: 0 auto;
  background: indigo;
  border: 2px solid black;
  border-radius: 5px;
  padding: 10px;
  color: white;
  width: 20%;
  cursor: pointer;
  margin-top: 10px;
  margin-bottom: 10px;
}

.registerbutton:hover {
background-color:white;
color:black;
}

.topbidder{
  color:red;
}

.endedbid{
  margin: 0 auto;
  background: indigo;
  border: 2px solid black;
  border-radius: 5px;
  padding: 10px;
  color: white;
  width: 40%;
  cursor: pointer;
  margin-top: 10px;
  margin-bottom: 10px;
}

.endedbid:hover{
  cursor: default;
}


</style>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <title>Bidding | Vendued</title>
  </head>
  <body>

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

    //fclose($file);

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
          </ul>
        </div>
      </div>

      <div class="bidwindow">
        <div class="winner">
          <div class="text">
            Offer Your Price <br> Highest One Will Be Elected Winner
            <?php// echo $products[0]['image'];



             ?>
          </div>
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

              echo "<h5 style='color:indigo'> Price Estimated By Owner: ".$products[0]['price']."/- </h5>";

              echo '<input type="number" id="offeredprice" value="' .$products[0]["price"]. '" hidden>';

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
          <div class="offeredprices">
            Offered Prices
          </div>
          <div class="bids">
            <table>
              <thead>

                <tr class="tablehead">
                  <th>Bidder</th>
                  <th>Price</th>
                </tr>
              </thead>

              <tr>
                <?php

                $prdct=array();
                $bidlist=array();
                $query="select * from bids where pid='$_REQUEST[id]'";
                $conn = mysqli_connect("localhost", "root", "","vendued");
                $result = mysqli_query($conn,$query);
                while($row = mysqli_fetch_assoc($result)){
                  $prdct['bidder']=$row['name'];
                  $prdct['bidprice']=$row['price'];
                  $bidlist[]=$prdct;
                }




                //print_r($bidlist);
                //echo "<br>";
                //echo $_SESSION['name'];
                $prices=array();
                $persons=array();
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
                  echo '<td>'.$b['bidder'].'</td>
                        <td>'.$b['bidprice'].'/- </td>
                          </tr>';
                }
              }
              //echo "<br>";
              //print_r($prices);
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


              //echo "<br>";
              //echo $index;
              //echo "<br>";
              //echo $persons[$index];

                ?>



            </table>
          </div>
          <div class="offer">
            <div class="topbidder">

              <?php
               if ($index==-1) {
                 // code...
                 echo 'Top Bidder: No Bids Yet';
               }else {
                 // code...
                 echo 'Top Bidder: '.$persons[$index];
                 echo '<br> Offered Price: '.$prices[$index].'/-';
               }

               ?>
            </div>
            <div class="offerform">
              <?php
              echo '<form class="" action="/vendued/savebid.php" method="post" name="priceform">';

              $ids=array();


              $query="select * from closedbids where pid='$_REQUEST[id]'";
              $conn = mysqli_connect("localhost", "root", "","vendued");
              $result = mysqli_query($conn,$query);
              while($row = mysqli_fetch_assoc($result)){
                $ids[]=$row['pid'];
              }

              //echo $products[0]['id'];
              $flag=-1;
              foreach ($ids as $value) {
                // code...

                if ($value==$products[0]['id']) {
                  // code...
                  $flag=1;
                }
              }
               ?>

                <input type="number" class="price" name="price" onkeyup="selfcheck(this)" placeholder="Your Price">
                <br>
                <span id="pricemsg"></span>
                <br>
                <input type="number" class="price" name="id" value="<?php echo $products[0]['id']; ?>" hidden>
                <input type="number" class="price" name="name" value="<?php echo $_SESSION['name']; ?>" hidden>
                <?php

                if($flag==-1){
                  echo '<input class="registerbutton" onclick="return validate()" type="submit" value="Offer">';
                }else{
                  echo '<input class="endedbid" type="submit" value="Bid Closed!" disabled>';
                }

                 ?>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

  </body>
</html>

<script type="text/javascript">
var flag=true;
var pass="";
  function selfcheck(el){

    var offeredprice = document.getElementById("offeredprice").value;
    var identifier = el.name;
    //console.log(identifier);
    var inputprice = parseInt(el.value);
    console.log(offeredprice);
    console.log(inputprice);
    var b = offeredprice > inputprice;
    console.log(b);
    if(identifier=="price"){
      if(!(inputprice>=offeredprice)){
        document.getElementById("pricemsg").style.color="red";
        document.getElementById("pricemsg").innerHTML="An Offer Must Be Equal Or Greater Than Owner Expected Price";
        flag=false;
      }else{
        document.getElementById("pricemsg").style.color="green";
        document.getElementById("pricemsg").innerHTML="Safe Price To Bid";
        flag=true;
        pass = el.value;
        //console.log(pass);
      }
    }
  }


  function validate(){

    if(document.priceform.price.value==""){
      document.getElementById("pricemsg").style.color="red";
      document.getElementById("pricemsg").innerHTML="An Offer Must Be Equal Or Greater Than Owner Expected Price";
      flag=false;
    }

    return flag;
  }
</script>
