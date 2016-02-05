<?php
$apnsHost = 'gateway.sandbox.push.apple.com';




//$apnsHost = 'gateway.push.apple.com';

$apnsCert = 'myechne.pem';

//$apnsCert = 'Taxiprod.pem';

$apnsPort = 2195;

// $token = 'd0718529f2aa466995ee0c41df86b134';

$token = '820ceca3ce071831648f19eaaadecd68a0090f9c94aa8b85a1f04a106233d472';

$streamContext = stream_context_create();

stream_context_set_option($streamContext, 'ssl', 'local_cert', $apnsCert);



$apns = stream_socket_client('ssl://' . $apnsHost . ':' . $apnsPort, $error, $errorString, 2, STREAM_CLIENT_CONNECT, $streamContext);

if (!$apns)

	exit("Failed to connect: $error $errorString" . PHP_EOL);



echo 'Connected to APNS' . PHP_EOL;


$payload['aps'] = array('alert' => 'for badge count!', 'badge' => 4, 'sound' => 'default');
$payload['payload'] = array('type' => "calldis");
$output = json_encode($payload);

$token = pack('H*', str_replace(' ', '', $token));

$apnsMessage = chr(0) . chr(0) . chr(32) . $token . chr(0) . chr(strlen($output)) . $output;

fwrite($apns, $apnsMessage);



//socket_close($apns);

fclose($apns);


// // ccd7e5387402f08613b95ea538b12590125278d272f28b999bdd3e9b362431bb
// // 62362b8a4bf00f421fb25f40fade50dffe51b069a200fbe89c38baa6a1e1b79c
// // a66b7ba0966a9c8b090dbdf8a18137c87dd86feb5d4ae9dfa6771e4f37266ff5

// // sendNotificationIOS('a66b7ba0966a9c8b090dbdf8a18137c87dd86feb5d4ae9dfa6771e4f37266ff5', 'Anjali has shared your photo', 'Dev');

// function sendNotificationIOS($token='a66b7ba0966a9c8b090dbdf8a18137c87dd86feb5d4ae9dfa6771e4f37266ff5', $message, $mode = 'Dev') {

// //echo "hiiiiiiii";
// 	if(strtolower($mode) == 'dev') {
// 		   //echo "hello";
// 		$apnsHost = 'gateway.sandbox.push.apple.com';
// 		$apnsCert = 'myechne.pem';
// 	} else if(strtolower($mode) == 'prod') {
// 		$apnsHost = 'gateway.push.apple.com';
// 		$apnsCert = 'Yadox_prod_Certificates.pem';
// 	}
	
// 	//$apnsCert = 'apns-dev-cert.pem';


// 	//$apnsHost = 'gateway.push.apple.com';

// 	$apnsPort = 2195;

// 	$streamContext = stream_context_create();

// 	stream_context_set_option($streamContext, 'ssl', 'local_cert', $apnsCert);



// 	$apns = stream_socket_client('ssl://' . $apnsHost . ':' . $apnsPort, $error, $errorString, 2, STREAM_CLIENT_CONNECT, $streamContext);

// 	if (!$apns)

// 		exit(0);



// 	// echo 'Connected to APNS and token: '. $token . PHP_EOL;


// 	$payload['aps'] = array('alert' => $message, 'badge' => 1, 'sound' => 'default');
// 	$payload['count'] = 3;

// 	$output = json_encode($payload);

// 	$token = pack('H*', str_replace(' ', '', $token));

// 	$apnsMessage = chr(0) . chr(0) . chr(32) . $token . chr(0) . chr(strlen($output)) . $output;

// 	fwrite($apns, $apnsMessage);


// 	fclose($apns);
// }


?>

