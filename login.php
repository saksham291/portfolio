<?php
  session_start();
  if(isset($_SESSION['email'])){
    if($_SESSION['email'] != NULL){
  header("location: register.php");
}
}
  $db = mysqli_connect("localhost","root","","portfolio");

  if(isset($_POST['login_btn'])) {

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($db,$sql);

    if(mysqli_num_rows($result) == 1)
    {
      $_SESSION['message'] = 'You are now logged in';
      $_SESSION['email'] = $email;
      header("location: register.php");
    }

    else
    {
      $_SESSION['message'] = 'Username/Password combination incorrect';
    }
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
          <li><a href="index.html" class="teal-text">List</a></li>
          <li><a href="login.html" class="teal-text">Login</a></li>
        </ul>
      </div>
    </nav>
</div>


    <div class="row" style="width:auto; max-width:40%; align:center; margin-top:60px; margin-bottom:100px">
    <div class="col s12">
      <div class="card-panel white z-depth-1">
        <p class="center login-form-text" style="font-family: 'Arvo', serif; font-size:24px;">Student Login</p>

        <?php if(isset($_SESSION['message'])) {
        if($_SESSION['message'] == 'Username/Password combination incorrect'){?>
          <div class="card-panel red z-depth-0">
              <span class="white-text"><?php echo $_SESSION['message'] ?></span>
          </div>
        <?php }}?>

            <form action="login.php" method="post">
              <div class="row">
                <div class="container">
                  <div class="row">
                    <div class="input-field col s8 offset-s2">
                    <input id="email" type="text" name="email">
                    <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                  <div class="input-field col s8 offset-s2">
                  <input id="pass" type="password" name="password">
                  <label for="pass">Password</label>
                  </div>
                </div><br>



                  <div class="row center">
                    <button class="btn waves-effect waves-light" type="submit" name="login_btn">Login
                      <i class="material-icons right">send</i>
                    </button>
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
