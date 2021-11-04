<?php
require_once "../assets/includes/db_con.php";
require_once "../assets/includes/config.php";
$pass_error = "";
$name = "";
$login_id = "";
if (isset($_POST['submit'])) {
    $orgName = $_POST['orgName'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $query = "SELECT * FROM organisation WHERE email='$email'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $pass_error = '<script>swal("Invalid", "The Email address is already registered!", "error")</script>';
    } else {
        if ($password != $cpassword) {
            $pass_error = '<script>swal("Invalid", "Password and comfirm password did not match!", "error")</script>';
        } else {
            $sql = "INSERT INTO organisation (name,email,url,password,status) VALUES ('$orgName','$email','$url','$password','1')";
            if ($con->query($sql) === true) {
                $lastid = $con->insert_id;
                session_start();
                $_SESSION['user_id'] = "$lastid";
                $_SESSION['user_type'] = 1;
                $pass_error = ' <script>
swal({
  title: "Success!",
  text: "Good",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "dashboard.php";
});
</script>';
            } else {
                echo "error" . $sql . $con->error;
            }

        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - TransQ</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="../assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="../assets/img/logo.jpg">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../assets/css/custom.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body{
        padding: 10% 5%;
    }
/*
*
* ==========================================
* CUSTOM UTIL CLASSES
* ==========================================
*
*/

.border-md {
    border-width: 2px;
}

.btn-facebook {
    background: #405D9D;
    border: none;
}

.btn-facebook:hover, .btn-facebook:focus {
    background: #314879;
}

.btn-twitter {
    background: #42AEEC;
    border: none;
}

.btn-twitter:hover, .btn-twitter:focus {
    background: #1799e4;
}



/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/

.form-control:not(select) {
    height: 40px;
}

select.form-control {
    height: 40px;
    padding-left: 0.5rem;
}
input.form-control {
    height: 40px;
    padding-left: 0.5rem;
}

.form-control::placeholder {
    color: #ccc;
    font-weight: bold;
    font-size: 0.9rem;
}
.form-control:focus {
    box-shadow: none;
}
button{
    border: none;
}

    </style>
</head>

<body>
    <!-- Navbar-->
<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light py-3">
        <div class="container">
          
        </div>
    </nav>
</header>


<div class="container">
    <div class="row py-5 mt-4 align-items-center">
        <!-- For Demo Purpose -->
        <div class="col-md-5 pr-lg-5 mb-5 mb-md-0">
            <img src="https://ace.globalintegrity.org/wp-content/uploads/2020/09/codes_GIACE-750x375.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            <h1>Create an Account</h1>
            <p class="font-italic text-muted mb-0">Create account to get access for endless opportunity free of curruption</p>
        </div>

        <!-- Registeration Form -->
        <div class="col-md-7 col-lg-6 ml-auto">
            <form action="register.php" method="post">
            <?php echo $pass_error; ?>
                <div class="row">

                    <!-- Organisation Name -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-building text-muted"></i>
                            </span>
                        </div>
                        <input id="firstName" type="text" name="orgName" placeholder="Organisation Name" class="form-control bg-white border-left-0 border-md">
                    </div>

                    
                    <!-- Email Address -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-envelope text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md">
                    </div>


                    <!-- Url -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-link text-muted"></i>
                            </span>
                        </div>
                        <input id="email" type="url" name="url" placeholder="Website Url" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Password -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Password Confirmation -->
                    <div class="input-group col-lg-6 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                        </div>
                        <input type="password" id="passwordConfirmation" type="text" name="cpassword" placeholder="Confirm Password" class="form-control bg-white border-left-0 border-md">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" name="submit" class="form-group col-lg-12 mx-auto mb-0 btn btn-success btn-block py-2">
                            <span class="font-weight-bold">Create your account</span>
                       
                    </button>

                    <!-- Divider Text -->
                    <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                        <div class="border-bottom w-100 ml-5"></div>
                        <div class="border-bottom w-100 mr-5"></div>
                    </div>

                    

                    <!-- Already Registered -->
                    <div class="text-center w-100">
                        <p class="text-muted font-weight-bold">Already Registered? <a href="login.php" class="text-success ml-2">Sign in</a></p>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
    <script type="text/javascript">
        // For Demo Purpose [Changing input group text on focus]
$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
});

    </script>
    <script type="text/javascript" src="../assets/js/sweetalert.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../assets/js/smoothproducts.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>
</body>
</html>