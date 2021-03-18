<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		{$_POST['code']} is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['name'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break;
      }
    }
  }

 function formatNumber($number) {
  return number_format((float)$number, 2, '.', '');
 }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
  </head>
  <body>
  <div style="width:700px; margin:50 auto;">

    <h2>Shopping Cart</h2>   
    <a href="index.php">
    Back To the Shop
    </a> </br>
    <?php
    if(!empty($_SESSION["shopping_cart"])) {
    $cart_count = count($_SESSION["shopping_cart"]);
    ?>

    

    <span>Total items: <?php echo $cart_count; ?></span>
    <?php
    }
    ?>

  <div class="cart">

    <?php
    if(isset($_SESSION["shopping_cart"])){
        $total_price = 0;
    ?>	

    <table>
    <tbody>
    <tr>
      <td>ITEM NAME |</td>
      <td> PRICE |</td>
      <td> QUANTITY |</td>
      <td> ITEMS TOTAL</td>
    </tr>	
    <?php		
    foreach ($_SESSION["shopping_cart"] as $product){
    ?>
    <tr>
      <td><?php echo $product["name"]; ?></td>
      <td><?php echo formatNumber($product["price"]); ?></td>
      <td><?php echo $product["quantity"]; ?></td>
      <td><?php echo formatNumber($product["price"]*$product["quantity"]); ?></td>
      <td>
      <form method='post' action=''>
        <input type='hidden' name='code' value="<?php echo $product["name"]; ?>" />
        <input type='hidden' name='action' value="remove" />
        <button type='submit' class='remove'>Remove Item</button>
      </form>
      </td>
    </tr>

    <?php
    $total_price += ($product["price"]*$product["quantity"]);
    }
    ?>

    <tr>
      <td colspan="5" align="right">
        <strong>TOTAL: <?php echo formatNumber($total_price); ?></strong>
      </td>
    </tr>
    </tbody>
    </table>		
      <?php
    }else{
      echo "<h3>Your cart is empty!</h3>";
      }
    ?>
  </div>

  <div style="clear:both;"></div>

  <div class="message_box" style="margin:10px 0px;">
  <?php echo $status; ?>
  </div>


  </div>
  </body>
</html>
