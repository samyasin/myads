<?php require_once 'items.php'; ?>
<?php 
// UM 
if(isset($_GET['redirect'])){
    $userId = $_SESSION['user_id'];
    $userModel = new user();
    $userSet = $userModel->fetchById($userId);
    $userSet = $userSet[0];
    $gender = $userSet['gender'];
    $catRecomended = array();    
    // Generic Select Function
        function productWeight($category,$limit){
            global $itemModel;
            $sql = "SELECT * FROM products WHERE category = '$category' ORDER BY RAND() LIMIT $limit";
            return $itemModel->fetchBySql($sql);
        }
    // remove unnecassary category according to gender    
    if($gender == 1){
       // male Check
        // calculate Euclidian distance                
        $electronics = sqrt(pow(10 - $userSet['electronics_intrest'],2));
        $furniture   = sqrt(pow(10 - $userSet['furniture_intrest'],2));
        $beauty      = sqrt(pow(10 - $userSet['beauty_intrest'],2));
        $toys        = sqrt(pow(10 - $userSet['toys_intrest'],2));
        $men         = sqrt(pow(10 - $userSet['men_intrest'],2));        
        // generate Recomendation Category Arrays 
        if($electronics >=0 && $electronics <=5){
            $catRecomended['electronics'] = $electronics;
        }
        if($furniture >=0 && $furniture <=5){
            $catRecomended['furniture'] = $furniture;
            
        }
        if($beauty >=0 && $beauty <=5){
            $catRecomended['beauty'] = $beauty;
        }
        if($toys >=0 && $toys <=5){
            $catRecomended['toys'] = $toys;
        }
        if($men >=0 && $men <=5){
            $catRecomended['men'] = $men;
        }       
        // calculate product weight & apperance frequency       
        asort($catRecomended);        
        $catCount = count($catRecomended);
        if($catCount == 5){
            $electSet  = productWeight('electronics', 1);
            $furnSet   = productWeight('furniture', 1);
            $beautySet = productWeight('beauty', 1);
            $toysSet   = productWeight('toys', 1);
            $menSet    = productWeight('men', 1);
            $calcultedProducts = array_merge($electSet,$furnSet,$beautySet,$toysSet,$menSet);
        }elseif ($catCount == 4) {
            // find the Strongest Category
            $forthOption = array_keys($catRecomended);           
            $setOne   = productWeight($forthOption[0], 3);
            $setTwo   = productWeight($forthOption[1], 1);
            $setThree = productWeight($forthOption[2], 1);
            $setFour  = productWeight($forthOption[3], 1);
            $calcultedProducts = array_merge($setOne,$setTwo,$setThree,$setFour);            
        }elseif ($catCount == 3) {
            // find the Strongest Category
            $threeOption = array_keys($catRecomended);           
            $setOne   = productWeight($threeOption[0], 3);
            $setTwo   = productWeight($threeOption[1], 2);
            $setThree = productWeight($threeOption[2], 1);            
            $calcultedProducts = array_merge($setOne,$setTwo,$setThree);            
        }elseif ($catCount == 2) {
            // find the Strongest Category
            $twoOption = array_keys($catRecomended);           
            $setOne   = productWeight($twoOption[0], 3);
            $setTwo   = productWeight($twoOption[1], 3);                        
            $calcultedProducts = array_merge($setOne,$setTwo);                        
        }elseif ($catCount == 1) {
            $firstOption = array_keys($catRecomended);           
            $setOne   = productWeight($firstOption[0], 6);
            $calcultedProducts = $setOne;            
        }
    }else{
      //female Check 
      // calculate Euclidian distance                
        $electronics = sqrt(pow(10 - $userSet['electronics_intrest'],2));
        $furniture   = sqrt(pow(10 - $userSet['furniture_intrest'],2));
        $beauty      = sqrt(pow(10 - $userSet['beauty_intrest'],2));
        $toys        = sqrt(pow(10 - $userSet['toys_intrest'],2));
        $woman       = sqrt(pow(10 - $userSet['woman_intrest'],2));
        
        // generate Recomendation Category Arrays 
        if($electronics >=0 && $electronics <=5){
            $catRecomended['electronics'] = $electronics;
        }
        if($furniture >=0 && $furniture <=5){
            $catRecomended['furniture'] = $furniture;
        }
        if($beauty >=0 && $beauty <=5){
            $catRecomended['beauty'] = $beauty;
        }
        if($toys >=0 && $toys <=5){
            $catRecomended['toys'] = $toys;
        }
        if($woman >=0 && $woman <=5){
            $catRecomended['woman'] = $woman;
        }
        
        // calculate product weight & apperance frequency       
        asort($catRecomended);        
        $catCount = count($catRecomended);
        if($catCount == 5){
            $electSet  = productWeight('electronics', 1);
            $furnSet   = productWeight('furniture', 1);
            $beautySet = productWeight('beauty', 1);
            $toysSet   = productWeight('toys', 1);
            $womanSet  = productWeight('woman', 1);
            $calcultedProducts = array_merge($electSet,$furnSet,$beautySet,$toysSet,$womanSet);
        }elseif ($catCount == 4) {
            // find the Strongest Category
            $forthOption = array_keys($catRecomended);           
            $setOne   = productWeight($forthOption[0], 3);
            $setTwo   = productWeight($forthOption[1], 1);
            $setThree = productWeight($forthOption[2], 1);
            $setFour  = productWeight($forthOption[3], 1);
            $calcultedProducts = array_merge($setOne,$setTwo,$setThree,$setFour);            
        }elseif ($catCount == 3) {
            // find the Strongest Category
            $threeOption = array_keys($catRecomended);           
            $setOne   = productWeight($threeOption[0], 3);
            $setTwo   = productWeight($threeOption[1], 2);
            $setThree = productWeight($threeOption[2], 1);            
            $calcultedProducts = array_merge($setOne,$setTwo,$setThree);            
        }elseif ($catCount == 2) {
            // find the Strongest Category
            $twoOption = array_keys($catRecomended);           
            $setOne   = productWeight($twoOption[0], 3);
            $setTwo   = productWeight($twoOption[1], 3);                        
            $calcultedProducts = array_merge($setOne,$setTwo);                        
        }elseif ($catCount == 1) {
            $firstOption = array_keys($catRecomended);           
            $setOne   = productWeight($firstOption[0], 6);
            $calcultedProducts = $setOne;            
        }
    }   
}