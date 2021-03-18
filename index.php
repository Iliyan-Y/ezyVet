<?php 
  session_start();
  $status="";
  // ######## please do not alter the following code ########
  $products = [
    [ "name" => "Sledgehammer", "price" => 125.75 ],
    [ "name" => "Axe", "price" => 190.50 ],
    [ "name" => "Bandsaw", "price" => 562.131 ],
    [ "name" => "Chisel", "price" => 12.9 ],
    [ "name" => "Hacksaw", "price" => 18.45 ],
    ];
    // ########################################################
  
    if (isset($_POST['code']) && $_POST['code']!=""){
      $code = $_POST['code'];
    //$result = $products;
    
      $selected_product; 
      foreach($products as $product) {
        if($product['name'] == $code) {
          $selected_product = $product;
        }
      };
    
      $name = $selected_product['name'];
      $price = $selected_product['price'];
    
      $cartArray = array(
        $code=>array(
        'name'=>$name,
        'price'=>$price,
        'quantity'=>1,
        ));
    
      if(empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        $status = "<div class='box'>Product is added to your cart!</div>";
        }else{
        $array_keys = array_keys($_SESSION["shopping_cart"]);
          if(in_array($code,$array_keys)) {
            $_SESSION["shopping_cart"][$code]['quantity']++;
            $status = "<div class='box' style='color:red;'>
            {$code} total: {$_SESSION["shopping_cart"][$code]['quantity']}</div>";	
        } else {
          $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
          $status = "<div class='box'>Product is added to your cart!</div>";
        }
      }
    }  
    
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
