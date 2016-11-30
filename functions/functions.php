<?
//function to show the products that are in the database
function show_user_product(){
$product = $_GET['product'];
$page = $_GET['page'];
$u_id = $_SESSION['u_id'];
$dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
or die('Error connecting to MySQL server.');
if($page == thankyou or $page == cart ){$query = "SELECT unique_id, product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products WHERE unique_id = '$product'";
}
if($page == main){$query = "SELECT unique_id, product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products";
}
$data = mysqli_query($dbc, $query);
if ($page == main){
     while($row = $data->fetch_array()) {
    // The user row was found so display the user data
    echo '<div class="col-md-3"><div class="panel panel-default">
  <div class="panel-body" align="center">';
    echo '<img src=' . $row['product_img'] . ' width="100%"><br/>';
    echo '' . $row['product_name'] . '<br/>';
    echo ' $' . $row['product_price'] . '<br/>';
    echo '' . $row['product_desc'] . '<br/>';
    echo '' . $row['product_category'] . '<br/>';
      $product_id =  $row['unique_id'];
      $upsell = $row['upsell_data']; 
    if (!isset($_SESSION['u_id'])) {
      echo $_SESSION['u_id'];
    echo '<button class="btn btn-primary btn-lg dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false"data-toggle="modal" data-target="#signInModal">
    Add To Cart <span class="glyphicon glyphicon-music"></span>
  </button>'; }else{
      echo '<a href="/index.php?layout=1&page=cart&product=' .$product_id. '&add='.$upsell.' "  class="btn btn-primary btn-lg dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
    Add To Cart <span class="glyphicon glyphicon-music"></span> </a>';
    }
    echo'</div></div></div>';
    };
} 
if (isset ($product)) {
while($row = $data->fetch_array()) {
    // The  row was found so display the  data
    echo'<div class="col-md-9"><div class="panel panel-default"><div class="panel-body" align="center">';
    echo $_SESSION['u_id'];
    echo '<img src=' . $row['product_img'] . ' width="100%">'; 
    echo '' . $row['product_name'] . ' ';
    echo ' $' . $row['product_price'] . ' ';
    echo '' . $row['product_desc'] . ' ';
    echo '' . $row['product_category'] . ' ';
   $product_id =  $row['unique_id']; 
    $product_name = $row['product_name'];
    $upsell = $row['upsell_data'];  
   $product_price =  $row['product_price'];  
        if ($page == cart){
        echo '<a href="/index.php?layout=1&page=cart" align="right">Remove</a>'; 
        }
    echo'</div></div></div>';
 };
        }else{
        if ($page == cart){ echo 'There aren\'t any products in your cart';}
        }
mysqli_close($dbc);



}
function ccAuth(){
$error = $_GET['error'];
if ($error == 1){
  echo 'Insuficient Funds';
};
if ($error == 2){
  echo 'payement not accepted';
};
}
//function for upsell
function upsell(){
$upsell =$_GET['add'];
$dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
or die('Error connecting to MySQL server.');
$query = "SELECT product_name, product_desc, product_img FROM my_products WHERE unique_id = '$upsell'";
$data = mysqli_query($dbc, $query);

while($row = $data->fetch_array()) {
    $productname = $row['product_name'];
    $image = $row['product_img'];
    $desc = $row['product_desc'];
    
         echo' <h4 class="modal-title">'.$productname.'</h4>
        </div>
        <div class="modal-body">
        '.$image.'
          <p>'.$desc.'</p>
          <p>Would you like to add this for $3 more?</p>
        </div>';
        mysqli_close($dbc);
}};

//function for final purchase
function final_purchase(){
  
  $product = $_GET['product'];
$dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
or die('Error connecting to MySQL server.');
$query = "SELECT unique_id, product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products WHERE unique_id = '$product'";
$data = mysqli_query($dbc, $query);
while($row = $data->fetch_array()) {
    // The  row was found so display the  data
   
    $product_id =  $row['unique_id']; 
    $product_name = $row['product_name'];
    $upsell = $row['upsell_data'];  
   $product_price =  $row['product_price'];       
       


 $shipping = 2;
         echo '<div class="col-md-3"><div class="panel panel-default"><div class="panel-body" align="center">';
  $final_price =  $product_price;
  $tax = $final_price * .0687;
$final_price_with_tax = $tax + $final_price;
$finalpircetaxandship = $final_price_with_tax + $shipping;
  echo $product_name. ' $' .$product_price.'<br/>';
  echo 'Price: $'.$final_price. '<br/>';
   echo 'Price With Tax: $'.$final_price_with_tax. '<br/>';
    echo 'Price With Tax and Shipping: $' .$finalpircetaxandship. '<br/>';
  
  echo'Thank you for your order';
 echo'</div></div></div>';

   

}
};

//function for thank you page showing final purchase
function final_purchase_upsell(){
  $upsell =$_GET['upsell'];
  $product = $_GET['product'];
$dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
or die('Error connecting to MySQL server.');
$query = "SELECT unique_id, product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products WHERE unique_id = '$product'";
$data = mysqli_query($dbc, $query);
while($row = $data->fetch_array()) {
    // The  row was found so display the  data
    echo'<div class="col-md-9"><div class="panel panel-default"><div class="panel-body" align="center">';
    echo $_SESSION['u_id'];
    echo '<img src=' . $row['product_img'] . ' width="100%">'; 
    echo '' . $row['product_name'] . ' ';
    echo ' $' . $row['product_price'] . ' ';
    echo '' . $row['product_desc'] . ' ';
    echo '' . $row['product_category'] . ' ';
    $product_id =  $row['unique_id']; 
    $product_name = $row['product_name'];
    $upsell = $row['upsell_data'];  
   $product_price =  $row['product_price']; 
      
       echo'</div></div></div>';


       $upsold = 3;
 $shipping = 2;
 
$query = "SELECT unique_id, product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products WHERE unique_id = '$upsell'";
$data = mysqli_query($dbc, $query);
while($row = $data->fetch_array()) {
    // The  row was found so display the  data
    echo'<div class="col-md-9"><div class="panel panel-default"><div class="panel-body" align="center">';
    echo $_SESSION['u_id'];
    echo '<img src=' . $row['product_img'] . ' width="100%">'; 
    echo '' . $row['product_name'] . ' ';
    echo '$'; 
    echo $upsold;
    echo '' . $row['product_desc'] . ' ';
    echo '' . $row['product_category'] . ' ';
    $product2_name = $row['product_name'];
    $product_id =  $row['unique_id'];  
    $upsell = $row['upsell_data'];  
      
       echo'</div></div></div>';

         echo '<div class="col-md-3"><div class="panel panel-default"><div class="panel-body" align="center">';
  $final_price = $upsold + $product_price;
  $tax = $final_price * .0687;
$final_price_with_tax = $tax + $final_price;
$finalpircetaxandship = $final_price_with_tax + $shipping;
  echo $product_name. ' $' .$product_price.'<br/>';
  echo $product2_name. ' $' .$upsold. '<br/>';
  echo 'Price: $'.$final_price. '<br/>';
   echo 'Price With Tax: $'.$final_price_with_tax. '<br/>';
    echo 'Price With Tax and Shipping: $' .$finalpircetaxandship. '<br/>';
  
  echo'Thank you for your order';
 echo'</div></div></div>';

   
}
}
};







// $query1 = "SELECT product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products WHERE unique_id = '$upsell'";
// $query2 = "SELECT product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products WHERE unique_id = '$product'";
// $data = mysqli_query($dbc, $query);
// $data2 = mysqli_query($dbc, $query2);

// while($row = $data->fetch_array()) {
//   // The  row was found so display the  data
//     echo'<div class="col-md-9"><div class="panel panel-default"><div class="panel-body" align="center">';
//     echo $_SESSION['u_id'];
//     echo '<img src=' . $row['product_img'] . ' width="100%">'; 
//     echo '' . $row['product_name'] . ' ';
//     echo ' $' . $row['product_price'] . ' ';
//     echo '' . $row['product_desc'] . ' ';
//     echo '' . $row['product_category'] . ' ';
//     $product_id =  $row['unique_id'];  
//     $upsell = $row['upsell_data'];  
// }
// while($row = $data2->fetch_array()) {
//   // The  row was found so display the  data
//     echo'<div class="col-md-9"><div class="panel panel-default"><div class="panel-body" align="center">';
//     echo $_SESSION['u_id'];
//     echo '<img src=' . $row['product_img'] . ' width="100%">'; 
//     echo '' . $row['product_name'] . ' ';
//     echo ' $' . $row['product_price'] . ' ';
//     echo '' . $row['product_desc'] . ' ';
//     echo '' . $row['product_category'] . ' ';
//     $product_id =  $row['unique_id'];  
//     $upsell = $row['upsell_data'];  
// }
  


?>