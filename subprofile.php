<?php
session_start();
require_once 'includes/subprofile.php'; ?>
<?php
$user_id = $_SESSION['user_id'];
if(isset($_POST['submit'])){
    $user = new user();
    if($user->create($_POST)){
        $message = "Your Su b Profile created Successfully";
    }
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
                                                <li><a href="mens.html">Electronics</a></li>
                                                <li><a href="mens.html">Home</a></li>
                                                <li><a href="mens.html">Beaty</a></li>
                                                <li><a href="mens.html">Toys and Games </a></li>
                                                <li><a href="mens.html">Woman Clothing </a></li>
                                                <li><a href="mens.html">Men Clothing </a></li>
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
<script>
    $(function() {
        $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
    });
    $(function() {
        $("#ocup").change(function() {
            if ($("#ocup").val() == "other") {
                $("#accupation").show();
            } else {
                $("#accupation").hide();
            }
        });
    });
    $("document").ready(function() {
        // range option 
        var credits = 10,
                html = '<input type="range"  min="0" max="' + credits + '" value="' + credits + '" name="electronics_intrest" id="discount_credits" />\
                   <span>' + credits + '</span>';
        htmlone = '<input type="range"  min="0" max="' + credits + '" value="' + credits + '" name="furniture_intrest" id="techno_credits" />\
                   <span>' + credits + '</span>';
        htmltwo = '<input type="range"  min="0" max="' + credits + '" value="' + credits + '" name="beauty_intrest" id="sport_credits" />\
                   <span>' + credits + '</span>';
        htmlthree = '<input type="range"  min="0" max="' + credits + '" value="' + credits + '" name="toys_intrest" id="car_credits" />\
                   <span>' + credits + '</span>';
        htmlfour = '<input type="range"  min="0" max="' + credits + '" value="' + credits + '" name="woman_intrest" id="music_credits" />\
                   <span>' + credits + '</span>';
        htmlfive = '<input type="range"  min="0" max="' + credits + '" value="' + credits + '" name="men_intrest" id="history_credits" />\
                   <span>' + credits + '</span>';
       
        $("#edu").append(html);
        $("#techno").append(htmlone);
        $("#sport").append(htmltwo);
        $("#car").append(htmlthree);
        $("#music").append(htmlfour);
        $("#movie").append(htmlfive);

        $('#discount_credits').on("change mousemove", function() {
            $(this).next().html($(this).val());
        });
        $('#techno_credits').on("change mousemove", function() {
            $(this).next().html($(this).val());
        });
        $('#sport_credits').on("change mousemove", function() {
            $(this).next().html($(this).val());
        });
        $('#car_credits').on("change mousemove", function() {
            $(this).next().html($(this).val());
        });
        $('#music_credits').on("change mousemove", function() {
            $(this).next().html($(this).val());
        });
        $('#history_credits').on("change mousemove", function() {
            $(this).next().html($(this).val());
        });
        $('#movie_credits').on("change mousemove", function() {
            $(this).next().html($(this).val());
        });



    });

</script>
<div class="register_account">
    <div class="wrap">
        <?php 
         if(isset($message)){
             echo "<h4 style='color:green;margin:20px 0;'>$message</h4>";
         }
        ?>
        <form action="subprofile.php" method="post">
            <h4 class="title">Sub Profile Info</h4>
            <div class="col_1_of_2 span_1_of_2">                             
                <div class="col_1_of_2">
                    <input type="text" name="name"
                  <?php if(isset($fname)){
                        echo "value='{$fname}'";
                    }else{
                        echo "value='Sub Profile Name'";
                    } ?>
                            onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'First Name';
                            }">                                      
                </div>
                <div class="col_1_of_2">
                    <input type="hidden" name="user_id"                     
                        <?php echo "value={$user_id}";
                     ?>       
                       >
                </div>                                                                 
                
            </div>

            <div class="col_1_of_2 span_1_of_2">	                                           
                <div>
                    <br>
                    <h1 class="title">Which of the following is within your Sub Profile interest ? </h1>
                    <br>                     
                    <div id="edu" style="margin: 10px">
                        <label for="points">Electronics:</label>                        
                    </div>
                    <div id="techno" style="margin: 10px;">
                        <label for="points">Furniture:</label>
                    </div>
                    <div id="sport" style="margin: 10px;">
                        <label for="points">Beauty:</label>
                    </div>
                    <div id="car" style="margin: 10px;">
                        <label for="points">Toys and Games:</label>
                    </div>
                    <div id="music" style="margin: 10px;">
                        <label for="points">Woman Clothing:</label>
                    </div>
                    <div id="movie" style="margin: 10px;">
                        <label for="points">Men Clothing:</label>
                    </div>                    
                </div>
                                
                <br>
                <div>    
                    <button class="grey" name="submit">Submit</button>                    
                </div>
            </div>            
            <div class="clear"></div>
        </form>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>