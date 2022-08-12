<form action="auth.php" method="POST">
    <img class="mb-4" src="img/index.png" alt="" width="172" height="157">
    <h1 class="h3 mb-3 fw-normal">Enter your OTP</h1>
    <?php
    if(isset($_GET['error'])){
      ?>
      <div class="alert alert-danger" role="alert">
       <?php
          $error_m = "Invaid OTP";
          if(isset($_GET['error_m'])){
            $error_m = $_GET['error_m'];
          }elseif ($_GET['error'] == -1){
            $error_m = "OTP Expired";

          }
          echo $error_m;
       ?>
      </div>
      <?php
    }
    ?>
    <label for="otp" class="visually-hidden">Enter OTP</label>
    <input type="text" name="otp" id="otp" class="form-control" placeholder="Enter OTP" required autofocus>
    <input type="hidden" id="auth" name="type" value="verify">
    <input type="hidden" id="username" name="username" value="<?=$_GET['username']?>">
    <br>
    <input class="w-100 btn btn-lg btn-success" type="submit" value="verify">

    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>