<?php require_once 'includes/items.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php
$itemModel = new product();
if (isset($_GET['cat'])) {
    $itemSet = $itemModel->fetchByCat($_GET['cat']);
} else {
    $itemSet = $itemModel->fetchAll();
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
      "Electronics",
      "Home",
      "Beaty",
      "Toys and Games",
      "Woman Clothing",
      "Men Clothing"      
    ];
    $( "#search" ).autocomplete({
      source: availableTags
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
                    <li><a href="index.php?cat=Electronics">Electronics</a></li>
                    <li><a href="index.php?cat=Home">Home</a></li>
                    <li><a href="index.php?cat=Beaty">Beauty</a></li>
                    <li><a href="index.php?cat=Toys and Games">Toys and Games </a></li>
                    <li><a href="index.php?cat=Woman Clothing">Woman Clothing </a></li>
                    <li><a href="index.php?cat=Men Clothing">Men Clothing </a></li>
                </ul>
              </div>
            </div>            
            <div class=" span_2_of_3" style="float: left">               
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