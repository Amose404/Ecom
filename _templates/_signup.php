<form action="auth.php" method="POST">
    <img class="mb-4 rounded-circle" src="img/index.png" alt="" width="172" height="157">
    <h1 class="h3 mb-3 fw-normal">Welcome, Signup &#128516;</h1>
    <?php
    if(isset($_GET['error']) and $_GET['error'] == 1){
      ?>
      <div class="alert alert-danger" role="alert">
       <?php
          $error_m = "Username already exists. Cannot signup.";
          if(isset($_GET['error_m'])){
            $error_m = $_GET['error_m'];
          }
          echo $error_m;
       ?>
      </div>
      <?php
    }
    ?>
    <label for="fullName" class="visually-hidden">Full Name</label>
    <input type="text" name="full_name" id="fullName" class="form-control" placeholder="Full Name" required autofocus value="<?php echo isset($_GET['fn']) ? $_GET['fn'] : "";?>">
    <label for="inputPhone" class="visually-hidden">Mobile Number</label>
    <input type="phone" name="mobile" id="inputPhone" class="form-control" placeholder="Mobile Number" required autofocus value="<?php echo isset($_GET['mob']) ? $_GET['mob'] : "";?>">
    <br>
    <label for="inputUsername" class="visually-hidden">Username</label>
    <input type="username" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <input type="hidden" id="auth" name="type" value="signup">
    <input class="w-100 btn btn-lg btn-success" type="submit" value="Sign Up">
    <a class="mt-1 w-100 btn btn-lg btn-primary" href="signin.php">Sign in</a>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
  </form>