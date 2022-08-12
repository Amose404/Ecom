
<?php
include 'library/load.php';

if(!isset($_COOKIE['username'])){
  header("Location: index.php");
}

?>
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
    <br>
    <div class="container">
        <h3>Sales Report <i class="bi bi-card-checklist"></i> : </h3>
        <hr>

    </div>
    <br>
<div class="container">
<table class="table  table-hover table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">user</th>
      <th scope="col">Item</th>
      <th scope="col">price</th>
    </tr>
  </thead>
  <?php
        include_once 'library/posts.php';
        $posts = get_report();
        $i = 1;
        foreach($posts as $post){ 
        ?>
  <tbody>
    <tr>
      <th scope="row"><?=$i ?></th>
      <td><?=$post['user_name'] ?></td>
      <td><?=$post['item_name'] ?></td>
      <td><?=$post['item_price'] ?></td>
    </tr>
        <?php $i++;}?>
        </tbody>
</table>
        </div>
      </div>
    </div>
    <hr>

<?php load_template('_footer');?>

</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>
