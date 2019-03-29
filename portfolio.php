<?php
$db = mysqli_connect("localhost","root","","portfolio");
$id=$_GET["id"];
$sql = "SELECT * FROM port_register WHERE username='$id'";
$result = mysqli_query($db,$sql);
 if(mysqli_num_rows($result) == 1){
   $row=mysqli_fetch_assoc($result);
}
?>
<html>
<head>
  <meta charset="UTF-8">
  <title>
    Meet the students of IIT Bhilai
  </title>

    <!-- CORE CSS-->
    <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->
    <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="js/plugins/prism/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <!-- font -->
      <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
      <!-- icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="height:0px;">
<div class="navbar-fixed">
  <nav style="height:60px;">
      <div class="nav-wrapper white">
        <a href="#" class="brand-logo teal-text" style="margin-top:20px;margin-left:20px;font-family: 'Arvo', serif;">Student's Portfolio</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down" style="margin-top:20px;margin-right:20px;">
          <li><a href="sass.html" class="teal-text">Search</a></li>
          <li><a href="badges.html" class="teal-text">List</a></li>
          <li><a href="login.html" class="teal-text">Login</a></li>
        </ul>
      </div>
    </nav>
</div>


    <div class="row" style="width:auto; max-width:80%; align:center; margin-top:0px">
    <div class="col s12">
      <div class="card-panel white z-depth-1">
        <p class="center login-form-text" style="font-family: 'Arvo', serif; font-size:24px;">Student's Profile</p><hr width="70%">
        <form action="#" class="column_center">
          <div class="container" style="margin-top: 30px; width:85%">
            <!-- tabs start -->
            <div class="row">
                <div class="col s12">
                  <ul class="tabs">
                    <li class="tab col s3"><a class="active" href="#test1">About</a></li>
                    <li class="tab col s3"><a href="#test2">Achievements</a></li>
                    <li class="tab col s3"><a href="#test3">Projects</a></li>
                    <li class="tab col s3"><a href="#test4">Experiences</a></li>
                  </ul>
                </div>



              </div>
              <!-- tabs end -->

              <div class="row">
                <div class="col s4">
                <img class="responsive-img" src="dp.png" style="max-width: 100%">
                <p><strong><?php echo $row["name"];?></strong><br><i>
                  <?php if($row["dept"]==1)
                          echo "Computer Science Engineering";
                        else if($row["dept"]==2)
                          echo "Electrical Engineering";
                        else if($row["dept"]==3)
                          echo "Mechanical Engineering";
                ?><br>Class of 20<?php $roll = $row["rollno"]; echo $roll[1].$roll[2];?></i></p>
              </div>
              <div class="col s7 offset-s1">


                <div id="test1">
                  <p style="font-family: 'Arvo', serif; font-size:20px;"><strong>Meet&nbsp </strong><?php echo $row["name"];?></p>
                  <?php echo $row["about"];?> </div>

              <div id="test2">
                <p style="font-family: 'Arvo', serif; font-size:20px;"><strong>Achievements</strong></p>
                These are my achievements:
                <br><?php echo $row["achievements"];?>
             </div>

             <div id="test3">
               <p style="font-family: 'Arvo', serif; font-size:20px;"><strong>Projects</strong></p>
               <?php echo $row["projects"];?>
            </div>

            <div id="test4">
              <p style="font-family: 'Arvo', serif; font-size:20px;"><strong>Experiences</strong></p>
              <?php echo $row["experiences"];?> </div>

              </div>
              </div>

            </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="page-footer white">
    <div class="footer-copyright white" style="height:40px">
      <div class="container teal-text">
      © 2019 Saksham Bhushan
      <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
      </div>
    </div>
  </footer>

  <!-- ================================================
  Scripts
  ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
  <!--angularjs-->
  <!-- <script type="text/javascript" src="js/plugins/angular.min.js"></script> -->
  <!--materialize js-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--angular-materialize js-->
  <!-- <script type="text/javascript" src="js/plugins/angular-materialize.js"></script> -->
  <!--prism -->
  <script type="text/javascript" src="js/plugins/prism/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <!-- chartist -->
  <!-- <script type="text/javascript" src="js/plugins/chartist-js/chartist.min.js"></script> -->

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="js/plugins.min.js"></script>
  <!--custom-script.js - Add your own theme custom JS-->
  <script type="text/javascript" src="js/custom-script.js"></script>





</body>
<style>
  html {
  background: url(img/background.png) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  height:100%;
}
  body{
    height:100%;
  }
  .wrapper {
    min-height: 100%;

    /* Equal to height of footer */
    /* But also accounting for potential margin-bottom of last child */
    margin-bottom: 0px;
  }
  .footer {
    height: 100px;
      line-height: 0px;
  }

  nav {
          height: 20px;
      line-height: 20px;
  }
</style>

<script type="text/javascript">
var instance = M.Tabs.init(el, options);
</script>


</html>
