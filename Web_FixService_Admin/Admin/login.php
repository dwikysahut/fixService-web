<?php

include 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link rel="stylesheet" href="css/sb-admin-2.css?v=<?php echo time(); ?>">
</head>

<body class="bg-gradient-primary">

  <div class="container">


   
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
     
      <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                   
                  </div>
                  <?php
if (isset($_GET['login'])) {
    $pesan = addslashes($_GET['login']);
    if ($pesan == "unsuccessfull") {
        echo "<div class='col-md-19 col-sm-12 col-xs-12'>";
        echo "<div class='alert alert-danger mt-4 ml-2' role='alert'>";
        echo "<p><center>Incorrect Username or Password</center></p>";
        echo "</div>";
        echo "</div>";
    } else {

    }

} else {

}
?>
                  <form class="user" action="login_proses.php" method="post" >
                     <div class="form-group">
                       <input type="Text" required name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                     </div>
                     <div class="form-group">
                       <input type="password" required name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                     </div>
                     <div class="form-group">
                     <div class="row">
                       <div class="col-sm">
                       <div class="custom-control custom-checkbox small">
                         <input type="checkbox" class="custom-control-input" id="customCheck">
                         <label class="custom-control-label custom-margin" for="customCheck">Remember Me</label>
                       </div>
                       </div>
                       <!-- An element to toggle between password visibility -->
                       <div class="col-sm">
                       <div class="custom-control custom-checkbox small">
                         <input type="checkbox" class="custom-control-input" id="customShowPass" onclick="showPass()">
                         <label class="custom-control-label custom-margin" for="customShowPass">Show Password</label>
                       </div>
                       </div>
                       </div>
                     </div>

                    <button type="submit" class="btn btn-custom btn-user btn-block">
                      Login
                  </button>
                    <hr>
                   
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">Forgot Password?</a>
                                    </div>

                </div>



              </div>
              <div class="col-lg-3">


              </div>

            </div>




          </div>
        </div>
       
      </div>

    </div>




    <script>
function showPass() {
  var x = document.getElementById("exampleInputPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

</script>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
