<section class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
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
        Successfully uploaded...
      </div>
      <?php
    }
    ?>
          <form method="POST" action="upload.php?post" enctype="multipart/form-data">
            <div class="mb-3">
    <h1> Enter your new item ...</h1>
    <br>
    <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Item Name" required autofocus ><br>
    <input type="text" name="brand_name" id="inputPhone" class="form-control" placeholder="Brand Name" required autofocus >
    <br>
    <input name="item_price" type="price" id="price" class="form-control" placeholder="Item Price" required> <br>

              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="About a Product" name="item_decre"></textarea>
            </div>
            <div class="mb-3">
              <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <div class="mb-3">
              <input class="btn btn-primary" style="width: 100%"  type="submit" value="Post">
            </div>
          </form>
        </div>
      </div>
    </section>