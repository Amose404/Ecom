<?php
include 'library/load.php';

if(!isset($_COOKIE['username'])){
  header("Location: index.php?e1");
}

?>
<!doctype html>
<html lang="en">
  <head>
  <?php load_template('_head');?>
  </head>
<body>
<main>
<?php load_template('_navbar');?>
 
<?php load_template('_carousel');?>
<div class="container">
<?php
    if(isset($_GET['success']) and $_GET['success'] == 1){
      ?>
      <div class="alert alert-success" role="alert">
        Product has been added to your <a  href="cart.php">Cart</a>
      </div>
      <?php
    }
?>
</div>

<div class="album py-5 bg-light">
      <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        require_once 'library/posts.php';
        $posts = get_all_posts();
        foreach($posts as $post){
          
        ?>
          <div class="col">
            <div class="card shadow-sm">
              <div class="bd-placeholder-img card-img-top" style="height: 255px; width: 100%; background: url('<?=$post['item_image1']?>'); background-position: center; background-size: contain;background-repeat: no-repeat;">
              </div>

              <div class="card-body">
              <center> <h4 class="card-text text-uppercase text-center"><b><?=$post['brand_name']?></b></h4></center>
                <p class="card-text text-center"><b>$<?=$post['item_price']?></b></p>
                <p class="card-text text-center"><?=$post['item_decre']?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <form action="auth.php" method="post">
                    <input name="username" type="hidden" id="hidden" value="<?=$_COOKIE['username'] ?>">
                    <input name="item_name" type="hidden" id="hidden" value="<?=$post['item_name'] ?>">
                    <input name="brand_name" type="hidden" id="hidden" value="<?=$post['brand_name'] ?>">
                    <input name="item_price" type="hidden" id="hidden" value="<?=$post['item_price'] ?>">
                    <input name="item_decre" type="hidden" id="hidden" value="<?=$post['item_decre'] ?>">
                    <input name="item_image1" type="hidden" id="hidden" value="<?=$post['item_image1'] ?>">
                    <input type="hidden" id="auth" name="type" value="add">
                    <div class="bot"> <input type="submit" class="btn btn-sm btn-warning " value="Add to cart"></div>
                         
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </div>




  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>&copy; 2017–2021 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>

