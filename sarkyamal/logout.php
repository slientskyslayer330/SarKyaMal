<?php
	session_start();
   unset($_SESSION['user_id']);
   echo" <script> 
            alert('You have logged out.'); 
            window.location.assign('index.php');                  
         </script>"; 
?>

 