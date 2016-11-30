<?php 

session_start();
$upsell = $_POST['upsell'];
$product = $_POST['product'];

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
$order_id = $_POST['order_id'];

$dbc = mysqli_connect('localhost', 'root', 'root', 'music_app') or die('Error connecting to MySQL server.');
if (isset($_POST['submit'])) {

    if ($cc == 4111111111111111){
        $day = jddayofweek ( cal_to_jd(CAL_GREGORIAN, date("m"),date("d"), date("Y")) , 1 ); 
        $query = "UPDATE user SET first_name = '$f_name', last_name = '$l_name',  
        phone = '$phone', address_1 = '$address', address_2 = 'NULL', city = '$city',
        state = '$state', zip ='$zip', cc = '$cc', expires = '$expires', cvc = '$cvc' 
        WHERE u_id = '$u_id'";
         $time = date('Y-m-d H:i:s', gmdate('U')); // 13:50:29
        mysqli_query($dbc, $query) or die('Error querying database.');


        $query2 = "INSERT INTO user_orders (u_id, product_key, day) VALUES ('$u_id', '$product', '$day')";
        mysqli_query($dbc, $query2) or die('Error querying database 2 .'); 


        $query3 = "SELECT LAST_INSERT_ID() AS unique_id";
         $data = mysqli_query($dbc, $query3) or die('Error querying database 3.'); 

         while($row = $data->fetch_array()) {
             $order_id = $row['unique_id'];
             header('Location: ../index.php?layout=1&page=thankyou&product='.$product.'&add='.$upsell.'&order_id='.$order_id.'');
         }
        
        // $order_id = SCOPE_IDENTITY();
        // echo $order_id;
     
        
        
    } else if($cc == 4012888888881881){
        
        header('Location: ../index.php?layout=1&page=cart&product='.$product.'&add='.$upsell.'&error=1');
        return '';
    } else if ($cc != 4111111111111111 or $cc != 4012888888881881){
         header('Location: ../index.php?layout=1&page=cart&product='.$product.'&add='.$upsell.'&error=2');
        return "";
    }
}
if (isset ($_POST['submit2'])){

    
header('Location: ../index.php?layout=1&page=thankyou&product='.$product.'&upsell='.$upsell.'&order_id='.$order_id.'');

$query = "UPDATE user_orders SET  upsell_purchased = '$upsell' WHERE unique_id = '$order_id'";
mysqli_query($dbc, $query) or die('Error querying database.');
mysqli_close($dbc);



}

?>

