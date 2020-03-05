<?php 
   include('config/connect.php');

   if(isset($_POST['keyword'])) {
      $keyword=$_POST['keyword'];
      $select=mysqli_query($conn, "SELECT * FROM menus WHERE menu_name LIKE '%$keyword%' "); 
   } else {
      $select=mysqli_query($conn, "SELECT * FROM menus");   
   }
   $count=mysqli_num_rows($select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Menus</title>
</head>
<body>
   <?php 
      include('nav.php'); 
      include('cart.php');
   ?>

   <section id="body"> 
      <div id="page-title">
         <h2>Menus</h2>
      </div>

      <div class="search-bar">
         <form name="search" action="menus.php" method="post">
            <input type="text" placeholder="search" name="keyword">
            <input class="hidden-button" typt="submit" value="search">
         </form> 
      </div>

      <div class="content">
         <?php for ($i=0; $i < $count; $i++) : $data=mysqli_fetch_array($select); ?>
         <ul class="list">
            <li><a href="menu.php?mid=<?php echo $data['menu_id'];?>"><?php echo $data['menu_name'];?></a></li>
         </ul>
         <?php endfor; ?>
      </div>
   </section>

   <script>
    document.onkeydown=function(evt) {
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13) {
            document.search.submit();
        }
    }
</script>
</body>
</html>
