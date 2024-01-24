<?php 

    include "dbconn.php";
session_start();

if (isset($_SESSION['user_id'])) {
    header("location: ./index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['create'])) {
        $pass = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($pass != $confirm_password) {
            header("location: ./page-register.php?invalid=1"); // invalid = 1 kapag hindi match ang password pati confirm password
            exit();
        }
        
        $email = $_POST['email'];

        $sql = "SELECT * FROM `faculty_user` WHERE `email` = '$email'";
        $result = $conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            header("location: ./page-register.php?invalid=3"); // invalid = 3 kapag may existing na email sa database
            exit();
        }
        $title = $_POST['title'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $campus = $_POST['campus'];
        $college = $_POST['college'];
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $status = "0";
        $authority = "Faculty Researcher";

        $sql = "INSERT INTO `faculty_user`(`title`, `first_name`, `middle_name`, `last_name`, `gender`, `email`, `password`, `college_id`, `status`, `authority`) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ./page-register.php?invalid=2"); // invalid = 2 kapag may error sa sql statement
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ssssssssss", $title, $first_name, $middle_name, $last_name, $gender, $email, $pass, $college, $status, $authority); // status = 0 ibigsabihin hindi pa verified ang account
        mysqli_stmt_execute($stmt);

        header("location: ./create.account.success.php");
        exit();
    }
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
    <title>SignUp</title>
    
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/bsu.png">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>
    
<body >
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
                                <div class="auth-form" style="padding: 25px;">
                                    


                                    <h4 class="text-center mb-4" style="font-size:25px">Register</h4>
                                    <?php  
                                        if(isset($_GET['invalid']) && $_GET['invalid'] = 1) {
                                    ?>
                                        <div class="alert alert-danger" style="display: flex; align-items: center; height: 41px; border-radius: 2px" role="alert">
                                          <span class="material-symbols-outlined">warning</span><span style="padding-left: 10px;">Incorrect Password or Confirm Password</span>
                                        </div>
                                    <?php
                                        }
                                    ?>
                                    <form action="page-register.php" method="POST" class="needs-validation">
                                        <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label style="font-size: 14px;" class="mb-1">Title</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="Title" id="title" name="title" oninput="ValidateInput()" required>
                                            <div style="font-size:14px" class="invalid-feedback">
                                                Please enter title.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label style="font-size: 14px;" class="mb-1">First Name</label>
                                            <input type="text" class="form-control form-control-lg" placeholder="First Name" id="first_name" name="first_name" oninput="ValidateInput()" required>
                                            <div style="font-size:14px" class="invalid-feedback">
                                                Please enter first name.
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <label style="font-size: 14px;" class="mb-1">Middle Name</label>
                                            <input type="text" class="form-control" placeholder="Middle Name" id="middle_name" name="middle_name" oninput="ValidateInput()" required>
                                            <div style="font-size:14px" class="invalid-feedback">
                                                Please enter middle name.
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <label style="font-size: 14px;" class="mb-1">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" id="last_name" name="last_name" oninput="ValidateInput()" required>
                                            <div style="font-size:14px" class="invalid-feedback">
                                                Please enter last name.
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-3 mb-1">
                                            <label style="font-size: 14px;" class="mb-1">Gender</label>
                                            <select id="inputState" class="default-select form-control" name="gender" required>
                                                <option selected>Choose</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-9 mb-1">
                                            <label style="font-size: 14px;" class="mb-1">Email</label>
                                            <input type="email" class="form-control" placeholder="example@g.batstate-u.edu.ph" id="email" name="email" oninput="validateInput()" required>
                                            <div style="font-size: 14px" class="invalid-feedback" id="emailFeedback">
                                                Please enter a valid email.
                                            </div>
                                            <div style="font-size: 14px; color: red;" id="existingEmailMessage"></div>
                                        </div>
                                    </div>

                                        <div class="mb-1">
                                            <label style="font-size: 14px;" class="mb-1">Campus</label>
                                            <select id="campus-select" class="default-select form-control" name="campus" required onchange="loadCollege()">
                                                <option selected>Choose Campus</option>
                                                <?php
                                                    $sql = "SELECT * FROM campus";
                                                    $result = $conn->query($sql);
                                                    while($row = $result->fetch_assoc())
                                                    {
                                                 ?>
                                                <option value="<?=$row['id']?>"><?=$row['campus_name']?></option>
                                                 <?php       
                                                    }
                                                ?>  
                                            </select>
                                        </div>
                                        <div class="mb-1">
                                            <label  style="font-size: 14px;" class="mb-1">College</label>
                                            <select id="college-select" class="default-select form-control" name="college" required>
                                            </select>
                                        </div>
                                      <div class="row">
                                        <div class="mb-1 col-md-6">
                                            <div class="mb-3 col-md-12 input-container">
                                               <label style="font-size: 14px;" class="mb-1">Password</label>
                                                <input type="password" id="password" class="form-control form-control-lg password-input" placeholder="Password" name="password" oninput="ValidateInput()" pattern=".{6,}" required>
                                                <i id="togglepassword" class="fas fa-eye password-icon"></i>
                                                <div style="font-size:14px" class="invalid-feedback">
                                                    Please enter 6 or more password.
                                                </div>
                                            </div>  
                                        </div>
                                        
                                    <div class="mb-1 col-md-6">
                                        <div class="mb-3 col-md-12 input-container">
                                            <label style="font-size: 14px;" class="mb-1">Confrim Password</label>
                                            <input type="password" id="confirm_password" class="form-control form-control-lg password-input" placeholder="Confirm Password" name="confirm_password" oninput="ValidateInput()"  pattern=".{6,}" required>
                                            <i id="toggle-confirm-password" class="fas fa-eye password-icon"></i>
                                            <div style="font-size:14px" class="invalid-feedback">
                                                Please enter confirm password
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                

                                        <div class="text-center">
                                            <button style="font-size: 14px" type="button" name="create" class="btn btn-primary btn-block" id="sign_up" onclick="ValidateEmptyInput()">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p style="font-size: 14px;">Already have an account? <a class="text-primary" href="page-login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                      </div>
   
               
              
          
       

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="vendor/global/global.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/dlabnav-init.js"></script>
<script src="js/styleSwitcher.js"></script>
<script type="text/javascript">
   
  // JavaScript for password toggle

document.addEventListener("DOMContentLoaded", function () {
    const passwordField = document.getElementById("password");
    const toggleButton = document.getElementById("togglepassword");
    
    toggleButton.addEventListener("click", function () {
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


// JavaScript for confirm password toggle
document.getElementById("toggle-confirm-password").addEventListener("click", function () {
    var confirmPasswordInput = document.getElementById("confirm_password");
    if (confirmPasswordInput.type === "password") {
        confirmPasswordInput.type = "text";
        document.getElementById("toggle-confirm-password").classList.remove("fa-eye");
        document.getElementById("toggle-confirm-password").classList.add("fa-eye-slash");
    } else {
        confirmPasswordInput.type = "password";
        document.getElementById("toggle-confirm-password").classList.remove("fa-eye-slash");
        document.getElementById("toggle-confirm-password").classList.add("fa-eye");
    }
});

</script>

<script>
    function loadCollege() {
        var campus = document.getElementById('campus-select').value;

        var college = new XMLHttpRequest();
        college.open("GET", "load.college.php?campus="+campus)
        college.send();
        college.onload = function() {
            document.getElementById('college-select').innerHTML = this.responseText;
        }
    }

    function ValidateInput() {
      var title = document.getElementById("title");
      var first_name = document.getElementById("first_name");
      var middle_name = document.getElementById("middle_name");
      var last_name = document.getElementById("last_name");
      var email = document.getElementById("email");
      var password = document.getElementById("password");
      var passwordField = document.getElementById("password");
      var toggleButton = document.getElementById("togglepassword");
      var confirm_password = document.getElementById("confirm_password");
      var submit = document.getElementById('sign_up');

      if (title.value != "") {
        title.classList.remove("is-invalid");
      }
      if(first_name.value != "") {
        first_name.classList.remove("is-invalid");
      }
      if(middle_name.value != "") {
        middle_name.classList.remove("is-invalid");
      }
      if(last_name.value != "") {
        last_name.classList.remove("is-invalid");
      }
      if(email.value != "") {
        email.classList.remove("is-invalid");
      }
      if(password.value != "") {
        password.classList.remove("is-invalid");

        if(password.type != "text") {
            toggleButton.classList.add("fa-eye");
        } else {
            toggleButton.classList.add("fa-eye-slash");
        }
    
      }
      if(confirm_password.value != "") {
        confirm_password.classList.remove("is-invalid");

        if(confirm_password.type != "text") {
            document.getElementById("toggle-confirm-password").classList.add("fa-eye");
        } else {
            document.getElementById("toggle-confirm-password").classList.add("fa-eye-slash");
        }
      }


      if (title.value == "" || first_name.value == "" || middle_name.value == "" || last_name.value == "" || email.value == "" || password == "" || confirm_password == "") {
        submit.setAttribute("type", "button");
      } else {
        submit.setAttribute("type", "submit");
      }
    }

    function ValidateEmptyInput() {
      var title = document.getElementById("title");
      var first_name = document.getElementById("first_name");
      var middle_name = document.getElementById("middle_name");
      var last_name = document.getElementById("last_name");
      var email = document.getElementById("email");
      var password = document.getElementById("password");
      var passwordField = document.getElementById("password");
      var toggleButton = document.getElementById("togglepassword");
      var confirm_password = document.getElementById("confirm_password");

      if (title.value == "") {
        title.classList.add("is-invalid");
      }
      if(first_name.value == "") {
        first_name.classList.add("is-invalid");
      }
      if(middle_name.value == "") {
        middle_name.classList.add("is-invalid");
      }
      if(last_name.value == "") {
        last_name.classList.add("is-invalid");
      }
      if(email.value == "") {
        email.classList.add("is-invalid");
      }
      if(password.value == "") {
        password.classList.add("is-invalid");
        toggleButton.classList.remove("fa-eye");
        toggleButton.classList.remove("fa-eye-slash");
      }
      if(confirm_password.value == "") {
        confirm_password.classList.add("is-invalid");
        document.getElementById("toggle-confirm-password").classList.remove("fa-eye-slash");
        document.getElementById("toggle-confirm-password").classList.remove("fa-eye");
      }
    }s
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>
</html>
