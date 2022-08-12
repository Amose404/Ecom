<?php
include 'library/load.php';

if(!isset($_COOKIE['username'])){
  header("Location: index.php?e1");
}

?>
<!doctype html>
<html lang="en">

<?php load_template('_head');?>
<body>

<?php load_template('_navbar');?>

<div class="container"></div>
<div class="album py-5 bg-light">
<div class="container"><h1>All cart items ..</h1></div>
<br>

<br>
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        include_once 'library/user.php';
        $name = $_COOKIE['username'];
        $posts = get_all_cart($name);
        $subtotal = 0;
        $item = 0;
        foreach($posts as $post){
          
        ?>
          <div class="col">
            <div class="card shadow-sm">
              <div class="bd-placeholder-img card-img-top" style="height: 255px; width: 100%; background: url('<?=$post['item_image1']?>'); background-position: center; background-size: contain;background-repeat: no-repeat;">
              </div>
              <div class="card-body">
               <center> <p class="card-text"><b>$<?=$post['item_price']?></b></p></center>
                <p class="card-text"><?=$post['item_decre']?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                  <form action="auth.php" method="post">
                    <input name="username" type="hidden" id="hidden" value="<?=$_COOKIE['username'] ?>">
                    <input name="item_name" type="hidden" id="hidden" value="<?=$post['item_name'] ?>">
                    <input name="brand_name" type="hidden" id="hidden" value="<?=$post['brand_name'] ?>">
                    <input name="item_price" type="hidden" id="hidden" value="<?=$post['item_price'] ?>">
                    <input name="item_decre" type="hidden" id="hidden" value="<?=$post['item_decre'] ?>">
                    <input name="item_image1" type="hidden" id="hidden" value="<?=$post['item_image1'] ?>">
                    <input type="hidden" id="auth" name="type" value="buy">
                    <input type="submit" class="btn btn-sm btn-primary" value="Buy Now">
                    </form>                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php 
      $price = $post['item_price'];
      $subtotal = $subtotal + $price;
      $item = $item + 1;
      }
      ?>
        
      </div>
    </div>
    <hr>
<br>
<br>

    <div class="container"><h4> Sub Total (item : <?=$item?>): $<?=$subtotal ?> </h4><hr><button type="submit" class="btn btn-smm btn-warning">Proceeed</button></div>
    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
