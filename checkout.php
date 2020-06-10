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
  width: 23%;
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
    <title>Checkout</title>
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

          <a href="" class="navmenu"><li>My Ads</li></a>
          <a href="" class="navmenu"><li>My Bids</li></a>
        </ul>
      </div>
    </div>

 <!-- Form starts here -->
<div class="wrapper">
 <div class="fwrapper">
   <h2>Give Your Delivery Address</h2>
   <form class="flexform" action="index.php" method="post">
     <input type="text" class="name" name="name" placeholder="Your Name" required>
     <textarea name="address" class="details" placeholder="Delivery Address" rows="5" cols="1"></textarea>
     <input type="number" class="price" name="phone" placeholder="Mobile Number" required>
     <input type="email" class="name" name="name" placeholder="Email" required>

     <input class="postbutton" type="submit" value="Confirm Checkout">

   </form>
   <div class="ftr">

   </div>
 </div>

 </div>

</body>

</html>
