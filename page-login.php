<?php
include 'dbconn.php';
session_start();

if (isset($_SESSION['user_id'])) {
  if ($row['authority'] == "System Admin") {
    header('location: ./systemadmin/');
  } elseif ($row['authority'] == "Vice Chancellor for Research, Development & Extension Services") {
    header('location: ./vcrdes/');
  } elseif ($row['authority'] == "Head Research") {
    header('location: ./headresearch/');
  } elseif ($row['authority'] == "Dean/Associate Dean") {
    header('location: ./dean/');
  } elseif ($row['authority'] == "College Research Coordinator") {
    header('location: ./researchcoordinator/');
  } else {
    header('location: ./');
  }
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <meta name="robots" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
  <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
  <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
  <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
  <meta name="format-detection" content="telephone=no">

  <!-- PAGE TITLE HERE -->
  <title>Login</title>

  <!-- FAVICONS ICON -->
  <link rel="shortcut icon" type="image/png" href="images/bsu.png">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
  <div class="row">
    <div class="col-md-6">
      <div class="text-center mb-3">
        <a href="#"><img src="images/bsu.png" height="350px" alt="" style="margin-top: 125px"></a>
      </div>
      <div style="padding-left: 185px; font-size: 20px; font-weight: 500;">
        <label>BATANGAS STATE UNIVERSITY</label>
      </div>
    </div>
    <div class="col-md-6">
      <div class="auth-form" style="margin-top: 100px;">
        <h4 style="font-size:25px" class="text-center mb-4">Welcome to ReAcT</h4>
        <?php
        if (isset($_GET['invalid']) && $_GET['invalid'] == 3) {
        ?>
          <div class="alert alert-danger" style="display: flex; align-items: center; height: 41px; border-radius: 2px" role="alert">
            <span class="material-symbols-outlined">warning</span><span style="padding-left: 10px;">Incorrect Email or Password</span>
          </div>
        <?php
        } elseif (isset($_GET['invalid']) && $_GET['invalid'] == 2) {
        ?>
          <div class="alert alert-danger" style="display: flex; align-items: center; height: 41px; border-radius: 2px" role="alert">
            <span class="material-symbols-outlined">warning</span><span style="padding-left: 10px;">Email not yet verified</span>
          </div>
        <?php
        }
        ?>
        <form action="#" method="post">
          <div class="mb-3">

            <label style="font-size:14px" class="mb-1">Email</label>
            <input type="email" class="form-control" placeholder="example@g.batstate-u.edu.ph" id="email" name="email" oninput="ValidateInput()" required>
            <div style="font-size:14px" class="invalid-feedback">
              Please enter email.
            </div>
          </div>
          <div class="mb-3">
            <div class="mb-3 col-md-12 input-container">
              <label style="font-size:14px" class="mb-1">Password</label>
              <input type="password" id="password" class="form-control form-control-lg password-input" placeholder="Password" name="password" oninput="ValidateInput()" required>
              <i id="togglepassword" class="fas fa-eye password-icon"></i>
              <div style="font-size:14px" class="invalid-feedback">
                Please enter password.
              </div>
            </div>
          </div>
          <!-- <div class="row d-flex justify-content-between mt-2 mb-2">
                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div> -->
          <div class="text-center">
            <button style="font-size:14px" type="button" name="submit" onclick="ValidateEmptyInput()" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </form>
        <div class="row">
          <div class="col new-account mt-3">
            <p style="font-size: 14px;">Don't have an account? <a class="text-primary" href="page-register.php">Sign up</a></p>
          </div>
          <div class="col mt-3">
            <a style="padding-left: 157px; font-size: 14px" href="page-forgot-password.php">Forgot Password?</a>
          </div>
        </div>
      </div>


    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `faculty_user` WHERE email = ? AND status = 1";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("location: ./page-login.php?invalid=1"); // invalid = 1 kapag may error sa sql statement
          exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email); // status = 0 ibigsabihin hindi pa verified ang account
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
          $sql = "SELECT * FROM `faculty_user` WHERE `email` = ?";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ./page-login.php?invalid=1"); // invalid = 1 kapag may error sa sql statement
            exit();
          }

          mysqli_stmt_bind_param($stmt, "s", $email); // status = 0 ibigsabihin hindi pa verified ang account
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);
          $row = mysqli_fetch_assoc($result);

          $password_hashed = $row['password'];
          if (password_verify($password, $password_hashed)) {
            $_SESSION["user_id"] = $row['id'];
            $_SESSION['authority'] = $row['authority'];
            $_SESSION['college'] = $row['college_id'];

            if ($row['authority'] == "System Admin") {
              echo '
                        <script>
                            swal({
                              title: "Success!",
                              text: "Successfully Logged In!",
                              icon: "success",
                              button: "Continue",
                            }).then((e)=>{
                                location.href = "./systemadmin/";
                            });
                        </script>
                    ';
            } elseif ($row['authority'] == "Vice Chancellor for Research, Development & Extension Services") {
              echo '
                        <script>
                            swal({
                              title: "Success!",
                              text: "Successfully Logged In!",
                              icon: "success",
                              button: "Continue",
                            }).then((e)=>{
                                location.href = "./vcrdes/";
                            });
                        </script>
                    ';
            } elseif ($row['authority'] == "Head Research") {
              echo '
                        <script>
                            swal({
                              title: "Success!",
                              text: "Successfully Logged In!",
                              icon: "success",
                              button: "Continue",
                            }).then((e)=>{
                                location.href = "./headresearch/";
                            });
                        </script>
                    ';
            } elseif ($row['authority'] == "Dean/Associate Dean") {
              echo '
                        <script>
                            swal({
                              title: "Success!",
                              text: "Successfully Logged In!",
                              icon: "success",
                              button: "Continue",
                            }).then((e)=>{
                                location.href = "./dean/";
                            });
                        </script>
                    ';
            } elseif ($row['authority'] == "College Research Coordinator") {
              echo '
                        <script>
                            swal({
                              title: "Success!",
                              text: "Successfully Logged In!",
                              icon: "success",
                              button: "Continue",
                            }).then((e)=>{
                                location.href = "./researchcoordinator/";
                            });
                        </script>
                    ';
            } else {
              echo '
                        <script>
                            swal({
                              title: "Success!",
                              text: "Successfully Logged In!",
                              icon: "success",
                              button: "Continue",
                            }).then((e)=>{
                                location.href = "./index.php";
                            });
                        </script>
                    ';
            }
          } else {
            header('location: ./page-login.php?invalid=3'); //invalid = 3 kapag mali ang password
            exit();
          }
        } else {
          header("location: ./page-login.php?invalid=2"); //invalid = 2 kapag walang existing email sa database
          exit();
        }
      }
    }
    ?>
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function() {
        const passwordField = document.getElementById("password");
        const toggleButton = document.getElementById("togglepassword");

        toggleButton.addEventListener("click", function() {
          if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleButton.classList.remove("fa-eye");
            toggleButton.classList.add("fa-eye-slash");
          } else {
            passwordField.type = "password";
            toggleButton.classList.remove("fa-eye-slash");
            toggleButton.classList.add("fa-eye");
          }
        });
      });
    </script>
    <script>
      function ValidateInput() {
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var passwordField = document.getElementById("password");
        var toggleButton = document.getElementById("togglepassword");


        if (email.value != "") {
          email.classList.remove("is-invalid");
        }
        if (password.value != "") {
          password.classList.remove("is-invalid");

          if (password.type != "text") {
            toggleButton.classList.add("fa-eye");
          } else {
            toggleButton.classList.add("fa-eye-slash");
          }
        }


        if (email.value == "" || password == "") {
          submit.setAttribute("type", "button");
        } else {
          submit.setAttribute("type", "submit");
        }
      }

      function ValidateEmptyInput() {
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var passwordField = document.getElementById("password");
        var toggleButton = document.getElementById("togglepassword");
        var isInvalid = false;

        if (email.value == "") {
          email.classList.add("is-invalid");
          isInvalid = true;
        }
        if (password.value == "") {
          password.classList.add("is-invalid");
          toggleButton.classList.remove("fa-eye");
          toggleButton.classList.remove("fa-eye-slash");
          isInvalid = true;
        }

        if (!isInvalid) {
          authenticateUser();
        }
      }

      function authenticateUser() {
        var email = document.getElementById('email').value;
        var pass = document.getElementById('password').value;
        var authenticate = new XMLHttpRequest();
        authenticate.open("GET", "login.user.php?submit&email=" + email + "&password=" + pass);
        authenticate.send();
        authenticate.onload = function() {
          var value = this.responseText;
          console.log(this.responseText);
          if (value == "System Admin") {
            swal({
              title: "Success!",
              text: "Successfully Logged In!",
              icon: "success",
              button: "Continue",
            }).then((e) => {
              location.href = "./systemadmin/";
            });
          } else if (value == "Vice Chancellor for Research, Development & Extension Services") {
            swal({
              title: "Success!",
              text: "Successfully Logged In!",
              icon: "success",
              button: "Continue",
            }).then((e) => {
              location.href = "./vcrdes/";
            });
          } else if (value == "Head Research") {
            swal({
              title: "Success!",
              text: "Successfully Logged In!",
              icon: "success",
              button: "Continue",
            }).then((e) => {
              location.href = "./headresearch/";
            });
          } else if (value == "Dean/Associate Dean") {
            swal({
              title: "Success!",
              text: "Successfully Logged In!",
              icon: "success",
              button: "Continue",
            }).then((e) => {
              location.href = "./dean/";
            });
          } else if (value == "College Research Coordinator") {
            swal({
              title: "Success!",
              text: "Successfully Logged In!",
              icon: "success",
              button: "Continue",
            }).then((e) => {
              location.href = "./researchcoordinator/";
            });
          } else if (value == "Faculty Researcher") {
            swal({
              title: "Success!",
              text: "Successfully Logged In!",
              icon: "success",
              button: "Continue",
            }).then((e) => {
              location.href = "./index.php";
            });
          } else if (value == "3") {
            location.href = "./page-login.php?invalid=3";
          } else if (value == "2") {
            location.href = "./page-login.php?invalid=2";
          }
        }
      }
    </script>

</body>

</html>