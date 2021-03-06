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
    $title = $_POST['title'];
    $disc = $_POST['disc'];
    $mrn = $_POST['mrn'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
        if ($sdate == $edate) {
            $alert = '<script>swal("Invalid", "Starting and closing date are equal!", "error")</script>';
        } else {
            $sql = "INSERT INTO applications (org_id,title,discription,max_req_num,starting_date,closing_date) VALUES ('$org_id','$title','$disc','$mrn','$sdate','$edate')";
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
      window.location.href = "recruiting.php";
});
</script>';
            } else {
                echo "error" . $sql . $con->error;
            }

        }
    }



    ?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - soo'al</title>
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
            <div class="col-xl-6 col-md-12 mb-6">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                <form action="NewApp.php" method="post">
                    <?php echo $alert; ?>
            <div class="name"><h3><b>New Application</b></h3></div>
            <hr>

                    <!-- Title -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-file text-muted"></i>
                            </span>
                        </div>
                       
                        <input id="" type="Text" name="title" placeholder="Title of the Application" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                    <!-- Discription -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                           
                        </div>
                        <textarea id="" type="text" name="disc" placeholder="Description" class="form-control bg-white  border-md" required></textarea>
                    </div>


                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-arrows-v text-muted"></i>
                            </span>
                        </div>
                       
                        <select id="" type="Text" name="title" placeholder="Title of the Application" class="form-control bg-white border-left-0 border-md" required>
                            <?php 
                          $org_id = $_SESSION['user_id'];
           $sql2 = "SELECT * FROM ranks WHERE org_id='$org_id'";
    $query2 = $dbh->prepare($sql2);
    $query2->execute();
    $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
    if ($query2->rowCount() > 0) {
        $cnt=1;
        foreach ($results2 as $result2) {
         ?>  
<option value="<?php echo htmlentities($result2->rank_num);?>"><?php echo htmlentities($result2->rank);?></option>
 <?php }} ?>
                            <option selected disabled>Rank</option>
                        </select>
                    </div>

                    <!-- Required Number -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-percent text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="Number" name="mrn" placeholder="Number of required application" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Starting Date -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-calendar text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="date" name="sdate" placeholder="" class="form-control bg-white border-left-0 border-md" required>
                    </div>

                    <!-- Ending Date -->
                    <div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-calendar text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="date" name="edate" placeholder="" class="form-control bg-white border-left-0 border-md" required>
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