<?php
include_once 'library/load.php';
?>
<!doctype html>
<html lang="en">
  <head>
 <?php load_template('_head');?>
  </head>
  <body>
    
  <?php load_template('_navbar');?>

<main>

<?php load_template('_carousel');?>
<br>
<div class="container">
<?php
    if(isset($_GET['e1'])){
      ?>
      <div class="alert alert-warning text-center" role="alert">
        Please  <a  href="signin.php"><i class="bi bi-door-open-fill"></i>Login</a> ...
      </div>
      <?php
    }
?>
</div>

<?php load_template('_home');?>


<?php load_template('_footer');?>
</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
