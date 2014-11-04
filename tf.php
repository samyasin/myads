<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/userlog.php'; ?>
<?php require_once 'includes/items.php'; ?>
<?php
$userLog = new userLog();
$logSet  = $userLog->fetchById($_SESSION['user_id']);
$total = count($logSet);
// calculate Product Session Array 
for($i=0;$i<$total;$i++){
    $product[$i]['product_id'] = $logSet[$i]['product_id'];
    $product[$i]['category'] = $logSet[$i]['category'];
    $product[$i]['meta']     = $logSet[$i]['meta'];    
}
// calculate repeated products in Session 
foreach ($product as $item){
    $items[] = $item['product_id'];
}
$itemFrequency = array_count_values($items);
// calculate TF 
$product = new product();
$output = '';
foreach ($itemFrequency as $key=>$value){
    $productName = $product->fetchNameById($key);
    $output .= "<br><p><u>$productName : </u></p>";
    $output .= " <p>(TF) = ";
    $output .= $total / $value;
    $output .= "</p>";
    $output .= "<p>";
    $output .= " (IF) = ";
    $output .= log($total / $value,10);
    $output .= "</p>";
    $output .= " <p>(TFIDF) = ";
    $output .= ($total / $value) * log($total / $value,10);
    $output .= "</p><br>";
}
// Jaccerd Similarity:
$joutput = " ";
$recommended = array();
foreach ($itemFrequency as $key2=>$value2){
   $tfidf = ($total / $value2) * log($total / $value2,10);
   if($tfidf > 1){
    $productName = $product->fetchNameById($key2);
    $jcarrt = 4/($total * 4);
    $joutput .= "<p>$productName  = ";
    $joutput .= "$jcarrt</p><br>";
    $recommended[] = $key2;
   }
}

if(isset($recommended)){
    foreach ($recommended as $recomProduct){
        $productSet[] = $product->fetchById($recomProduct);
    }
}
?>
<div class="main">
    <div class="wrap">
        <div style="clear: both"></div>
        <div>
            <h3 class="m_3" style="margin-top: 100px;color: green">TFIDF : </h3>
        </div>
            <?php
            if(isset($output)){
                echo $output;
            }
            
            ?>
        <div>
            <h3 class="m_3" style="margin-top: 100px;color: green">Jaccerd Similarity: </h3>
            <?php
            if(isset($output)){
                echo $joutput;
            }
            
            ?>
        </div>
        <?php if(isset($productSet)) : ?>
        <!-- Start Similar Products Slider --> 
                <div class="clients">
                    <h3 class="m_3">Other Suggestions According to your interest</h3>
                    <div class="nbs-flexisel-container">
                        <div class="nbs-flexisel-inner">
                            <ul id="flexiselDemo3" class="nbs-flexisel-ul" style="left: -178.8px; display: block;">                 
            <?php foreach ($productSet as $image) : ?>                                
                   <a href='product.php?id=<?php echo $image[0]['product_id'] ?>'>
                   <li class='nbs-flexisel-item' style='width: 178.8px;'>                                         
                   <img src='items/<?php echo  $image[0]['image'] ?>'></li></a>
            <?php endforeach; ?>                  
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
             <?php endif; ?>
    </div>
</div>


<?php require_once 'includes/footer.php'; ?>