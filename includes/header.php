<?php
require_once 'users.php';
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}  else {
    $user_id = $_SESSION['user_id'];
    $userModel = new user();
    $userSet = $userModel->fetchById($user_id);
}

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>MyAds Website</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/jqueryui.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery1.min.js"></script>
        <!-- start menu -->
        <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/megamenu.js"></script>
        <script>$(document).ready(function() {
                $(".megamenu").megamenu();
            });</script>
        <!--start slider -->
        <link rel="stylesheet" href="css/fwslider.css" media="all">
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/css3-mediaqueries.js"></script>
        <script src="js/fwslider.js"></script>
        <!--end slider -->
        <script src="js/jquery.easydropdown.js"></script>
    </head>
    <body>
        <div class="header-top">
            <div class="wrap"> 

                <div class="cssmenu">
                    <ul>
                        <li class="active">Welcome <?php echo $userSet[0]['fname']; ?></li> |                        
                        <li class="active"><a href="account.php">Account</a></li> |                        
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="wrap">
                <div class="header-bottom-left">
                    <div class="logo">
                        <a href="index.php"><img src="images/logo.jpg" alt=""/></a>
                    </div>
                    <div class="menu">
                        <ul class="megamenu skyblue">
                            <li class="active grid"><a href="index.php">Home</a></li>						
                            <li><a class="color5" href="#">Category</a>
                                <div class="megapanel">
                                    <div class="col1">
                                        <div class="h_nav">								
                                            <ul>
                                                <li><a href="index.php?cat=Electronics">Electronics</a></li>
                                                <li><a href="index.php?cat=Home">Home</a></li>
                                                <li><a href="index.php?cat=Beaty">Beaty</a></li>
                                                <li><a href="index.php?cat=Toys and Games ">Toys and Games </a></li>
                                                <li><a href="index.php?cat=Woman Clothing">Woman Clothing </a></li>
                                                <li><a href="index.php?cat=Men Clothing">Men Clothing </a></li>
                                            </ul>	
                                        </div>							
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="header-bottom-right">
                    <div class="search">	  
                        <input type="text" name="s" class="textbox" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Search';
                                }" style="width: 250px">
                        <input type="submit" value="Subscribe" id="submit" name="submit">
                        <div id="response"> </div>
                    </div>                    
                </div>
                <div class="clear"></div>
            </div>
        </div>