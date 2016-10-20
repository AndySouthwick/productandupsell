<?php 
if ($layout == 1){
    
    if($page == main){
        include 'includes/inc/showproducts.inc.php';
        $title = "Buy Music";
       
    }
    if($page == cart){
        include 'includes/inc/cart.inc.php';
        $title = "Check Out";
    }
    if($page == thankyou){
        include 'includes/inc/thankyou.inc.php';
        $title = "Thank you";
    }
    if($page == addproduct){
        include 'includes/inc/upsell.inc.php';
        $title = "Add This To Your Purchase!";
    }
}
?>