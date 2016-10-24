<?php 
session_start();
echo '<div class="col-md-9"><div class="panel panel-default"><div class="panel-body">';
if (isset ($product)) {
$dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
or die('Error connecting to MySQL server.');
$query = "SELECT unique_id, product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products WHERE unique_id = '$product'";
$data = mysqli_query($dbc, $query);
 while($row = $data->fetch_array()) {
    // The  row was found so display the  data
    
  echo $_SESSION['u_id'];
    echo '<img src=' . $row['product_img'] . ' width="100%">'; 
    echo '' . $row['product_name'] . ' ';
    echo ' $' . $row['product_price'] . ' ';
    echo '' . $row['product_desc'] . ' ';
    echo '' . $row['product_category'] . ' ';
    $product_id =  $row['unique_id'];
    echo '<a href="http://localhost:8888/musicApp/index.php?layout=1&page=cart" align="right">Remove</a>';
   
 };
}else{
 echo 'There aren\'t any products in your cart';
}
 echo'</div></div></div>';
mysqli_close($dbc);
 ?>
  <div class="col-md-3"> 
     <div class="panel panel-default">
        <div class="panel-body">
            <form method="post" action="functions/submitorder.php">
                <input type="hidden" name="product" value="<?PHP echo $product;?>">
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
</div></div></div>