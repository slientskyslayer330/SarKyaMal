<?php 
   include('config/connect.php');

   if(!isset($_GET['orderid'])) :
      header("location: order-history.php");
   else :
      $order_id=$_GET['orderid'];

      $select_order=mysqli_query($conn, "SELECT * FROM orders WHERE orders.order_id='$order_id'");
      $data_order=mysqli_fetch_array($select_order);

      $sql="SELECT * FROM restaurants, restaurant_menu, menus, order_detail
            WHERE order_detail.order_id='$order_id'
            AND restaurants.restaurant_id=restaurant_menu.restaurant_id 
            AND menus.menu_id=restaurant_menu.menu_id
            AND order_detail.rm_id=restaurant_menu.rm_id";
      
      $select=mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="imgs/favicon.ico" type="image/ico">
   <title>Order Detail History</title>
</head>
<body>
<section id="body"> 
   <?php 
      include('nav.php'); 
      include('cart.php');
   ?>

   <div id="page-title">
      <h2>ID: <?php echo $data_order['order_id'];?></h2>
      <?php echo substr($data_order['date'], 0, 10);?>&emsp;|&emsp;
      <?php echo $data_order['status'];?>
   </div>

   <div class="content">

      <?php 
         $count=mysqli_num_rows($select);
         $no=1;
         for ($i=0; $i < $count; $i++) :
            $data=mysqli_fetch_array($select);
      ?>
         <p><?php echo $no.". <b>".$data['menu_name']."</b> form <b>".$data['restaurant_name']."</b>"; ?></p>
         <div class="row">
            <p style="width: 70%;"><?php echo $data['price']; ?> Ks x <?php echo $data['quantity'];; ?> Qty </p>
            <p style="width: 30%;"><?php echo $data['price'] * $data['quantity'];; ?> Ks</p>
         </div>
         <hr>
      <?php 
         $no++;
         endfor;
      endif; 
      ?>

      <div class="row">
         <p style="width: 60%;"></p>
         <p style="width: 40%;"><big>Total: <?php echo $data_order['total']; ?> Ks</big></p>
      </div>    
   </div>
</section>

</body>
</html>