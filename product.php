<?php require_once 'includes/items.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php
$product_id = $_GET['id'];
$itemModel = new product();
$productSet = $itemModel->fetchById($product_id);

?>
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
                    <p class="m_5"><?php echo $productSet[0]['price'] ?></p>
                    <div class="btn_form">
                        <form>
                            <input value="buy" title="" type="submit">
                        </form>
                    </div>
                    <p class="m_text2"><?php echo $productSet[0]['description'] ?></p>
                    <span class="m_link"><a href="<?php echo $productSet[0]['url'] ?>" target="_blank">Give Us Feed Back to See the LINK</a></span>
                </div>
                <div class="clear"></div>	

                <div class="toogle">
                    <h3 class="m_3">Product Details</h3>
                    <p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
                </div>
                <div class="toogle">
                    <h3 class="m_3">More Information</h3>
                    <p class="m_text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</p>
                </div>

            </div>


        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>
