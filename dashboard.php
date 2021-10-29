<?php
require_once "assets/includes/config.php";
require_once "assets/includes/db_con.php";
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:logout.php");
} elseif ($_SESSION['user_type'] != 3) {
    header("location:logout.php");
} else {
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
    <script src="https://use.fontawesome.com/5c83a5112a.js"></script>

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
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active">

      <div class="col-md-3" style="float:left">
       <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>
      
       <div class="col-md-3" style="float:left">
       <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>
      
      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
            <a class="btn btn-primary">Button</a>
          </div>
        </div>
      </div>

    </div>
    <!--/.Second slide-->

   

  </div>
  <!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->
    <div class="row">                                
    <?php
$sql = "SELECT users.name, preachs.date, preachs.p_id, preachs.preach, preachs.audio, preachs.viewers, preachs.likes, preachs.p_title FROM preachs INNER JOIN users ON preachs.ulama_id = users.user_id ORDER BY preachs.p_id DESC";
    $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $p_id = $row['p_id'];
            ?>
        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
    <div class="question">
            <div class="name"><?php echo htmlentities($row['p_title']); ?></div>
            <div class="date"><?php echo htmlentities($row['date']); ?></div>
            <div class="text"><?php echo htmlentities($row['preach']); ?></div>
            <audio controls>
  <source src="assets/upload/<?php echo htmlentities($row['audio']); ?>" type="audio/ogg">
</audio>
<div>
    <div align="left" class="btns">
        <form method="get" action="like.php">
        <input type="hidden" name="p_id" id="p_id" value="<?php echo htmlentities($row['p_id']); ?>">
        <?php
$sql2 = "SELECT * FROM likes WHERE p_id = '$p_id' AND status = 1";
            $result2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
            $count2 = mysqli_num_rows($result2);

            $user_id = $_SESSION['user_id'];
            $sql3 = "SELECT * FROM likes WHERE p_id = '$p_id' AND user_id = '$user_id' AND status = 1";
            $result3 = mysqli_query($con, $sql3) or die(mysqli_error($con));
            $count3 = mysqli_num_rows($result3);
            if ($count3 > 0) {
                ?>
   <button class="likes2" id="like" name="like" onclick=""><i class="fa fa-thumbs-o-up"></i>&nbsp;<?php echo $count2;
                ?></button>
<?php
} else {
                ?>
    <button class="likes" id="like" name="like" onclick=""><i class="fa fa-thumbs-o-up"></i>&nbsp;<?php echo $count2;
                ?></button>
<?php }?>
<b><span id="like_result" style="font-size:16px;"></span></b>
</form>
</div>
<div align="right" class="btns">
    <form action="share.php" method="get">
        <input type="hidden" name="share_id" value="<?php echo htmlentities($result->p_id); ?>">
    <button  type="submit" name="share" class="share"><i class="fa fa-share-square-o"></i> share</button>
    </form>
</div>
</div>
        
        </div>
    </div>


<?php }}?>
</div>
</div>


<!--Action button  --

<a href="#" class="float">
<i class="fa fa-bell-o my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Notification</div>
<i class="fa fa-play label-arrow"></i>
<!--Action button  -->
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