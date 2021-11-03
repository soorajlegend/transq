<?php
require_once "../assets/includes/config.php";
require_once "../assets/includes/db_con.php";
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:logout.php");
} elseif ($_SESSION['user_type'] != 1) {
    header("location:logout.php");
} else {


$alert="";
$org_id=$_SESSION['user_id'];

if (isset($_POST['submit'])) {

    $yos = $_POST['yos'];
    $n_ot = $_POST['n_ot'];
    $trates = $_POST['trates'];
    $certificate = $_POST['certificate'];
    $score = $_POST['score'];

            $sql = "INSERT INTO procriterias (org_id,yos,n_ot,trate,certificate,score) VALUES ('$org_id','$yos','$n_ot','$trates','$certificate','$score')";
            if ($con->query($sql) === true) {
                $lastid = $con->insert_id;
                $alert = ' <script>
swal({
  title: "Success!",
  text: "Good",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "promotion.php";
});
</script>';
            } else {
                echo "error" . $sql . $con->error;
            }

        }
 
    ?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - NRP</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/slogo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <script src="https://use.fontawesome.com/5c83a5112a.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>

<body>
   <?php include 'sidebar.php'; ?>
   <?php include 'topbar.php'; ?>
   <?php echo $alert; ?>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 style="color: #074954;"></h2>
                    <hr>
                </div>
                

<!--Action button  --

<a href="#" class="float">
<i class="fa fa-plus my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Notification</div>
<i class="fa fa-play label-arrow"></i-->
<!--Action button  -->
</div>
                
                    
                               <?php
// $sql = "SELECT users.name, questions.date_ask, questions.question, questions.status, questions.q_id FROM questions INNER JOIN users ON questions.user_id = users.user_id WHERE questions.status='0'  ORDER BY questions.q_id DESC";
// $query = $dbh -> prepare($sql);
// $query->execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// if($query->rowCount() > 0)
// {
// foreach($results as $result)
// {               ?>  
 <div class="container-fluid">
                        <div class="row"> 
    <div class="col-xl-8 col-md-8 mb-8">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                <form action="procriterias.php" method="post">
            <div class="name"><h3><b>Set Criterias</b></h3></div>
            <hr>
            
            <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-calendar text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="Number" name="yos" placeholder="years of service" class="form-control bg-white border-left-0 border-md" required>
                    </div>


            <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-list-ol text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="Number" name="n_ot" placeholder="Number of training completed" class="form-control bg-white border-left-0 border-md" required>
                    </div>


            <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-star text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="Number" name="trates" placeholder="Training rates (0-10)" class="form-control bg-white border-left-0 border-md" required>
                    </div>


            <div class="input-group col-lg-12 ">                        
                         <div class="input-group col-lg-12 mb-4">
<label class="checkbox-inline ml-2"><input type="checkbox" name="certificate" id="math" value="1" >&nbsp;Certificate</label>
</div>
                    </div>


                     <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-percent text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="Number" name="score"  placeholder="Minimum Score of promotional exam" class="form-control bg-white border-left-0 border-md" required>
                    </div>


                <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Save</button>
            
            </form>
                  
                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>   

<?php //}} ?> 
    


               <!---- <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar1.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">John Smith</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar2.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Robert Downturn</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar3.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Ally Sanders</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </section>
    </main>
   <!---- <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright Text</p>
        </div>
    </footer>-->
   <?php include 'footer.php'; ?>
</body>

</html>
<?php } ?>