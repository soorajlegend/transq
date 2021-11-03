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

if (isset($_GET['del'])) {
    $rank = $_GET['del'];
    $sql3 = "DELETE FROM ranks WHERE id='$rank'";
            if ($con->query($sql3) === true) {
                $alert = '<script>
swal({
  title: "Success!",
  text: "Rank has been deleted successfully",
  type: "success",
  timer: 2000,
  showConfirmButton: false
}, function(){
      window.location.href = "ranking.php";
});
</script>';
}else {
                echo "error" . $sql3 . $con->error;
            }
}


    if (isset($_POST['add'])) {
        $rank = $_POST['rank'];
        $org_id = $_SESSION['user_id'];
        $sql = "INSERT INTO ranks (org_id,rank) VALUES ('$org_id','$rank')";
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
      window.location.href = "ranking.php";
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
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   <style type="text/css">
        ::-webkit-scrollbar {
  width: 5px;
  height: 7px;
}
::-webkit-scrollbar-button {
  width: 0px;
  height: 0px;
}
::-webkit-scrollbar-thumb {
  background: #525965;
  border: 0px none #ffffff;
  border-radius: 0px;
}
::-webkit-scrollbar-thumb:hover {
  background: #525965;
}
::-webkit-scrollbar-thumb:active {
  background: #525965;
}
::-webkit-scrollbar-track {
  background: transparent;
  border: 0px none #ffffff;
  border-radius: 50px;
}
::-webkit-scrollbar-track:hover {
  background: transparent;
}
::-webkit-scrollbar-track:active {
  background: transparent;
}
::-webkit-scrollbar-corner {
  background: transparent;
}
       .ranks{
        max-height: 500px;
        overflow: auto;
        overflow-x: scroll;
       }

 </style>
   
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
    <div class="col-xl-6 col-md-6 mb-6">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                <form action="ranking.php" method="post">
            <div class="name"><h3><b>Ranking</b></h3></div>
            <hr>
            
            <div class="text">Please add your ranks from the highest to the lowest<?php //echo htmlentities($result->question);?></div>
            <div class="date"><?php //echo htmlentities($result->date_ask);?></div>
            <hr><div class="input-group col-lg-12 mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-white px-4 border-md border-right-0">
                                <i class="fa fa-arrows-v text-muted"></i>
                            </span>
                        </div>
                        
                        <input id="" type="text" name="rank" placeholder="Rank Title" class="form-control bg-white border-left-0 border-md" required>
                    </div>
                <button type="submit" name="add" class="btn btn-success"><i class="fa fa-plus"></i>&nbsp;Add</a>
            </form>                  
                 <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    <div class="col-xl-6 col-md-6 mb-6 ranks">
        <div class="card border-left-success shadow h-100 py-2 ranks">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                <form action="answer.php" method="post">
            <div class="name"><h3><b>Rank List</b></h3></div>
            <div class="container mt-3">          
  <table class="table table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Rank</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
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
      <tr>
        <td><?php echo htmlentities($cnt); ?></td>
        <td><?php echo htmlentities($result2->rank); ?></td>
        <td><a href="ranking.php?del=<?php echo htmlentities($result2->id); ?> " class="btn btn-danger"><i class="fa fa-delete"></i>&nbsp;Delete</a></td>
      </tr>
<?php 
$cnt++;
}

}
 ?>
     </tbody>
  </table>
</div>

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