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
               $sql = "SELECT * FROM pro_responds ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $cnt=1;
        foreach ($results as $result) {
            $user = $result->user_id;
            $org_id = $result->org_id;
            $yos = $result->yos;
            $n_ot = $result->n_ot; 
            $trate = $result->trate;
            $certificate = $result->certificate;
            $score = $result->score;

             $sql2="SELECT * FROM staffs WHERE id='$user' ";
  $query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
foreach($results2 as $result2)
{           
            $rank=$result2->rank;
}
}

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


$sql3="SELECT * FROM procriterias WHERE org_id='$org_id' ";
  $query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
if($query3->rowCount() > 0)
{
foreach($results3 as $result3)
{          
            
            $req_yos = $result3->yos;
            $req_n_ot = $result3->n_ot;
            $req_trate = $result3->trate;
            $req_certificate = $result3->certificate;
            $req_score = $result3->score;
      }} 


       if ($yos < $req_yos OR $n_ot < $req_n_ot) {
                    break;  
                    echo "hello";
        }elseif ($trate < $req_trate OR $certificate == "") {
                    break;       
            
            }elseif ($req_score >= $score ) {
                   continue;
            }else{
                $new_rank = $rank-1;
              $sql5 = "UPDATE staffs SET rank='$new_rank' WHERE id='$user'";
               if ($con->query($sql5) === true) {

                   } else {
                echo "error" . $sql5 . $con->error;
            }

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
      window.location.href = "promotion.php";
});
</script>';

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
    <form action="proShortlisted.php" method="post"><button type="submit" name="submit" class="btn btn-success float-right">comfirm</button></form>
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
                 

                  $sql = "SELECT * FROM pro_responds ";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        $cnt=1;
        foreach ($results as $result) {
            $user = $result->user_id;
            $org_id = $result->org_id;
            $yos = $result->yos;
            $n_ot = $result->n_ot; 
            $trate = $result->trate;
            $certificate = $result->certificate;
            $score = $result->score;

             $sql2="SELECT * FROM staffs WHERE id='$user' ";
  $query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
if($query2->rowCount() > 0)
{
foreach($results2 as $result2)
{           
            $rank=$result2->rank;
}
}

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


$sql3="SELECT * FROM procriterias WHERE org_id='$org_id' ";
  $query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
if($query3->rowCount() > 0)
{
foreach($results3 as $result3)
{          
            
            $req_yos = $result3->yos;
            $req_n_ot = $result3->n_ot;
            $req_trate = $result3->trate;
            $req_certificate = $result3->certificate;
            $req_score = $result3->score;
      }} 


       if ($yos < $req_yos OR $n_ot < $req_n_ot) {
                    break;  
        }elseif ($trate < $req_trate OR $certificate == "") {
                    break;       
            
            }elseif ($req_score >= $score ) {
                   continue;
        
            }else{
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
}
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