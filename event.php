<?php
session_start();
require_once 'includes/events.php'; ?>
<?php
$user_id = $_SESSION['user_id'];
if(isset($_POST['submit'])){
    $user = new events();
    $user->userId = $user_id;
    $user->event_date = $_POST['date'];
    $user->event_name = $_POST['event_name'];
    if($user->create()){
        $message = "Your Event created Successfully";
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
    

</script>
<div class="register_account">
    <div class="wrap">
        <?php 
         if(isset($message)){
             echo "<h4 style='color:green;margin:20px 0;'>$message</h4>";
         }
        ?>
        <form action="event.php" method="post">
            <h4 class="title">Event Info</h4>
            <div class="col_1_of_2 span_1_of_2">                             
                <div class="col_1_of_2">
                    <input type="text" name="event_name" value='Event Name'                    
                     onfocus="this.value = '';" onblur="if (this.value == '') {
                         this.value = 'Event Name';
                     }">                                      
                </div>
                <div class="col_1_of_2">
                    <input type="hidden" name="user_id"                     
                        <?php echo "value={$user_id}";
                     ?>       
                       >
                </div>   
                <div><input type="text" name="date" id="datepicker" value='Event Date'></div>
                
            </div>

            <div class="col_1_of_2 span_1_of_2">	                                           
                                    
            </div>
                                
                
                <div>    
                    <button class="grey" name="submit">Save</button>                    
                </div>
            </div>            
            <div class="clear"></div>
        </form>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>