<?php
//set_time_limit(0);
//ini_set('default_socket_timeout', 300);
//session_start();
//Configure the below lines
define('ClientID', 	    '808a4481a80a4f9da83d3596d9e90a53');
define('ClientSecret',	'a997b61ab50847278170344873ddcb3b');
define('RedirectURI', 	'http://localhost/newdata/');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instagram API Example</title>
</head>

<body>
<?php 
if(!empty($_GET['code'])){
	$code = $_GET['code'];
	$url = "https://api.instagram.com/oauth/access_token";
	$access_token_settings = array(
			'client_id'                =>     ClientID,
			'client_secret'            =>     ClientSecret,
			'grant_type'               =>     'authorization_code',
			'redirect_uri'             =>     RedirectURI,
			'code'                     =>     $code
	);
	$curl = curl_init($url); 
	curl_setopt($curl,CURLOPT_POST,true);
	curl_setopt($curl,CURLOPT_POSTFIELDS,$access_token_settings);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
	$result = curl_exec($curl);
	curl_close($curl);
	$results = json_decode($result,true);
	echo "<pre/>";
	print_r($results);
	//The results
	//$profilePicture = $results['user']['profile_picture'];
	//$name = $results['user']['full_name'];
	//$username = $results['user']['username'];
	//echo '<img src="'.$profilePicture.'"/><br/>
	//Name: '.$name.' <br/> 
	//Username: '.$username.'';
}
else
{
	echo "failed";
	?>
<a href="https://api.instagram.com/oauth/authorize/?client_id=<?php echo ClientID;?>&redirect_uri=<?php echo RedirectURI;?>&response_type=code">Login With Instagram</a>
<?php
}
?>
</body>
</html>