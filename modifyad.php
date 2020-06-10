<style media="screen">

body{
    margin:0;
    padding:0;
    background-image: url("/vendued/media/bh.jpg");
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

/*Form Starts Here*/

.wrapper{
  height:auto;
  width:600px;
  margin: 0 auto;


}

::placeholder {
  color: black;
}

.menubar{
  width: 100%;
  height: 50px;
  background:black;
}



.fwrapper{
  width: 600px;
  margin: 0 auto;
  height: auto;
  border: 1px solid black;
  border-radius: 5px;
  background: rgba(	132,112,255,0.4);
  background: transparent;
  float:left;
  margin-top: 100px;
}

.flexform{
  display:flex;
  flex-direction: row;
  flex-wrap: wrap;

}

.name{
  margin: 10px 5px;
  background: white;
  border-color: transparent;
  border-bottom: 1px solid black;
  padding: 10px;
  color: black;
  width: 100%;
}

.email{
  margin: 10px 5px;
  background: rgba(255,255,255,0.6);
  border-color: transparent;
  border-bottom: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 100%;
}


.details{
  margin: 10px 5px;
  background: rgba(255,255,255,0.6);
  border-color: transparent;
  border-bottom: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 100%;
}

.price{
  margin: 10px 5px;
  background: rgba(255,255,255,0.6);
  border-color: transparent;
  border-bottom: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 100%;
}



.photo{
  margin: 10px 5px;
  background:transparent;
  border-color: transparent;
  border-bottom: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 100%;
}


.hh4{
  margin: 10px 5px;
  background: transparent;
  border: 0px;
  padding: 10px;
  color: black;
  width: 45%;
}

.postbutton{
  margin: 0 auto;
  background: white;
  border: 2px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 20%;
  cursor: pointer;
  margin-top: 10px;
  margin-bottom: 10px;
}

.postbutton:hover {
background-color:#00cc33;
}


.payment{
  width:100%;
}

.categories{
  margin: 10px 5px;
  background: rgba(255,255,255,0.6);
  border: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 98%;
}

.wrapper h2{
  color:black;
  text-align:center;
}



</style>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Modify Ad</title>
  </head>
  <body>

    <?php

    session_start();

/*
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

    */
    $ar=array();

    $query="select * from products where approved='1' and id='$_REQUEST[id]'";
    $conn = mysqli_connect("localhost", "root", "","vendued");
    $result = mysqli_query($conn,$query);

        while($row=mysqli_fetch_assoc($result)){
          $ar[]=$row;
        }

        $jsonproduct=json_encode($ar);

        $products=json_decode($jsonproduct);


     ?>

    <div class="navbar">
      <div class="leftnav">
        <a href="index.php"><img style="float:left" src="/vendued/media\logo.png" height="60" width="60" alt=""></a>
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

 <!-- Form starts here -->
<div class="wrapper">
 <div class="fwrapper">
   <h2>Modify Your Ad</h2>
   <form class="flexform" name="flexform" action="/vendued/savemodify.php" method="post" enctype="multipart/form-data">

     <input onkeyup="selfcheck(this)" type="text" class="name" name="title" placeholder="Product Title" value="<?php echo $products[0]->title; ?>" >
     <span id="titlemsg"></span>
     <textarea onkeyup="selfcheck(this)" name="details" class="details" placeholder="Product Details" rows="5" cols="1"><?php echo $products[0]->details; ?></textarea>
     <span id="detailsmsg"></span>
     <input onkeyup="selfcheck(this)" type="number" class="price" name="price" placeholder="Give Your Base Price" value="<?php echo $products[0]->price; ?>" >
     <span id="pricemsg"></span>

     <input type="text" name="id" value="<?php echo $products[0]->id; ?>" hidden>
     <img style="margin-left: 10px;" src="/vendued/<?php echo $products[0]->image; ?>" height="150" width="150" alt="">
     <div class="hh4">
       Update Product Image
     </div>
     <input type="file" class="photo" name="photo"  placeholder="Select File" >
     <div class="hh4">
       Select Category
     </div>
     <span id="catmsg"></span>
     <select onclick="selfcheck(this)" class="Categories" name="categories">
       <option value="<?php echo $products[0]->category; ?>" selected><?php echo $products[0]->category; ?></option>
       <option value="Electronics">Electronics Appliances</option>
       <option value="Mobile">Mobile & Computers</option>
       <option value="Home">Home Appliances</option>
       <option value="Property">Property</option>
       <option value="Men's Fashion">Men's Fashion</option>
       <option value="Women's Fashion">Women's Fashion</option>
       <option value="Hobbies">Hobbies</option>
       <option value="Antiques">Antiques</option>
       <option value="Books">Books</option>
       <option value="Pet & Trees">Pet & Trees</option>
       <option value="Others">Others</option>

     </select>

     <input type="text" name="" value="<?php echo $_REQUEST['id']; ?>" hidden>

     <?php

     $_SESSION['photo']=$products[0]->image;

      ?>

     <input onclick="return validate()" class="postbutton" type="submit" value="Modify Ad">

   </form>
   <div class="ftr">

   </div>
 </div>

 </div>

</body>

</html>


<script type="text/javascript">
var flag=true;
var pass="";
  function selfcheck(el){

    var identifier = el.name;
    console.log(identifier);


    if(identifier=="title"){
      if(!(el.value.length>3)){
        document.getElementById("titlemsg").style.color="red";
        document.getElementById("titlemsg").innerHTML="Enter A Valid Title";
        flag=false;
      }else{
        document.getElementById("titlemsg").style.color="green";
        document.getElementById("titlemsg").innerHTML="Title Validated";
        flag=true;
      }
    }



    if(identifier=="details"){

        if( (el.value.length==0) ){
          document.getElementById("detailsmsg").style.color="red";
          document.getElementById("detailsmsg").innerHTML="Cannot Leave This Field Empty";
          flag=false;
        }else{
          document.getElementById("detailsmsg").style.color="green";
          document.getElementById("detailsmsg").innerHTML="Details Validated";
          flag=true;
        }

    }

    if(identifier=="price"){
      if((el.value.length==0)){
        document.getElementById("pricemsg").style.color="red";
        document.getElementById("pricemsg").innerHTML="You Must Give a Price";
        flag=false;
      }else{
        document.getElementById("pricemsg").style.color="green";
        document.getElementById("pricemsg").innerHTML="Price Validated";
        flag=true;
        //pass = el.value;
        //console.log(pass);
      }
    }


    if(identifier=="photo"){
      if((el.value.length==0)){
        document.getElementById("filemsg").style.color="red";
        document.getElementById("filemsg").innerHTML="You Must Select A Photo";
        flag=false;
      }else{
        document.getElementById("filemsg").style.color="green";
        document.getElementById("filemsg").innerHTML="Photo Validated";
        flag=true;
        //pass = el.value;
        //console.log(pass);
      }
    }


    if(identifier=="categories"){
      if((el.value.length==0)){
        document.getElementById("catmsg").style.color="red";
        document.getElementById("catmsg").innerHTML="A Category Must Be Selected";
        flag=false;
      }else{
        document.getElementById("catmsg").style.color="green";
        document.getElementById("catmsg").innerHTML="Category Validated";
        flag=true;
        //pass = el.value;
        //console.log(pass);
      }
    }



  }


  function validate(){
    if(document.flexform.title.value==""){
      document.getElementById("titlemsg").style.color="red";
      document.getElementById("titlemsg").innerHTML="Cannot Leave This Field Empty";
      flag=false;
    }

    if(document.flexform.details.value==""){
      document.getElementById("detailsmsg").style.color="red";
      document.getElementById("detailsmsg").innerHTML="Cannot Leave This Field Empty";
      flag=false;
    }

    if(document.flexform.price.value==""){
      document.getElementById("pricemsg").style.color="red";
      document.getElementById("pricemsg").innerHTML="Cannot Leave This Field Empty";
      flag=false;
    }



    if(document.flexform.categories.value==""){
      document.getElementById("catmsg").style.color="red";
      document.getElementById("catmsg").innerHTML="Cannot Leave This Field Empty";
      flag=false;
    }

    console.log(flag);
    return flag;
  }

</script>
