<?php require_once 'includes/items.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php
$itemModel = new product();
if (isset($_GET['cat'])) {
    $itemSet = $itemModel->fetchByCat($_GET['cat']);
} else {
    $itemSet = $itemModel->fetchAll();
}
?>
<!-- start slider -->
<div id="fwslider">
    <div class="slider_container">
        <div class="slide"> 
            <!-- Slide image -->
            <img src="images/banner.jpg" alt=""/>
            <!-- /Slide image -->
            <!-- Texts container -->
            <div class="slide_content">
                <div class="slide_content_wrap">
                    <!-- Text title -->
                    <h4 class="title">Aluminium Club</h4>
                    <!-- /Text title -->

                    <!-- Text description -->
                    <p class="description">Experiance ray ban</p>
                    <!-- /Text description -->
                </div>
            </div>
            <!-- /Texts container -->
        </div>
        <!-- /Duplicate to create more slides -->
        <div class="slide">
            <img src="images/banner1.jpg" alt=""/>
            <div class="slide_content">
                <div class="slide_content_wrap">
                    <h4 class="title">consectetuer adipiscing </h4>
                    <p class="description">diam nonummy nibh euismod</p>
                </div>
            </div>
        </div>
        <!--/slide -->
    </div>
    <div class="timers"></div>
    <div class="slidePrev"><span></span></div>
    <div class="slideNext"><span></span></div>
</div>
<!--/slider -->
<div class="main">
    <div class="wrap">
        <div class="section group">
            <div class=" span_2_of_2">
                <h2 class="head">Featured Products</h2>
                <?php
                $i = 1;
                foreach ($itemSet as $item) {
                    $i++;
                    echo "<div class='row'><a href='product.php?id={$item['product_id']}'>"
                    . "<img src='items/{$item['image']}' width='200' height='350' />"
                    . "<p class='title'>{$item['product_name']}</p>"
                    . "<a href= '{$item['url']}' class='title' target='blank'>Link</a>"
                    . "</a></div>";
                    if ($i % 3 == 1) {
                        echo "<div class='clear'></div>";
                    }
                }
                ?>                             
            </div>
            <div class="clear"></div>

        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>