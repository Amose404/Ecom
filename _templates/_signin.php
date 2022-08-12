<form action="auth.php" method="post">
    <img class="mb-4 rounded-circle" src="img/index.png" alt="" width="172" height="157">
    <h1 class="h3 mb-3 fw-normal">Please sign in </h1>
    <?php
    if(isset($_GET['error']) and $_GET['error'] == 1){
      ?>
      <div class="alert alert-danger" role="alert">
        There is an error in your credentials. Please check it.
      </div>
      <?php
    }
    if(isset($_GET['success']) and $_GET['success'] == 1){
      ?>
      <div class="alert alert-success" role="alert">
        Signup success, please sign in to continue.
      </div>
      <?php
    }
    ?>
    <label for="inputUsername" class="visually-hidden">User Name</label>
    <input type="text" id="username"  name="username" class="form-control" placeholder="User Name" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <input type="hidden" id="auth" name="type" value="login">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="1" name="remember"> Remember me
      </label>
    </div>
    <input class="w-100 btn btn-lg btn-success" type="submit" value="Sign In">
    <a class="mt-1 w-100 btn btn-lg btn-primary" href="signup.php">Sign up</a>
      <br>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>