<?php require_once 'includes/users.php'; ?>
<?php
if(isset($_GET['facebook'])){
    $email = $_GET['email'];
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $gender = $_GET['gender'];
}
if(isset($_POST['submit'])){
    $user = new user();
    if($user->create($_POST)){
        header("location:index.php");
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

                <div class="cssmenu">
                    <ul>
                        <li class="active"><a href="login.php">Login</a></li> |                        
                        <li><a href="signup.php">Signup</a></li>
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
        $("#history").append(htmlfive);

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
        <!--    	      <h4 class="title">Create an Account</h4>-->
        <form action="register.php" method="post">
            <h4 class="title">Personal Info</h4>
            <div class="col_1_of_2 span_1_of_2">                             
                <div class="col_1_of_2">
                    <input type="text" name="fname"
                  <?php if(isset($fname)){
                        echo "value='{$fname}'";
                    }else{
                        echo "value='Firt Name'";
                    } ?>
                            onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'First Name';
                            }">                                      
                </div>
                <div class="col_1_of_2">
                    <input type="text" name="lname" 
                    <?php if(isset($fname)){
                        echo "value='{$lname}'";
                    }else{
                        echo "value='Last Name'";
                    } ?>       
                           onfocus="this.value = '';" onblur="if (this.value == '') {
                                this.value = 'Last Name';
                            }">
                </div>
                <div><input type="text" name="birth" id="datepicker" value="Date Of Birth" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Date Of Birth';
                        }"></div>
                <div>
                    <select name="gender">
                        <option value="1"
                         <?php if(isset($gender)){
                             if($gender == '1'){
                                 echo "selected='selected'";
                             }                        
                        } ?>
                        >Male</option>
                        <option value="0"
                        <?php if(isset($gender)){
                             if($gender == '0'){
                                 echo "selected='selected'";
                             }                        
                        } ?>
                        >Female</option>
                    </select>
                </div>                                 
                <div><input type="text" name="email" 
                     <?php if(isset($fname)){
                        echo "value='{$email}'";
                    }else{
                        echo "value='Email'";
                    } ?>       
                             onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'E-Mail';
                        }"></div>
                <div><input type="password" value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'password';
                        }"></div>
                <div><input type="password" value="retype-password" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Retype password';
                        }"></div>
            </div>

            <div class="col_1_of_2 span_1_of_2">	                             
                <div> <h4 class="title">Occupation</h4></div>
                <div>
                    <select name="occup" id="ocup">
                        <option value="student">Student</option>
                        <option value="other">Other</option>
                    </select>
                    <div id="accupation" style="display: none">
                    <label>Other :</label>
                    <input type="text" name="other_occup">     
                    </div>
                </div>
                <div>
                    <h5>Where are you from ?</h5>
                    <select id="country" name="country" name="country" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">Select a Country</option>         
                        <option value="AX">Åland Islands</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua And Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, Democractic Republic</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Cote D'Ivoire (Ivory Coast)</option>
                        <option value="HR">Croatia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="TP">East Timor</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Islas Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji Islands</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="FX">France, Metropolitan</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia, The</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard and McDonald Islands</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong S.A.R.</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KR">Korea</option>
                        <option value="KP">Korea, North</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macau S.A.R.</option>
                        <option value="MK">Macedonia</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldova</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua new Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn Island</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="RW">Rwanda</option>
                        <option value="SH">Saint Helena</option>
                        <option value="KN">Saint Kitts And Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent And The Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                    </select></div>		        
                <div>
                    <h5>Where do you live?</h5>
                    <select id="country" name="live" onchange="change_country(this.value)" class="frm-field required">
                        <option value="null">Select a Country</option>         
                        <option value="AX">Åland Islands</option>
                        <option value="AF">Afghanistan</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AS">American Samoa</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AQ">Antarctica</option>
                        <option value="AG">Antigua And Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BD">Bangladesh</option>
                        <option value="BB">Barbados</option>
                        <option value="BY">Belarus</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BV">Bouvet Island</option>
                        <option value="BR">Brazil</option>
                        <option value="IO">British Indian Ocean Territory</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CM">Cameroon</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="CF">Central African Republic</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="CN">China</option>
                        <option value="CX">Christmas Island</option>
                        <option value="CC">Cocos (Keeling) Islands</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CG">Congo</option>
                        <option value="CD">Congo, Democractic Republic</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="CI">Cote D'Ivoire (Ivory Coast)</option>
                        <option value="HR">Croatia (Hrvatska)</option>
                        <option value="CU">Cuba</option>
                        <option value="CY">Cyprus</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="TP">East Timor</option>
                        <option value="EC">Ecuador</option>
                        <option value="EG">Egypt</option>
                        <option value="SV">El Salvador</option>
                        <option value="GQ">Equatorial Guinea</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands (Islas Malvinas)</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji Islands</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="FX">France, Metropolitan</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="TF">French Southern Territories</option>
                        <option value="GA">Gabon</option>
                        <option value="GM">Gambia, The</option>
                        <option value="GE">Georgia</option>
                        <option value="DE">Germany</option>
                        <option value="GH">Ghana</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GU">Guam</option>
                        <option value="GT">Guatemala</option>
                        <option value="GG">Guernsey</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea-Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HT">Haiti</option>
                        <option value="HM">Heard and McDonald Islands</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong S.A.R.</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IR">Iran</option>
                        <option value="IQ">Iraq</option>
                        <option value="IE">Ireland</option>
                        <option value="IM">Isle of Man</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JE">Jersey</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KR">Korea</option>
                        <option value="KP">Korea, North</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LB">Lebanon</option>
                        <option value="LS">Lesotho</option>
                        <option value="LR">Liberia</option>
                        <option value="LY">Libya</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MO">Macau S.A.R.</option>
                        <option value="MK">Macedonia</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia</option>
                        <option value="MD">Moldova</option>
                        <option value="MC">Monaco</option>
                        <option value="MN">Mongolia</option>
                        <option value="ME">Montenegro</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="MM">Myanmar</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NG">Nigeria</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="MP">Northern Mariana Islands</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PK">Pakistan</option>
                        <option value="PW">Palau</option>
                        <option value="PS">Palestinian Territory, Occupied</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua new Guinea</option>
                        <option value="PY">Paraguay</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn Island</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="PR">Puerto Rico</option>
                        <option value="QA">Qatar</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="RW">Rwanda</option>
                        <option value="SH">Saint Helena</option>
                        <option value="KN">Saint Kitts And Nevis</option>
                        <option value="LC">Saint Lucia</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent And The Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">Sao Tome and Principe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                    </select>
                </div>
                <div>
                    <br>
                    <h1 class="title">Which of the following is within your interest</h1>
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
                    <p class="code">Religion</p>                    
                    <select name="religion">
                        <option value="muslim">Muslim</option>
                        <option value="christian">Christian</option>
                    </select>                    
                </div>
                <div>
                    <p class="code">Preferred Colors :</p>                    
                    <select name="color">
                        <option value="white">White</option>
                        <option value="black">Black</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="green">Green</option>
                    </select>                    
                </div>
                <br>
                <div>    
                    <button class="grey" name="submit">Submit</button>
                    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                </div>
            </div>            
            <div class="clear"></div>
        </form>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>