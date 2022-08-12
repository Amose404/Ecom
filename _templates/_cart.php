<div class="album py-5 bg-light">

      <div class="container">
         <h1>All cart items ..<h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        require 'library/user.php';
        $name = $_COOKIE['username'];
        $posts = get_all_cart($name);
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
                    <button type="submit" class="btn btn-sm btn-primary">Buy Now</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
        </div>
      </div>
    </div>