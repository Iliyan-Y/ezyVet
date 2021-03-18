<?php 
  $products = [
    [ "name" => "Sledgehammer", "price" => 125.75 ],
    [ "name" => "Axe", "price" => 190.50 ],
    [ "name" => "Bandsaw", "price" => 562.131 ],
    [ "name" => "Chisel", "price" => 12.9 ],
    [ "name" => "Hacksaw", "price" => 18.45 ],
    ];
    // ########################################################
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart Home</title>
  </head>
  <body>

  <?php foreach ($products as $product) { ?>
    <div class="product">
      <form method='post' action=''>
        <input type='hidden' name='code' value=<?php echo $product['name'] ?> />
          <?php echo $product['name']; echo ' '; echo number_format((float)$product['price'], 2, '.', '')  ?> 
          <button type='submit'>Add to cart</button>
      </form>
   </div></br>
  <?php }?>

  </body>
</html>
