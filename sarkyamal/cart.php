<?php 
   $cart = 0;
	if (isset($_SESSION['cart'])) 
	{
		foreach ($_SESSION['cart'] as $id => $qty) 
		{
			$cart+=$qty;
		} 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="config/bootstrap.min.css">
   <link rel="stylesheet" href="config/style.css">
   <link rel="stylesheet" href="fonts/BillionaireMediumGrunge.otf">
</head>
<body>
   <?php if($cart>0) :?>
      <section id="cart">

            <a href="view-cart.php"><?php echo $cart; ?> item(s)</a>
      </section>
   <?php endif; ?>
</body>
</html>