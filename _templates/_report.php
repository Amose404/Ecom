
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">user</th>
      <th scope="col">Item</th>
      <th scope="col">price</th>
    </tr>
  </thead>
  <?php
        require_once 'library/user.php';
        $posts = get_all_report();
        $i = 1;
        foreach($posts as $post){ 
        ?>
  <tbody>
    <tr>
      <th scope="row"><?=$i ?></th>
      <td><?=$post['user_name'] ?></td>
      <td><?=$post['item_name'] ?></td>
      <td><?=$post['item_price'] ?></td>
      <?$i=$i++; ?>
    </tr>
        <?php }?>
        </tbody>
</table>
        </div>
      </div>
    </div>