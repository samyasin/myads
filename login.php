<?php ?>
<?php require_once 'includes/users.php'; ?>
<?php
$user = new user();
if (isset($_POST['email']) && isset($_POST['password'])) {
    $user_id = $user::auth($_POST['email'], $_POST['password']);
    if ($user_id) {
        header("location:index.php");
    } else {
        $message = "The Login you entered is incorrect, Please try again.";
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
        <script>
            // Facebook Login
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '631145070276484',
                    xfbml: true,
                    version: 'v2.1'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                    return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        <script>
            // This is called with the results from from FB.getLoginStatus().
            function statusChangeCallback(response) {
                console.log('statusChangeCallback');
                console.log(response);
                // The response object is returned with a status field that lets the
                // app know the current login status of the person.
                // Full docs on the response object can be found in the documentation
                // for FB.getLoginStatus().
                if (response.status === 'connected') {
                    // Logged into your app and Facebook.
                    testAPI();
                } else if (response.status === 'not_authorized') {
                    // The person is logged into Facebook, but not your app.
                    document.getElementById('status').innerHTML = 'Please log ' +
                            'into this app.';
                } else {
                    // The person is not logged into Facebook, so we're not sure if
                    // they are logged into this app or not.
                    document.getElementById('status').innerHTML = 'Please log ' +
                            'into Facebook.';
                }
            }

            // This function is called when someone finishes with the Login
            // Button.  See the onlogin handler attached to it in the sample
            // code below.
            function checkLoginState() {
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId: '567789780017251',
                    cookie: true, // enable cookies to allow the server to access 
                    // the session
                    xfbml: true, // parse social plugins on this page
                    version: 'v2.1' // use version 2.1
                });

                // Now that we've initialized the JavaScript SDK, we call 
                // FB.getLoginStatus().  This function gets the state of the
                // person visiting this page and can return one of three states to
                // the callback you provide.  They can be:
                //
                // 1. Logged into your app ('connected')
                // 2. Logged into Facebook, but not your app ('not_authorized')
                // 3. Not logged into Facebook and can't tell if they are logged into
                //    your app or not.
                //
                // These three cases are handled in the callback function.

                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });

            };

            // Load the SDK asynchronously
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            // Here we run a very simple test of the Graph API after login is
            // successful.  See statusChangeCallback() for when this call is made.
            function testAPI() {
                FB.api('/me', function(response) {
                    console.log(response);
                    $.ajax(
                            {
                                type: "POST",
                                //url: "register.php?user_id=" + response.id +"&facebook=1&email="+response.email+"&fname="+response.first_name+"&lname="+response.last_name+"&gender="+response.gender,
                                cache: false,
                                success: function(data)
                                {
                                   window.location = "register.php?user_id=" + response.id + "&facebook=1&email=" + response.email + "&fname=" + response.first_name + "&lname=" + response.last_name + "&gender=" + response.gender;
                                }
                            });
                });
            }
            ;

        </script>   
    <div class="header-top">
        <div class="wrap"> 

            <div class="cssmenu">
                <ul>
                    <li><a href="login.php">Log In</a></li> |
                    <li><a href="register.php">Sign Up</a></li>
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
                        <li class="active grid"><a href="index.html">Home</a></li>						
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
    <div class="login">
        <div class="wrap">                                        
            <div class="col_1_of_login span_1_of_login">
                <h4 class="title">New Customers</h4>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan</p>
                <div style="float:left" class="button1">
                    <div class="fb-login-button" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>
                </div>
                <div class="button1">
                    <a href="register.php"><input type="submit" name="Submit" value="Create an Account"></a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="col_1_of_login span_1_of_login">
                <div class="login-title">
                    <h4 class="title">Registered Customers</h4>
                    <div id="loginbox" class="loginbox">
                        <div>
                            <h3 class="error">
                                <?php
                                if (isset($message)) {
                                    echo $message;
                                }
                                ?>
                            </h3>
                        </div>
                        <form action="login.php" method="post" name="login" id="login-form">
                            <fieldset class="input">
                                <p id="login-form-username">
                                    <label for="modlgn_username">Email</label>
                                    <input id="modlgn_username" type="email" name="email" class="inputbox" size="18" autocomplete="off">
                                </p>
                                <p id="login-form-password">
                                    <label for="modlgn_passwd">Password</label>
                                    <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
                                </p>                                                    
                                <div class="remember">
                                    <p id="login-form-remember">
                                        <label for="modlgn_remember"><a href="#">Forget Your Password ? </a></label>
                                    </p>
                                    <input type="submit" name="Submit" class="button" value="Login"><div class="clear"></div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>