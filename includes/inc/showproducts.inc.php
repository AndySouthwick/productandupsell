
<?php 
session_start();
$dbc = mysqli_connect('localhost', 'root', 'root', 'music_app')
or die('Error connecting to MySQL server.');
$query = "SELECT unique_id, product_name, product_price, product_desc, upsell_data, product_img, product_category FROM my_products";
$data = mysqli_query($dbc, $query);
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
    if (!isset($_SESSION['u_id'])) {

    echo '<button class="btn btn-primary btn-lg dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false"data-toggle="modal" data-target="#signInModal">
    Add To Cart <span class="glyphicon glyphicon-music"></span>
  </button>';
   
   
    }else{
      echo '<a href="http://localhost:8888/musicApp/index.php?layout=1&page=cart&product=' .$product_id. ' "  class="btn btn-primary btn-lg dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
    Add To Cart <span class="glyphicon glyphicon-music"></span> </a>';
    }
    echo'</div></div></div>';
 };


 ?>

<? include 'includes/modalview.php'; ?>