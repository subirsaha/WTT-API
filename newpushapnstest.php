<?php
$apnsHost = 'gateway.sandbox.push.apple.com';

//$apnsHost = 'gateway.push.apple.com';

$apnsCert = 'fitnessDev.pem';

//$apnsCert = 'Taxiprod.pem';

$apnsPort = 2195;

// $token = 'd0718529f2aa466995ee0c41df86b134';

$token = '67516409d73141a1a413d39712fad009446c3aeb9a6a92b2181e26154889d38f';

$streamContext = stream_context_create();

stream_context_set_option($streamContext, 'ssl', 'local_cert', $apnsCert);



$apns = stream_socket_client('ssl://' . $apnsHost . ':' . $apnsPort, $error, $errorString, 2, STREAM_CLIENT_CONNECT, $streamContext);

if (!$apns)

	exit("Failed to connect: $error $errorString" . PHP_EOL);



echo 'Connected to APNS' . PHP_EOL;


$payload['aps'] = array('alert' => 'for badge count socket_set_nonblock', 'badge' => 1, 'sound' => 'default');
$payload['payload'] = array('type' => "calldis");
$output = json_encode($payload);

$token = pack('H*', str_replace(' ', '', $token));

$apnsMessage = chr(0) . chr(0) . chr(32) . $token . chr(0) . chr(strlen($output)) . $output;

fwrite($apns, $apnsMessage);



//socket_close($apns);

fclose($apns);

?>