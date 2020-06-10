<style media="screen">

body{
    margin:0;
    padding:0;
    background-color: white;
  }


  .navbar{
    display:float;
  }
  .leftnav{
    height:90px;
    width:40%;
    background-color:white;
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
    background-color:white;
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
    color: black;
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
  margin-top: 200px;
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


.phone{
  margin: 10px 5px;
  background: rgba(255,255,255,0.6);
  border-color: transparent;
  border-bottom: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 100%;
}

.password{
  margin: 10px 5px;
  background: rgba(255,255,255,0.6);
  border-color: transparent;
  border-bottom: 1px solid black;
  border-radius: 5px;
  padding: 10px;
  color: black;
  width: 100%;
}

.confpassword{
  margin: 10px 5px;
  background: rgba(255,255,255,0.6);
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

.hhh4{
  margin: 10px 5px;
  background: transparent;
  border: 0px;
  padding: 10px;
  color: black;
  width: 45%;

}

.registerbutton{
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

.registerbutton:hover {
background-color:#00cc33;
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
        </ul>
      </div>
    </div>



 <!-- Form starts here -->
<div class="wrapper">
 <div class="fwrapper">
   <h2>Admin Login</h2>
   <h3>
     <?php

     if(isset($_COOKIE['adminfailed'])){
       echo "Incorrect Username Or Password";
       setcookie("adminfailed","1",time()+(-1));
     }
      ?>
   </h3>
   <form class="flexform" name="flexform" action="adminloginverify.php" method="post">
     <input onkeyup="selfcheck(this)" type="email" class="email" name="email" placeholder="Email"> <span id="emailmsg"></span>
     <input onkeyup="selfcheck(this)" type="password" class="password" name="password" placeholder="Password"> <span id="passmsg"></span>
     <br>
     <input onclick="return validate()" class="registerbutton" type="submit" value="Login">

   </form>
   <div class="ftr">

   </div>
 </div>

 </div>

 <div style="width:100%;height:100px;background-color:black;float:left;color:white;text-align:center; margin-top:34vh;">
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

<script type="text/javascript">
var flag=true;
var pass="";
  function selfcheck(el){

    var identifier = el.name;
    console.log(identifier);


    if(identifier=="email"){
      var mail=el.value;

      if(mail.indexOf("@")==-1 || mail.indexOf("@")==0){
        document.getElementById("emailmsg").style.color="red";
        document.getElementById("emailmsg").innerHTML="Enter A Valid Mail";
        flag=false;
      }else{
        document.getElementById("emailmsg").style.color="green";
        document.getElementById("emailmsg").innerHTML="Email Syntax Validated";
        flag=true;
      }
    }



    if(identifier=="password"){
      if(!(el.value.length>2)){
        document.getElementById("passmsg").style.color="red";
        document.getElementById("passmsg").innerHTML="Password Must Be At Least 5 Characters Long";
        flag=false;
      }else{
        document.getElementById("passmsg").style.color="green";
        document.getElementById("passmsg").innerHTML="";
        flag=true;
        pass = el.value;
        console.log(pass);
      }
    }


  }


  function validate(){

    if(document.flexform.email.value==""){
      document.getElementById("emailmsg").style.color="red";
      document.getElementById("emailmsg").innerHTML="Enter A Valid Mail";
      flag=false;
    }


    if(document.flexform.password.value==""){
      document.getElementById("passmsg").style.color="red";
      document.getElementById("passmsg").innerHTML="Password Must Be At Least 5 Characters Long";
      flag=false;
    }

    return flag;
  }
</script>
