<?php require_once 'includes/items.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/userlog.php'; ?>
<?php require_once 'includes/userBehaviour.php'; ?>
<?php
$product_id = $_GET['id'];
$itemModel  = new product();
$productSet = $itemModel->fetchById($product_id);
$category   = $productSet[0]['category'];
$imageSet = $itemModel->fetchByCat($category);
// log user actions 
$userLog = new userLog();
$userLog->productId = $product_id;
$userLog->userId = $_SESSION['user_id'];
$userLog->insert();

// log user behavoiur
if (isset($_POST['submit'])) {
    $behave = new userBehaviour();
    $behave->userId = $_SESSION['user_id'];
    $behave->productId = $product_id;
    $behave->behave = isset($_POST['behave']) ? $_POST['behave'] : 0;
    $behave->refuseReason = isset($_POST['never']) ? $_POST['never'] : 0;
    $behave->insert();
}
?>
<script>
    $(document).ready(function() {
        $("#buy").click(function() {
            $("#watchme").show('slow');
        });
        $("#consider").click(function() {
            $("#watchme").hide('slow');
            $("#considerpara").show('slow');

        });
        $("#never").click(function() {
            $("#watchme").hide('slow');
            $("#considerpara").hide('slow');
            $("#neverpara").show('slow');

        });

    });

</script>
<hr>
<div class="main">
    <div class="wrap">
        <ul class="breadcrumb breadcrumb__t">
            <a href="index.php" class="home">Home</a> / <a href="index.php?cat=<?php echo $productSet[0]['category'] ?>" class="home"><?php echo $productSet[0]['category'] ?></a> /
        </ul>
        <div class="section group">
            <div class=" span_2_of_2">
                <h2 class="head"><?php echo $productSet[0]['product_name'] ?></h2>

                <div class="grid images_3_of_2">
                    <div id="container">
                        <div id="products_example">
                            <div id="products">
                                <img src='items/<?php echo $productSet[0]['image'] ?>' width='200' height='350' /> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="desc1 span_3_of_2">
                    <h3 class="m_3"><?php echo $productSet[0]['product_name'] ?></h3> 
                    <p class="m_text2"><?php echo $productSet[0]['description'] ?></p>
                    <div class="btn_form">
                        <form action="product.php?id=<?php echo $product_id ?>" method="post">
                            <p><input type="radio" value="1" name="behave" id="buy"> I Will definetly consider buy this product .</p>
                            <p><input type="radio" value="2" name="behave" id="consider"> I May consider buy this product .</p>
                            <p><input type="radio" value="3" name="behave" id="never"> I Will never buy this product .</p>
                            <div id="watchme" style="margin:40px 0;display: none">
                                <p class="m_5"><?php echo $productSet[0]['price'] ?></p>
                                <p class="m_5"><a href="<?php echo $productSet[0]['url'] ?>"><u>Product Link</u></a></p>
                                <h3 class="m_3" style="margin-top:20px;">Why This Recommended for you ?</h3>
                                <p class="m text">Based in your Specified Intrest </p>
                                <p>In <?php echo $productSet[0]['category'] . " (" . $productSet[0]['meta'] . ")" ?></p>
                            </div>
                            <div id="considerpara" style="margin:40px 0;display: none">
                                <p class="m_5"><?php echo $productSet[0]['price'] ?></p>
                                <p class="m_5"><a href="<?php echo $productSet[0]['url'] ?>"><u>Product Link</u></a></p>                                
                            </div>
                            <div id="neverpara" style="margin:20px;display: none">
                                <h3 class="m_3" style="margin-top:20px;">Can you please tell us why?</h3>
                                <p><input type="radio" value="1" name="never">It wasnt to my taste . </p>
                                <p><input type="radio" value="2" name="never">This is not i had in mind. </p>
                                <p><input type="radio" value="3" name="never">I dont need this product. </p>

                            </div>
                            <br>    
                            <input value="Submit" title="" type="submit" name="submit">
                        </form>
                    </div>
                </div>
                <div class="clear"></div>	
                <!-- Start Similar Products Slider --> 
                <div class="clients">
                    <h3 class="m_3">Other Suggestions According to your interest</h3>
                    <div class="nbs-flexisel-container">
                        <div class="nbs-flexisel-inner">
                            <ul id="flexiselDemo3" class="nbs-flexisel-ul" style="left: -178.8px; display: block;">
                                <?php
                                foreach ($imageSet as $image){
                                    echo "<a href='product.php?id={$image['product_id']}'>"
                                    . "<li class='nbs-flexisel-item' style='width: 178.8px;'>"                                         
                                         . "<img src='items/{$image['image']}'></li></a>";
                                }                                
                                ?>
                                
                            </ul>
                                                           
                        </div>                            
                    </div>
                    <script type="text/javascript">
                        $(window).load(function() {
                            $("#flexiselDemo1").flexisel();
                            $("#flexiselDemo2").flexisel({
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });

                            $("#flexiselDemo3").flexisel({
                                visibleItems: 5,
                                animationSpeed: 1000,
                                autoPlay: true,
                                autoPlaySpeed: 3000,
                                pauseOnHover: true,
                                enableResponsiveBreakpoints: true,
                                responsiveBreakpoints: {
                                    portrait: {
                                        changePoint: 480,
                                        visibleItems: 1
                                    },
                                    landscape: {
                                        changePoint: 640,
                                        visibleItems: 2
                                    },
                                    tablet: {
                                        changePoint: 768,
                                        visibleItems: 3
                                    }
                                }
                            });

                        });
                    </script>
                    <script src="js/jquery.flexisel.js" type="text/javascript"></script>
                </div>
                <!-- End of Slider -->
                <div class="toogle">
                    <div class="btn_form">
                        <form action="feedback.php?product_id=<?php echo $product_id; ?>" method="post" style="border: 2px solid #ccc;padding: 10px">                        
                            <h3 class="m_3">Feedback</h3>                        
                            <div style="float:left">
                                <h3>Rate :</h3>
                            </div>
                            <div>
                                <input name="star1" type="radio" class="star" value="1"/>
                                <input name="star1" type="radio" class="star" value="2"/>
                                <input name="star1" type="radio" class="star" value="3"/>
                                <input name="star1" type="radio" class="star" value="4"/>
                                <input name="star1" type="radio" class="star" value="5"/>                         
                            </div>
                            <div style="clear: both"></div>
                            <br>
                            <textarea rows="5" cols="60" name="comment" placeholder="Comment \ Review Tags"></textarea>
                            <br><br>
                            <input value="Submit" type="submit" name="submit">
                        </form>
                    </div>
                </div>
                <div class="toggle">
                    <div style="float:left;margin-bottom: 20px;">
                        <h3 class="m_3">Do you like to go back to your product list ? </h3>
                    </div>
                    <div style="float:left">
                        <a href="index.php?redirect=true" style="margin:10px;"><button class="newbutton">YES</button></a>
                        <a href=""style="margin:10px;"><button class="newbutton">No</button></a>
                    </div>
                    <div style="clear:both"></div>
                    <div style="float:left">
                        <h3 class="m_3">Do you like to go back to your product list ? </h3>
                    </div>
                    <div style="float:left">
                        <a href="index.php?redirect=true" style="margin:10px;"><button class="newbutton">YES</button></a>
                        <a href=""style="margin:10px;"><button class="newbutton">No</button></a>
                    </div>
                    <div style="clear:both"></div>


                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>
