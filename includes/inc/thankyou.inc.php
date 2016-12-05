<?php 
session_start();
$order_id =$_GET['order_id'];
$add = $_GET['add'];
$product = $_GET['product'];
$upsell = $_GET['upsell'];

 if ($add == !NULL){
  show_user_product();
}
 if ($upsell == !NULL){
  final_purchase_upsell();
}

if ($upsell == NULL){
  final_purchase();
}

?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="container">
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
   <?
  
   if ($add == !NULL){
    
    ?>
  <div class="modal fade" id="upsellModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <? upsell(); ?>     
        <div class="modal-footer">
            <form method="post" action="functions/submitorder.php">
            <input type="hidden" name="product" value="<? echo $product; ?>">
            <input type="hidden" name="upsell" value="<? echo $add; ?>">
            <input type="hidden" name="order_id" value="<? echo $order_id; ?>">
            <input type="hidden" name="yes" value="yes">
            <button type="submit" class="btn btn-primary" name="submit2" >YES PLEASE ADD!</button>
            </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<? } 
?>


<? if ($upsell == !NULL){
add_amounts();
 }
?>




<script type="text/javascript">
$(window).load(function()
{
    $('#upsellModal').modal('show');
});
</script>