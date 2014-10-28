<?php require_once 'includes/items.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php
$itemModel = new product();
// UM model Script
require_once 'includes/UMmodel.php';

if (isset($_GET['cat'])) {
    $itemSet = $itemModel->fetchByCat($_GET['cat']);
} else {
    if(isset($_GET['redirect'])){
        // will start using UM
        $itemSet = $calcultedProducts;
    }else{
        $itemSet = $itemModel->fetchAll();
    }   
}
if(isset($_POST['submit'])){
   if($_POST['search'] != 'Search'){
       header("location:index.php?cat={$_POST['search']}");
   }
}
?>
 <script>
$(function() {
$( ".span_2_of_3" ).sortable();
});
</script>
<script>
  $(function() {
    var availableTags = [
      "electronics",
      "furniture",
      "beaty",
      "toys",
      "woman",
      "men"      
    ];
    $( "#search" ).autocomplete({
      source: availableTags
    });
  });
 
  $( document ).tooltip();   
  
   $(document).ready(function(){
      $("#like").click(function(){
          $("#link1").show();
          $("#link2").show();
      });   
   });
    
  
  </script>
<div class="main">
    <div class="wrap">
        <div>
            <form action="index.php" method="post">
                <input id="search" type="text" name="search" class="textbox newsearch" style="width: 80%" value="Search"
                 onblur="if (this.value == '') {this.value = 'Search';}"
                 onfocus="if (this.value == 'Search') {this.value = '';}"  >
                <input type="submit" value="Go" id="submit" name="submit" class="newbutton">                        
            </form>
        </div>  
        <div class="section group">
            <div class=" span_1_of_left" style="float: left;margin-top: 5px">
              <div class="h_nav">								
                <ul>                    
                    <li id="electronics"><a href="index.php?cat=electronics">Electronics</a></li>
                    <li id="furniture"><a href="index.php?cat=furniture">Furniture</a></li>
                    <li id="beauty"><a href="index.php?cat=beauty">Beauty</a></li>
                    <li id="toys"><a href="index.php?cat=toys">Toys and Games </a></li>
                    <li id="woman"><a href="index.php?cat=woman">Woman Clothing </a></li>
                    <li id="men"><a href="index.php?cat=men">Men Clothing </a></li>
                </ul>
              </div>
            </div>            
            <div class=" span_2_of_3" style="float: left">               
                <?php
                $i = 1;
                foreach ($itemSet as $item) {
                    $i++;
                    echo "<div class='row'><a href='product.php?id={$item['product_id']}' class='tooltip' title='{$item['meta']}'>"
                    . "<img src='items/{$item['image']}' width='200' height='350' />"
                    . "<p class='title'>{$item['product_name']}</p>"
                    . "</a></div>";
                    if ($i % 3 == 1) {
                        echo "<div class='clear'></div>";
                    }
                }
                ?>                             
            </div>
            <div class="clear"></div>
        </div>        
        <div style="text-align:center;margin-top: 20px;">
            <button class="newbutton" id='like'>I Don't Like Any</button>
            <a href='index.php' style="display:none" id='link1'><button class="newbutton">Go To Home Page</button></a>
            <a href='index.php?redirect=true' style="display:none" id="link2"><button class="newbutton">See Different Set</button></a>
            
        </div>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>