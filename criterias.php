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
$org_id=$_SESSION['user_id'];
$cred="TRANSQ_CRED";
$med="TRANSQ_MED";
if (isset($_POST['submit'])) {
    $user_id=$_SESSION['user_id'];
    $app=$_POST['app'];
    $credit = $_POST['credit'];
    $math = $_POST['math'];
    $eng = $_POST['eng'];
    $height = $_POST['height'];
    $hypertension = $_POST['hypertension'];
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
                $destination2="./uploads/medical_record/{$basename}";
          move_uploaded_file($temp, $destination);
      
         $sql = "INSERT INTO app_responds (user_id,app_id,credit,math,eng,credential,height,hypertension,medRecord) VALUES ('$user_id','$app','$credit','$math','$eng','$credential','$height','$hypertension','$medRecord')";
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
                 ?>
            <div class="col-xl-8 col-md-12 mb-8">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                <form action="criterias.php" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="app" value="<?php echo $app; ?>">
                    <?php echo $alert; ?>
            <div class="name"><h3><b>Apply</b></h3></div>
            <hr>

                    <!-- number of credit -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-percent text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="Number" name="credit" placeholder="Number of credit You have" class="form-control bg-white border-left-0 border-md" required>
                    </div>


                    <!-- Starting Date -->
                    <div class="input-group col-lg-12 mb-4">
<label class="checkbox-inline ml-2"><input type="checkbox" name="math" value="1">&nbsp;Mathematics</label>
<label class="checkbox-inline ml-5"><input type="checkbox" name="eng" value="1">&nbsp;English</label>
</div>  


<div class="input-group col-lg-12 mb-4">            
<div class="custom-file">
  <input type="file" class="form-control" name="credential" id="customFile">
  <label class="custom-file-label" for="customFile">Upload your credential in <body>PDF</body> format</label>
</div>
</div>

                <!-- <div class="input-group col-lg-12 mb-4"> 
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Work experience"></textarea>
  </div> -->
            
            <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-long-arrow-up  text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="tel" name="height" placeholder="Your height in meter" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                     <!-- Hypertention  -->
                     <div class="input-group col-lg-12 mb-4">
<label class="checkbox-inline ml-2"><input type="checkbox" name="hypertension" value="1">&nbsp;Hypertension</label>
</div>  

                    <div class="input-group col-lg-12 mb-4">            
<div class="custom-file">
  <input type="file" class="custom-file-input" name="medRecord" id="customFile">
  <label class="custom-file-label" for="customFile">Upload your Medical report in <body>PDF</body> format</label>
</div>
</div>
                    
                <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i>&nbsp;Send</button>
            
            </form>
                  
                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
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