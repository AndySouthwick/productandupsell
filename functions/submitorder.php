<?php 

session_start();
$upsell = $_POST['upsell'];
$product = $_POST['product'];
header('Location: http://localhost:8888/musicApp/index.php?layout=1&page=thankyou&product='.$product.'&add='.$upsell.'');
$f_name = $_POST['first_name'];
$l_name = $_POST['last_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$cc = $_POST['cc'];
$expires = $_POST['expires'];
$cvc = $_POST['cvc'];
$product = $_POST['product'];
$u_id = $_SESSION['u_id'];
$upsell_purchased = $_POST['yes'];
$dbc = mysqli_connect('localhost', 'root', 'root', 'music_app') or die('Error connecting to MySQL server.');
if (isset($_POST['submit'])) {
    $query = "UPDATE user SET first_name = '$f_name', last_name = '$l_name',  
    phone = '$phone', address_1 = '$address', address_2 = 'NULL', city = '$city',
    state = '$state', zip ='$zip', cc = '$cc', expires = '$expires', cvc = '$cvc' 
    WHERE u_id = '$u_id'";
    mysqli_query($dbc, $query) or die('Error querying database.');
    $query2 = "INSERT INTO user_orders (u_id, product_key) VALUES ('$u_id', '$product')";
     mysqli_query($dbc, $query2) or die('Error querying database 2 .'); 

}

if (isset ($_POST['submit2'])){
header('Location: http://localhost:8888/musicApp/index.php?layout=1&page=thankyou&product='.$product.'&add=');

$query = "UPDATE user_orders SET  upsell_purchased = '$upsell_purchased' WHERE u_id = '$u_id'";
mysqli_query($dbc, $query) or die('Error querying database.');
mysqli_close($dbc);
echo $upsell_purchased;

}
?>

