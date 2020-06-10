<?php

if(isset($_COOKIE['adminlogged'])){

}else {
  header("Location:adminlogin.php");
}

 ?>


<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" class="brand-logo">vendued</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="index.php">Return Home</a></li>
                    <li><a href="adminlogout.php">Logout</a></li>
                </ul>


            </div>

        </div>
    </nav>
</head>

<style>
.nav-wrapper{
  background-color: black;
}
    .h {
        height: 300px;
    }
    .card-reveal{
        background: red;
    }
</style>

<?php
$con = mysqli_connect("localhost", "root", "", "vendued");
?>

<body>
  <div class="row">
    <div class="col-12" style="margin-top:5%; margin-left:40%">
      <h3>Pending Approval</h3>
    </div>
  </div>

    <div class="container mt">

        <div class="row">

            <?php

            $allData = mysqli_query($con, "SELECT * from products where approved='0'");
            while ($singleData = mysqli_fetch_array($allData)) { ?>

                <div class="col s6 ">
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light h">
                            <img class="activator" src="<?php echo $singleData['image'] ?>">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?php echo $singleData['title'] ?><i class="material-icons right">more_vert</i></span>
                            <p><a href="mailto:<?php echo $singleData['owner'] ?>"><?php echo $singleData['owner'] ?></a></p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?php echo $singleData['title'] ?><i class="material-icons right">close</i></span>
                            </br>
                            </br>
                            </br>
                            <p><strong>Upload Information </strong><br> Ad Details : <p><?php echo $singleData['details'] ?></p>
                          </br> <a href="adminapprove.php?id=<?php echo $singleData['id'] ?>" > Approve </a>
                            </p>
                        </div>
                    </div>

                </div>

            <?php
          }
            ?>



        </div>



    </div>






    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>
