<?php
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
    <h2>Shopping Cart</h2>  
    <a href="index.php">Back To the Shop</a></br>
    <table class="table">
<tbody>
<tr>
<td>ITEM NAME |</td>
<td> PRICE |</td>
<td> QUANTITY |</td>
<td> ITEMS TOTAL</td>
</tr>	

<tr>

<td>product name</td>
<td>single price</td>
<td>quantity</td>
<td>TOTAL PRODUCT PRICE</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>

</tr>



<tr>
<td colspan="5" align="right">
<strong>TOTAL: </strong>
</td>
</tr>
</tbody>
</table>
  </body>
</html>
