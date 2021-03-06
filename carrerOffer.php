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
$user_id=$_SESSION['user_id'];
$cred="NRP_SHOOTING";
$med="NRP_OTHER";
if (isset($_POST['submit'])) {
    $rank=$_POST['rank'];
    $credential = $_FILES["credential"]["name"];
        $type = $_FILES["credential"]["type"];
        $size = $_FILES["credential"]["size"];
        $temp = $_FILES["credential"]["tmp_name"];
        $error = $_FILES["credential"]["error"];
    $medRecord = $_FILES["medRecord"]["name"];
        $medtype = $_FILES["medRecord"]["type"];
        $medsize = $_FILES["medRecord"]["size"];
        $medtemp = $_FILES["medRecord"]["tmp_name"];
        $mederror = $_FILES["medRecord"]["error"];
      
        if ($error > 0){
          die("Error uploading file! Code $error.");
          }
        else{
                if ($mederror > 0){
          die("Error uploading medical record! Code $error.");
          }
        else{
            
                $filename= $cred.uniqid()."_".time();
                $extension=pathinfo($_FILES['credential']['name'], PATHINFO_EXTENSION );
                $basename=$filename.".".$extension;
                $destination="./uploads/credentials/{$basename}";
          move_uploaded_file($temp, $destination);

                $filename2= $med.uniqid()."_".time();
                $extension2=pathinfo($_FILES['medRecord']['name'], PATHINFO_EXTENSION );
                $basename2=$filename2.".".$extension2;
                $destination2="./uploads/medical_record/{$basename2}";
          move_uploaded_file($temp, $destination);
      
         $sql = "INSERT INTO careerResponds (user_id,shootingCertificate,otherCertificate,rank) VALUES ('$user_id','$basename','$basename2','$rank')";
            if ($con->query($sql) === true) {
                $lastid = $con->insert_id;
                session_start();
                $alert = ' <script>
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
    <title>Criterias - TransQ</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/slogo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/5c83a5112a.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
</head>

<body>
   <?php include 'sidebar.php'; ?>
   <?php include 'topbar.php'; ?>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
                <?php 
                if (isset($_GET['app'])) {
                    $app = $_GET['app'];
                }
                echo $alert;
                 ?>
            <div class="col-xl-8 col-md-12 mb-8">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                <form action="carrerOffer.php" method="post" enctype="multipart/form-data" >
            <a href="OfferStatus.php" class="btn btn-success float-right">Check Status</a>
                <div class="name"><h3><b>Apply</b></h3></div>
            <hr>
            <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-certificate text-muted"></i>
                            </span>
                        </div>
                        
            <div class="custom-file">
  <input type="file" class="form-control" name="credential" id="customFile">
  <label class="custom-file-label" for="customFile">Upload your shooting range certificate in <body>PDF</body> format</label>
</div>
                    </div>


                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-certificate text-muted"></i>
                            </span>
                        </div>
                        
            <div class="custom-file">
  <input type="file" class="form-control" name="medRecord" id="customFile2">
  <label class="custom-file-label" for="customFile2">Upload any other related certificate in <body>PDF</body> format</label>
</div>
                    </div>
 <?php
$adminid=$_SESSION['user_id'];
$ret2=mysqli_query($con,"select * from staffs where id='$adminid'");
while ($row2=mysqli_fetch_array($ret2)) {
    $ranknum=$row2['rank'];

$ret3=mysqli_query($con,"SELECT * FROM ranks LIMIT ".$ranknum);
while ($row3=mysqli_fetch_array($ret3)) {
    $rank=$row3['rank'];
}

}




?>

                     <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-sort-amount-desc text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="text" name="rank" value="<?php echo $rank; ?>   " class="form-control bg-white border-left-0 border-md" readonly>
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
            
</div>
</section>
</main>
   <?php include 'footer.php'; ?>
</body>

</html>
<?php } ?>