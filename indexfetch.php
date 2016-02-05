<?php

	session_start();
	require_once('twitteroauth.php');
	require_once('config.php');

	if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
	    echo "nononono";
	}
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$content = $connection->get('account/verify_credentials');
	$twitteruser = $content->{'screen_name'};
	$notweets = 5;
	$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
	echo $content->{'name'}.'^^^^'.$content->{'screen_name'}.'^^^^'.$content->{'profile_image_url'}.'^^^^'.$content->{'id'};
	


?>
