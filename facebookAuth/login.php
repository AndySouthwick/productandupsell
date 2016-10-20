<html>
<?PHP 

$fb = new Facebook\Facebook([
  'app_id' => '301809946872520',
  'app_secret' => '1f5c89c3202709852f87227accb819e2',
  'default_graph_version' => 'v2.5'
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('localhost:8888/musicApp/facebookAuth/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';


?>
</html>