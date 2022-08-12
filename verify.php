<?php
include 'library/load.php';

if(!isset($_GET['username'])){
  header("Location: index.php");
}

?>
 
<!doctype html>
<html lang="en">
  <head>

  <?php load_template('_signhead');?>
  </head>
  <body class="text-center">

<main class="form-signin">
 

<?php load_template('_verify');?>
</main>
  </body>
</html>
