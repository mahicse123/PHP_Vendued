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

.wrapper h3{
  color:indigo;
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
          <a href="registration.php" class="navmenu"><li>Sign Up</li></a>
          <a href="login.php" class="navmenu"><li>Login</li></a>
        </ul>
      </div>
    </div>

 <!-- Form starts here -->
<div class="wrapper">
 <div class="fwrapper">
   <h2>Sign Up</h2>
   <form class="flexform" name="flexform" action="savergistration.php" method="post">
     <input onkeyup="selfcheck(this)" type="text" class="name" name="name" placeholder="Your Name" > <span id="namemsg"></span>
     <input onkeyup="selfcheck(this)" type="email" class="email" name="email" placeholder="Email" > <span id="emailmsg"></span><br><span id="emailajax"></span>
     <input onkeyup="selfcheck(this)" type="text" class="phone" name="phone" placeholder="Phone" > <span id="phonemsg"></span>
     <input onkeyup="selfcheck(this)" type="password" class="password" name="password" placeholder="Password" > <span id="passmsg"></span>
     <input onkeyup="selfcheck(this)" type="password" class="confpassword" name="confpassword" placeholder="Confirm Password" > <span id="confpassmsg"></span>


     <input onclick="return validate()" class="registerbutton" type="submit" value="Sign Up">


   </form>
   <div class="ftr">

   </div>
 </div>

 </div>

</body>

</html>

<script type="text/javascript">
var flag=true;
var mailflag=true;
var submitflag=true;
var pass="";
  function selfcheck(el){

    var identifier = el.name;
    console.log(identifier);


    if(identifier=="name"){
      if(!(el.value.length>3)){
        document.getElementById("namemsg").style.color="red";
        document.getElementById("namemsg").innerHTML="Enter A Valid Name";
        flag=false;
      }else{
        document.getElementById("namemsg").style.color="green";
        document.getElementById("namemsg").innerHTML="Name Validated";
        flag=true;
      }
    }

    if(identifier=="email"){
      var mail=el.value;

      var url="/vendued/fetch.php?email="+mail;

      var xmlhttp=new XMLHttpRequest();

      xmlhttp.onreadystatechange = function (){
        if(xmlhttp.readyState==4 && xmlhttp.status==200){
          if (xmlhttp.responseText=="1") {
            document.getElementById("emailajax").style.color="red";
            document.getElementById("emailajax").innerHTML=" -- Oops! But Sorry this email is already taken";
            mailflag=false;
            //console.log(flag);
          }else {
            document.getElementById("emailajax").style.color="green";
            document.getElementById("emailajax").innerHTML="";
            mailflag=true;
          }

        }
      }

      xmlhttp.open("GET",url,true);
      xmlhttp.send();


      if(mail.indexOf("@")==-1 || mail.indexOf("@")==0){
        document.getElementById("emailmsg").style.color="red";
        document.getElementById("emailmsg").innerHTML="Enter A Valid Mail";
        flag=false;
      }else{
        document.getElementById("emailmsg").style.color="green";
        document.getElementById("emailmsg").innerHTML="Email Syntax is Correct ";
        flag=true;
      }

    }

    if(identifier=="phone"){

        if(isNaN(el.value) || (el.value.length<5) ){
          document.getElementById("phonemsg").style.color="red";
          document.getElementById("phonemsg").innerHTML="Phone Number Cannot Have Characters & Must Me Above 5 digits";
          flag=false;
        }else{
          document.getElementById("phonemsg").style.color="green";
          document.getElementById("phonemsg").innerHTML="Number Validated";
          flag=true;
        }


    }

    if(identifier=="password"){
      if(!(el.value.length>4)){
        document.getElementById("passmsg").style.color="red";
        document.getElementById("passmsg").innerHTML="Password Must Be At Least 5 Characters Long";
        flag=false;
      }else{
        document.getElementById("passmsg").style.color="green";
        document.getElementById("passmsg").innerHTML="Password Validated";
        flag=true;
        pass = el.value;
        console.log(pass);
      }
    }

    if(identifier=="confpassword"){
      if(!(el.value==pass)){
        document.getElementById("confpassmsg").style.color="red";
        document.getElementById("confpassmsg").innerHTML="Passwords Dont Match";
        console.log(pass);
        flag=false;
      }else{
        document.getElementById("confpassmsg").style.color="green";
        document.getElementById("confpassmsg").innerHTML="Password Matched";
        flag=true;
      }
    }

  }


  function validate(){
    if(document.flexform.name.value==""){
      document.getElementById("namemsg").style.color="red";
      document.getElementById("namemsg").innerHTML="Enter A Valid Name";
      flag=false;
    }

    if(document.flexform.email.value==""){
      document.getElementById("emailmsg").style.color="red";
      document.getElementById("emailmsg").innerHTML="Enter A Valid Mail";
      flag=false;
    }

    if(document.flexform.phone.value==""){
      document.getElementById("phonemsg").style.color="red";
      document.getElementById("phonemsg").innerHTML="Phone Number Cannot Have Characters & Must Me Above 5 digits";
      flag=false;
    }

    if(document.flexform.password.value==""){
      document.getElementById("passmsg").style.color="red";
      document.getElementById("passmsg").innerHTML="Password Must Be At Least 5 Characters Long";
      flag=false;
    }

    if(document.flexform.confpassword.value==""){
      document.getElementById("confpassmsg").style.color="red";
      document.getElementById("confpassmsg").innerHTML="Passwords Dont Match";
      flag=false;
    }

    if(flag && mailflag){
      submitflag=true;
    }else {
      submitflag=false;
    }

    //console.log(submitflag);
    //flag=false;
    return submitflag;
  }

</script>
