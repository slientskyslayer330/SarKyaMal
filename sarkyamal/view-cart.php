<?php 
   include("config/connect.php");
   include("config/order-id.php");

   $order_id=autoid("orders", "order_id", "O", substr(date('Y'), 2), date('m'));
   $date=date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="imgs/favicon.ico" type="image/ico">
   <title>View Cart</title>
</head>
<body>
<section id="body"> 
   <?php include('nav.php'); ?>

   <div id="page-title">
      <h2>View Cart</h2>
      <a href="clear-cart.php">Clear Cart</a>&emsp;|&emsp;
      <a href="index.php">Order More</a>
   </div>

   <div class="content">
      <div class="row">
         <p style="width: 60%;"> Order ID: <?php echo $order_id; ?></p>
         <p style="width: 40%;"> Date: <?php echo $date; ?></p>
      </div> <br>

      <?php 
         $total = 0;
         foreach ($_SESSION['cart'] as $id => $qty) :
         $sql="SELECT * FROM restaurants, restaurant_menu, menus WHERE restaurant_menu.rm_id='$id' AND restaurants.restaurant_id=restaurant_menu.restaurant_id AND menus.menu_id=restaurant_menu.menu_id";
         $select=mysqli_query($conn, $sql); 
         $data=mysqli_fetch_assoc($select);
         $total += $data['price'] * $qty;
         $no=1;
      ?>
      
      <p><?php echo $no.". <b>".$data['menu_name']."</b> form <b>".$data['restaurant_name']."</b>"; ?></p>
      <div class="row">
         <p style="width: 70%;"><?php echo $data['price']; ?> Ks x <?php echo $qty; ?> Qty </p>
         <p style="width: 30%;"><?php echo $data['price'] * $qty; ?> Ks</p>
      </div>
      <hr>
      <?php 
         $no++;
         endforeach; 
      ?>

      <div class="row">
         <p style="width: 60%;"></p>
         <p style="width: 40%;"><big>Total: <?php echo $total; ?> Ks</big></p>
      </div>      
      <hr>

      <input type="radio" name="option" onclick="hide()" checked>Dine in
      <input type="radio" name="option" onclick="show()">Delivery
      
      
      <form action="submit-order.php" method="post">
         <input type="hidden" name="total" value="<?php echo $total;?>">
         <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
         
         <div id="deliver-to"> 
            Room: &emsp;
            <input type="text" placeholder="10-3-6" id="room" name="room"> 
         </div>
         <input type="submit" value="Confirm Order" name="order" class="focus-button">
      </form>

   </div>
</section>

<script>
   function hide() {
      document.getElementById('deliver-to').style.display ='none';
   }

   function show() {
      document.getElementById('deliver-to').style.display ='block';
   }

</script>
</body>
</html>