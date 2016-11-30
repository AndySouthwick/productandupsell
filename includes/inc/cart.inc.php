<?php 
session_start();
show_user_product();
$upsell =$_GET['add'];
?>
  <div class="col-md-3"> 
     <div class="panel panel-default">
        <div class="panel-body">
            <form method="post" action="functions/submitorder.php">
                <input type="hidden" name="product" value="<?PHP echo $product;?>">
                <input type="hidden" name="upsell" value="<?PHP echo $upsell;?>">
                First Name<input type="text" id="First Name" name="first_name" class="form-control" placeholder="First Name" required/>     
                Last Name<input type="text" id="username" name="last_name" class="form-control" placeholder="Email" required/>    
                phone <input type="text" id="phone" name="phone" class="form-control" placeholder="Address 1" required/>
                Address <input type="text" id="Address 1" name="address" class="form-control" placeholder="Address 1" required/>
                City <input type="text" id="City" name="city" class="form-control" placeholder="City" required/>
                State <input type="text" id="State" name="state" class="form-control" placeholder="State" required/>
                zip <input type="text" id="zip" name="zip" class="form-control" placeholder="zip" required/>
                Credit Card #<input type="text" id="Credit Card #" name="cc" class="form-control" placeholder="Credit Card #" required/>
                Expires<input type="text" id="Expires" name="expires" class="form-control" placeholder="Expiration Date" required/>
                CVC<input type="text" id="CVC" name="cvc" class="form-control" placeholder="CVC" required/>
                <input type="submit" value="Buy Now" name="submit" class="btn btn-lg btn-primary btn-block" />
            </form>
           <div class="alert alert-danger" role="alert"><?php ccAuth(); ?></div> 
</div></div></div>
