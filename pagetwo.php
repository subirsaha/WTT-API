
<?php
session_start();
require_once('config.php');
echo CONSUMER_KEY."###".CONSUMER_SECRET."###".OAUTH_CALLBACK."###".$_SESSION['testvar'];

?>