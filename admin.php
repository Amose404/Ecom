<?php
include 'library/load.php';

if(!isset($_COOKIE['username'])){
  header("Location: index.php");
}

?>
<?php load_template('_upload');?>
<!doctype html>
<html lang="en">
  <head>
  <?php load_template('_head');?>
    <link rel="stylesheet" href="/photogram/css/admin.css">
  </head>
  <body>
    
<header>
<?php load_template('_navbar');?>
</header>

<main>

<?php load_template('_admin');?>

<?php load_template('_footer');?>

</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
