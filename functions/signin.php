<?php // mofiy script to start tracking product
 header('Location: http://localhost:8888/musicApp/index.php?layout=1&page=main');

include'var/connectvar.php'; ?>
<? 
 session_start();
if (!isset($_SESSION['u_id'])) {
			if (isset($_POST['submit'])) {
		 // Connect to the database
   $dbc = mysqli_connect('localhost', 'root', 'root', 'music_app');
		 // Grab the user-entered log-in data
		 $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		 $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	 if (!empty($username) && !empty($password)) {
		// Look up the username and password in the database
		$query = "SELECT u_id  FROM user WHERE u_name = '$username' AND p_word = SHA('$password')";
		$data = mysqli_query($dbc, $query);
		if (mysqli_num_rows($data) == 1) {
		 // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
		 $row = mysqli_fetch_array($data);
		 $_SESSION['u_id'] = $row['u_id'];
		 $_SESSION['username'] = $row['u_name'];
		 setcookie('u_id', $row['u_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
		 setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
		echo $_SESSION['u_id'];
	}else {
		 // The username/password are incorrect so set an error message
		 $error_msg = 'Sorry, you must enter a valid username and password to log in';
		}
		 }
		 else {
		// The username/password weren't entered so set an error message
		$error_msg = 'Sorry, you must enter your username and password to log in.';	
		 }
		}
		 // Insert the page header
		 $page_title = 'Log In';
		 // If the session var is empty, show any error message and the log-in form; otherwise confirm the log-in
		 if (empty($_SESSION['u_id'])) {
		echo '<p class="error">' . $error_msg . '</p>';}
		
	}
?>