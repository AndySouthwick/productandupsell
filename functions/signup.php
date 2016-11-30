 
 <?php
include'var/connectvar.php';
?>
<?

  // Connect to the database
   $dbc = mysqli_connect('localhost', 'root', 'root', 'music_app');

  if (isset($_POST['submit'])) {
 // Grab the profile data from the POST
  	$email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
    if (!empty($email) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM user WHERE u_name = '$email'";
       $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO user (u_name, p_word) VALUES ('$email', SHA('$password1'))";
        mysqli_query($dbc, $query);	
      // Confirm success with the user
        echo '
		<div class="wrap">
    		<div class="container">
		<p align="center">Your new account has been successfully created. You\'re now ready to <a href="/index.php?layout=1&page=main/">Add stuff to your cart</a>.</p>
		</div></div>';
        header('Location: ../index.php?layout=1&page=cart');
        mysqli_close($dbc);
        exit();    
      }
     else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username. Please use a different address.</p>';
        $email = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }
  mysqli_close($dbc);
  

?>
