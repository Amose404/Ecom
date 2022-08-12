<header>
  <nav class="navbar navbar-expand-md navbar-light fixed-top"style="background-color: #ffddcc;">
    <div class="container"> 
      <a class="navbar-brand " href="#"> <img src="img/index.png" alt="" width="24" height="24" class="bd-placeholder-img rounded-circle"> <b>ELITE WATCHES</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0 justify-content-end ">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php"><i class="bi bi-house-door"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product.php"><i class="bi bi-bag-fill"></i> Products </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="bi bi-cart3"></i> Cart </a>
          </li>   
        </ul>
        <ul class="navbar-nav justify-content-end">
        <?php 
           if(isset($_COOKIE['username']) and isset($_COOKIE['toen'])){
            $name = $_COOKIE['username'];
            ?>

            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Wellcome ,<?php echo $name;?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" style="background-color: #ffddcc;"aria-labelledby="navbarDarkDropdownMenuLink">
              <li><a class="dropdown-item" href="admin.php"><i class="bi bi-person-circle"></i> Admin</a></li>
              <li><a class="dropdown-item" href="report.php"><i class="bi bi-receipt"></i> Report</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-gear-fill"></i> Settings</a></li>
              <li><a class="dropdown-item" href="logout.php"><i class="bi bi-door-open-fill "></i> Logout</a></li>
              </ul>

           <?php } else {?>
                  <li class="nav-item">
                    <a class= "nav-link" href="signin.php"><i class="bi bi-door-open-fill"></i> Sign in </a>
                  </li> 
       <?php  }
          ?>  
        </ul>
  
          </div>
        
      </div>
    </div>
  </nav>
</header>