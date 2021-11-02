<?php
require_once "assets/includes/config.php";
require_once "assets/includes/db_con.php";
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:logout.php");
} elseif ($_SESSION['user_type'] != 3) {
    header("location:logout.php");
} else {

$alert="";

    if (isset($_GET["app"])) {
    $app = $_GET["app"];
    $sql = "SELECT * FROM app_responds WHERE id = '$app'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $app_id = $result->app_id;
            $credit = $result->credit;
            $math = $result->math; 
            $eng = $result->eng;
            $credential = $result->credential;
            $height = $result->height;
            $hypertension = $result->hypertension;
            $medRecord = $result->medRecord;

 $user=$_SESSION['user_id'];
 $sql2="SELECT * FROM users WHERE id='$user' ";
  $query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
foreach($results2 as $result2)
{
            $year=date("Y-m-d");
            $dob= $result2->dob;
            $age = $year - $dob;
            $gender=$result2->gender;
}
}
  $sql3="SELECT * FROM criterias WHERE app_id='$app_id' ";
  $query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
if($query3->rowCount() > 0)
{
foreach($results3 as $result3)
{          
            
            $minAge = $result3->minAge;
            $maxAge = $result3->maxAge;
            $c_credit = $result3->credit;
            $c_math = $result3->math;
            $c_eng = $result3->eng;
            $maleHeight = $result3->maleHeight;
            $female_height = $result3->femaleHeight;
            $c_hypertension = $result3->hypertension;
            
      }} 

      if ($age < $minAge OR $age > $maxAge) {
          $alert = ' <script>
swal({
  title: "Sorry!",
  text: "You are not eligible please, try again next year",
  type: "error",
  timer: 5000,
  showConfirmButton: false
}, function(){
      window.location.href = "myapp.php";
});
</script>';
        }elseif ($credit < $c_credit OR $credential == "") {
            $alert = ' <script>
swal({
  title: "Sorry!",
  text: "You are not eligible please, try again next year ",
  type: "error",
  timer: 5000,
  showConfirmButton: false
}, function(){
      window.location.href = "myapp.php";
});
</script>';         
            }elseif ($math !=  $c_math OR $eng != $c_eng) {
          $alert = ' <script>
swal({
  title: "Sorry!",
  text: "You are not eligible please, try again next year ",
  type: "error",
  timer: 5000,
  showConfirmButton: false
}, function(){
      window.location.href = "myapp.php";
});
</script>';         
            }elseif ($c_hypertension != "1" AND $hypertension != $c_hypertension OR $medRecord == "") {
                $alert = ' <script>
swal({
  title: "Sorry!",
  text: "You are not eligible please, try again next year ",
  type: "error",
  timer: 5000,
  showConfirmButton: false
}, function(){
      window.location.href = "myapp.php";
});
</script>';         
            }elseif ($gender == "male" && $height >= $maleHeight) {
                        $alert = ' <script>
swal({
  title: "Congratulations!",
  text: "You are eligible",
  type: "success",
  timer: 5000,
  showConfirmButton: false
}, function(){
      window.location.href = "myapp.php";
});
</script>';
                        }elseif($gender == "female" && $height >= $female_height){
                                                   $alert = ' <script>
swal({
  title: "Congratulations!",
  text: "You are eligible",
  type: "success",
  timer: 5000,
  showConfirmButton: false
}, function(){
      window.location.href = "myapp.php";
});
</script>';
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
    <title>Application - TransQ</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/slogo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <script src="https://use.fontawesome.com/5c83a5112a.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
   
.likes, .share{
    border:1.0px solid rgba(13, 127, 165, 0.01);
    min-width: 50%;
    padding: 5px 15px;
    border-radius: 30px;
    background-color: rgba(13, 127, 165, 0.1);
    color: #074954;
}
.likes2{
    border:1.0px solid #074954;
    min-width: 50%;
    padding: 5px 15px;
    border-radius: 30px;
    background-color:#074954;
    color: #fff;
}
.btns{
    display: inline-block;
    width: 45%;
    position: relative;
}
</style>
</head>
 <script type="text/javascript">
                function like_preach(){
          $("#loaderIcon").show();
jQuery.ajax({
url: "like.php",
data:'p_id='+$("#p_id").val(),
type: "get",
success:function(data){
$("#like_result").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
    </script>
<body>
   
     <?php include('sidebar.php') ?>
     <?php include('topbar.php') ?>
                <div class="container">
                    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
  <div class="controls-top">
    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fas fa-chevron-right"></i></a>
  </div>
  <!--/.Controls-->

  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>
    
  </ol>
  <!--/.Indicators-->

  <!--Slides-->

  </div>

</div>

<?php echo $alert ?>


<!--Action button  --

<a href="#" class="float">
<i class="fa fa-bell-o my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Notification</div>
<i class="fa fa-play label-arrow"></i>
<!-Action button  -->
</div>

       
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
        -->
   <?php include 'footer.php'; ?>

</body>

</html>
<?php } ?>