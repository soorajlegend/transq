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
if (isset($_GET['form'])) {
                    $app = $_GET['form'];
                }

if (isset($_POST['submit'])) {
    $sql10 = "SELECT * FROM app_responds WHERE app_id = '$app'";
    $query10 = $dbh->prepare($sql10);
    $query10->execute();
    $results10 = $query10->fetchAll(PDO::FETCH_OBJ);
    if ($query10->rowCount() > 0) {
        foreach ($results10 as $result10) {
            $user = $result10->user_id;
            $app_id = $result10->app_id;
            $credit = $result10->credit;
            $math = $result10->math; 
            $eng = $result10->eng;
            $credential = $result10->credential;
            $height = $result10->height;
            $hypertension = $result10->hypertension;
            $medRecord = $result10->medRecord;

             $sql11="SELECT * FROM users WHERE id='$user' ";
  $query11 = $dbh -> prepare($sql11);
$query11->execute();
$results11=$query11->fetchAll(PDO::FETCH_OBJ);
if($query11->rowCount() > 0)
{
foreach($results11 as $result11)
{           
            $name=$result11->fullname;
            $email=$result11->email;
            $year=date("Y-m-d");
            $dob= $result11->dob;
            $age = $year - $dob;
            $gender=$result11->gender;
}
}


$sql12="SELECT * FROM criterias WHERE app_id='$app_id' ";
  $query12 = $dbh -> prepare($sql12);
$query12->execute();
$results12=$query12->fetchAll(PDO::FETCH_OBJ);
if($query12->rowCount() > 0)
{
foreach($results12 as $result12)
{          
            
            $minAge = $result12->minAge;
            $maxAge = $result12->maxAge;
            $c_credit = $result12->credit;
            $c_math = $result12->math;
            $c_eng = $result12->eng;
            $maleHeight = $result12->maleHeight;
            $female_height = $result12->femaleHeight;
            $c_hypertension = $result12->hypertension;
      }} 

      $sql13="SELECT * FROM applications WHERE id='$app_id' ";
  $query13 = $dbh -> prepare($sql13);
$query13->execute();
$results13=$query13->fetchAll(PDO::FETCH_OBJ);
if($query13->rowCount() > 0)
{
foreach($results13 as $result13)
{          
            
            $rank = $result13->rank;
      }} 


       if ($age < $minAge OR $age > $maxAge) {
                    break;  
        }elseif ($credit < $c_credit OR $credential == "") {
                    break;       
        
            }elseif ($math !=  $c_math OR $eng != $c_eng) {
                    break;       
        
            }elseif ($c_hypertension == "" AND $hypertension == "1"){
                     break;
            }elseif ($medRecord == "") {
                    break;       
            }elseif ($gender == "male" && $height >= $maleHeight) {
                // echo "hello";
              
              $org_id=$_SESSION['user_id'];
              $sql13 = "INSERT INTO staffs (id,org_id,rank,status) VALUES ('$user','$org_id','$rank','1')";
               if ($con->query($sql13) === true) {
                   } else {
                echo "error" . $sql13 . $con->error;
            }


              }elseif($gender == "female" && $height >= $female_height){
           $org_id=$_SESSION['user_id'];
              $sql13 = "INSERT INTO staffs (id,org_id,rank,status) VALUES ('$user','$org_id','$rank','1')";
               if ($con->query($sql13) === true) {
                   } else {
                echo "error" . $sql13 . $con->error;
            }
     }
     $alert = ' <script>
swal({
  title: "Success!",
  text: "Staffs have being save succefully",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "recruiting.php";
});
</script>';
 }

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
     <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
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
 
 <div class="container-fluid">
                        <div class="row"> 
                             <div class="col-xl-12 col-md-12 mb-12">
        <div class="card border-left-success shadow h-100 py-2">
            
<div class="container mt-3">
    <form action="QualifiedApp.php?form=<?php echo $app; ?>" method="post"><button type="submit" name="submit" class="btn btn-success float-right">comfirm</button></form>
  <h2>Qualified Applicants</h2>  
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Full name</th>
        <th>Email</th>
        <th>Age</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
        <?php 
                 

                  $sql = "SELECT * FROM app_responds WHERE app_id = '$app'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $cnt=1;
        foreach ($results as $result) {
            $user = $result->user_id;
            $app_id = $result->app_id;
            $credit = $result->credit;
            $math = $result->math; 
            $eng = $result->eng;
            $credential = $result->credential;
            $height = $result->height;
            $hypertension = $result->hypertension;
            $medRecord = $result->medRecord;

             $sql2="SELECT * FROM users WHERE id='$user' ";
  $query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
foreach($results2 as $result2)
{           
            $name=$result2->fullname;
            $email=$result2->email;
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
                    break;  
        }elseif ($credit < $c_credit OR $credential == "") {
                    break;       
        
            }elseif ($math !=  $c_math OR $eng != $c_eng) {
                    break;       
        
            }elseif ($c_hypertension == "" AND $hypertension == "1"){
                     break;
            }elseif ($medRecord == "") {
                    break;       
            }elseif ($gender == "male" && $height >= $maleHeight) {
                 ?>
        <tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($name);?></td>
        <td><?php echo htmlentities($email);?></td>
        <td><?php echo htmlentities($age." years");?></td>
        <td><?php echo htmlentities($gender);?></td>

        </tr>

        <?php }elseif($gender == "female" && $height >= $female_height){
            ?>
 <tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($name);?></td>
        <td><?php echo htmlentities($email);?></td>
        <td><?php echo htmlentities($age." years");?></td>
        <td><?php echo htmlentities($gender);?></td>

        </tr>
  <?php
 }
    $cnt++; }
} ?>
    </tbody>
  </table>
</div>


        </div>
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
        </div>
    </footer>-->
   <?php include 'footer.php'; ?>
</body>
<?php } ?>
</html>