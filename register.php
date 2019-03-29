<?php
session_start(); //starts all the sessions
if($_SESSION["email"] == NULL) {
   header('Location: login.php'); //take user to the login page if there's no information stored in session variable
}
$email=$_SESSION["email"];
$db = mysqli_connect("localhost","root","","portfolio");

$sql2 = "SELECT * FROM port_register WHERE username='$email'";
$result2 = mysqli_query($db,$sql2);
 if(mysqli_num_rows($result2) == 1){
   $row=mysqli_fetch_assoc($result2);
}
if(isset($_POST['register'])) {
  $username = mysqli_real_escape_string($db, $_SESSION["email"]);
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $rollno = mysqli_real_escape_string($db, $_POST['rollno']);
  $dept = mysqli_real_escape_string($db, $_POST['dept']);
  $img = mysqli_real_escape_string($db, $_POST['img']);
  $about = mysqli_real_escape_string($db, $_POST['about']);
  $achievements = mysqli_real_escape_string($db, $_POST['achievements']);
  $projects = mysqli_real_escape_string($db, $_POST['projects']);
  $experiences = mysqli_real_escape_string($db, $_POST['experiences']);


  $sql2 = "SELECT * FROM port_register WHERE username='$email'";
  $result2 = mysqli_query($db,$sql2);

  if(mysqli_num_rows($result2) == 0 && mysqli_error($db)==NULL)
  {
    $sql = "INSERT INTO port_register (username, name, rollno, dept, img, about, achievements, projects, experiences) VALUES ('$username','$fullname','$rollno','$dept','$img','$about', '$achievements', '$projects', '$experiences');";
    $result = mysqli_query($db,$sql);

    $msg = "User Registered <br>For editing your portfolio, edit the fields you wish to change";
    $box = "green";
  }
  else if(mysqli_num_rows($result2) == 1 && mysqli_error($db)==NULL)
  {
    $sql = "UPDATE port_register SET name='$fullname', rollno='$rollno', dept='$dept', img='$img', about='$about', achievements='$achievements', projects= '$projects', experiences='$experiences' WHERE username='$username'";
    $result = mysqli_query($db,$sql);
    $msg = "User's Portfolio Updated";
    $box = "green";
  }
  else if(mysqli_error($db)!=NULL)
  {
    $msg = "User Registration failed!";
    $box = "red";
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
          <li><a href="badges.html" class="teal-text">List</a></li>
          <li><a href="logout.php" class="teal-text">Logout</a></li>
        </ul>
      </div>
    </nav>
</div>


    <div class="row" style="width:auto; max-width:80%; align:center; margin-top:0px">
    <div class="col s12">
      <div class="card-panel white z-depth-1">
        <p class="center login-form-text" style="font-family: 'Arvo', serif; font-size:24px;">Student's Registration</p><hr width="70%">

        <?php if(isset($msg)) { ?>
          <div class="card-panel <?php echo $box; ?> z-depth-0">
              <span class="white-text"><?php echo $msg; ?></span>
          </div>
        <?php }?>

            <form action="register.php" method="post">
              <div class="row">
                <div class="container">
                  <div class="row">
                    <div class="input-field col s7">
                    <input id="name" type="text" name="fullname" value="<?php if(isset($row)){ echo $row["name"]; }?>">
                    <label for="name">Name</label>
                    </div>

                  <div class="input-field col s5">
                  <input id="roll" type="text" name="rollno" value="<?php if(isset($row)){ echo $row["rollno"]; }?>">
                  <label for="roll">Roll No.</label>
                  </div>
                </div>

                <div class="row">
                <div class="input-field col s6">
                  <select name="dept">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1" <?php if(isset($row)){ if($row["dept"]==1) echo "selected"; }?>>Computer Science Engineering</option>
                    <option value="2" <?php if(isset($row)){ if($row["dept"]==2) echo "selected"; }?>>Electrical Engineering</option>
                    <option value="3" <?php if(isset($row)){ if($row["dept"]==3) echo "selected"; }?>>Mechanical Engineering</option>
                  </select>
                  <label>Department</label>
                </div>

                <div class="file-field input-field col s6">
                  <div class="btn">
                    <span>Upload Profile Picture</span>
                    <input type="file" enctype="multipart/form-data">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" name="img" value="<?php if(isset($row)){ echo $row["img"]; }?>">
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">mode_edit</i>
                  <textarea id="about" class="materialize-textarea" name="about"><?php if(isset($row)){ echo $row["about"]; }?></textarea>
                  <label for="about">About</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">card_membership</i>
                  <textarea id="achievements" class="materialize-textarea" name="achievements"><?php if(isset($row)){ echo $row["achievements"]; }?></textarea>
                  <label for="achievements">Achievements</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">lightbulb_outline</i>
                  <textarea id="projects" class="materialize-textarea" name="projects"><?php if(isset($row)){ echo $row["projects"]; }?></textarea>
                  <label for="projects">Projects</label>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s12">
                  <i class="material-icons prefix">timeline</i>
                  <textarea id="experiences" class="materialize-textarea" name="experiences"><?php if(isset($row)){ echo $row["experiences"]; }?></textarea>
                  <label for="experiences">Experiences</label>
                </div>
              </div>


                  <div class="row center">
                    <button class="btn waves-effect waves-light" type="submit" name="register">Register
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
