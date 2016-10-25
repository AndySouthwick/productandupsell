<?function show_user_product(){
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
      echo '<a href="http://localhost:8888/musicApp/index.php?layout=1&page=cart&product=' .$product_id. '&add='.$upsell.' "  class="btn btn-primary btn-lg dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="false">
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
    $upsell = $row['upsell_data']; 
    
        if ($page == cart){
        echo '<a href="http://localhost:8888/musicApp/index.php?layout=1&page=cart" align="right">Remove</a>'; 
        }
    echo'</div></div></div>';
 };
        }else{
        if ($page == cart){ echo 'There aren\'t any products in your cart';}
        }


mysqli_close($dbc);




};


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
        
}
    
};

?>