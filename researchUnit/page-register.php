<?php

    include 'config.php';
    $msg="";

if (isset($_POST['submit'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));
    $code = mysqli_real_escape_string($conn, md5(rand()));

   if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
       $msg = "<div class='alert alert-danger'>{$email} -This email address has been already exists </div>";
   } else {
     if ($password === $confirm_password) {
        $sql = "INSERT INTO users (username, email, password, code) VALUES ('{$username}', '{$email}', '{$password}', '{$code}')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Something wrong went </div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
    }
   }
}

?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	
	<!-- PAGE TITLE HERE -->
    <title>Faculty Researcher Dashboard</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <?php echo $msg; ?>
                                    <form action="" method="post">
                                        <div class="mb-3">

                                            <label class="mb-1"><i class='fas fa-user-alt' style='font-size:14px'></i><strong> Username</strong></label>
                                            <input type="text" name="username" class="form-control" placeholder="username" value="<?php if (isset($_POST['submit'])) echo $username ?>"required="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><i class="fa fa-envelope" style="font-size:14px"></i><strong> Email</strong></label>
                                            <input type="email" name="email" class="form-control" placeholder="hello@example.com" value="<?php if (isset($_POST['submit'])) echo $email ?>"required="">
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><i class="fa fa-lock" style="font-size:14px"></i><strong> Password</strong></label>
                                            <input class="form-control" type="password" name="password" placeholder="Password" required="" id="id_password">
                                            <i class="far fa-eye" id="togglePassword" style="margin-left: 415px; cursor: pointer; "></i>
                                        </div>

                                        <div class="mb-3">
                                            <label class="mb-1"><i class="fa fa-lock" style="font-size:14px"></i><strong> Confirm Password</strong></label>
                                            <input class="form-control" type="password" name="confirm-password" placeholder="Enter Confirm Password" required="" id="id_password">
                                            <i class="far fa-eye" id="togglePassword" style="margin-left: 415px; cursor: pointer; "></i>
                                        </div>

                                        <div class="text-center mt-4">
                                            <button name="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="page-login.html">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');

     togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>

</body>
</html>