<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="imgs/favicon.ico" type="image/ico">
   <style>
       .profileimg {
            width: 60px;
            margin: 5px;
        }
        #profiles > .row > label {
            cursor: pointer;
        }

        #profiles > .row > label:hover {
            border: 1px solid #e3492b;
        }
        
        #profiles > .row > input[type="radio"]:checked + label {
            border: 1px solid #e3492b;
        }

        #psw {
            margin-bottom: 20px;
        }
   </style>
        
   <title>Sign Up</title>
</head>
<body>
    <?php include('nav.php'); ?>

<section id="body">

    <section id="page-title">
        <h2>Sign Up</h2>
    </section>

    <section id="signup-form">
    <form action="user-add.php" method="post">
	    <label>Userame:</label> 
        <input type="text" name="user_name" onfocus="hide(this)" required> 
      
        <label>Email:</label> 
        <input type="email" name="email" onfocus="hide(this)" required> 
      
        <label>Password:</label>  
        <input type="password" name="password" onfocus="show(this)" required> 
        <span id="psw">
            Must contain at least 1 number and 1 letter.<br/>
            May contain special characters: !@#$%.<br/>
            Must be 6-20 characters.<br/>
        </span> 

        <label onclick="showProfiles()" style="cursor: pointer;"><u>Choose Profile Here:</u> &#8628;</label> 
        <div id="profiles" style="display: none;">
        <div class="row">
            <input type="radio" name="profile" class="sr-only" id="profile01" value="profiles/Profile_01.jpg">
            <label for="profile01"><img class="profileimg" src="profiles/Profile_01.jpg" ></label>
            <input type="radio" name="profile" class="sr-only" id="profile02" value="profiles/Profile_02.jpg">
            <label for="profile02"><img class="profileimg" src="profiles/Profile_02.jpg"></label>
            <input type="radio" name="profile" class="sr-only" id="profile03" value="profiles/Profile_03.jpg">
            <label for="profile03"> <img class="profileimg" src="profiles/Profile_03.jpg" ></label>
            <input type="radio" name="profile" class="sr-only" id="profile04" value="profiles/Profile_04.jpg">
            <label for="profile04"><img class="profileimg" src="profiles/Profile_04.jpg"></label> 
        </div>
        <div class="row">
            <input type="radio" name="profile" class="sr-only" id="profile05" value="profiles/Profile_05.jpg">
            <label for="profile05"> <img class="profileimg" src="profiles/Profile_05.jpg" ></label>
            <input type="radio" name="profile" class="sr-only" id="profile06" value="profiles/Profile_06.jpg">
            <label for="profile06"><img class="profileimg" src="profiles/Profile_06.jpg"></label>
            <input type="radio" name="profile" class="sr-only" id="profile07" value="profiles/Profile_07.jpg">
            <label for="profile07"> <img class="profileimg" src="profiles/Profile_07.jpg" ></label>
            <input type="radio" name="profile" class="sr-only" id="profile08" value="profiles/Profile_08.jpg">
            <label for="profile08"><img class="profileimg" src="profiles/Profile_08.jpg"></label>
        </div>
        <div class="row">
            <input type="radio" name="profile" class="sr-only" id="profile09" value="profiles/Profile_09.jpg">
            <label for="profile09"> <img class="profileimg" src="profiles/Profile_09.jpg" ></label>
            <input type="radio" name="profile" class="sr-only" id="profile10" value="profiles/Profile_10.jpg">
            <label for="profile10"><img class="profileimg" src="profiles/Profile_10.jpg"></label>
            <input type="radio" name="profile" class="sr-only" id="profile11" value="profiles/Profile_11.jpg">
            <label for="profile11"> <img class="profileimg" src="profiles/Profile_11.jpg" ></label>
            <input type="radio" name="profile" class="sr-only" id="profile12" value="profiles/Profile_12.jpg">
            <label for="profile12"><img class="profileimg" src="profiles/Profile_12.jpg"></label> 
        </div>
        <div class="row">
            <input type="radio" name="profile" class="sr-only" id="profile13" value="profiles/Profile_13.jpg">
            <label for="profile13"> <img class="profileimg" src="profiles/Profile_13.jpg" ></label>
            <input type="radio" name="profile" class="sr-only" id="profile14" value="profiles/Profile_14.jpg">
            <label for="profile14"><img class="profileimg" src="profiles/Profile_14.jpg"></label>
            <input type="radio" name="profile" class="sr-only" id="profile15" value="profiles/Profile_15.jpg">
            <label for="profile15"> <img class="profileimg" src="profiles/Profile_15.jpg" ></label>
            <input type="radio" name="profile" class="sr-only" id="profile16" value="profiles/Profile_16.jpg">
            <label for="profile16"><img class="profileimg" src="profiles/Profile_16.jpg"></label>
        </div>
        </div>

       <input class="focus-button" type="submit" value="Sign Up">
       <small class="pd-left-40">Already have an accoun? <a href="login.php">Login</a> here.</small>
    </form>
    </section>

    
</section>

<script>
    function hide() {
        document.getElementById('psw').style.display ='none';
        document.getElementById('profiles').style.display ='none';
    }
    function show() {
        document.getElementById('psw').style.display ='inline-block';
        document.getElementById('profiles').style.display ='none';
    }
    function showProfiles() {
        document.getElementById('profiles').style.display ='block';
        document.getElementById('psw').style.display ='none';
    }
</script>
</body>
</html>