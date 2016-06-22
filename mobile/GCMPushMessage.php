<?php
/*
	Class to send push notifications using Google Cloud Messaging for Android

	Example usage
	-----------------------
	$an = new GCMPushMessage($apiKey);
	$an->setDevices($devices);
	$response = $an->send($message);
	-----------------------
	
	$apiKey Your GCM api key
	$devices An array or string of registered device tokens
	$message The mesasge you want to push out

	@author Matt Grundy

	Adapted from the code available at:
	http://stackoverflow.com/questions/11242743/gcm-with-php-google-cloud-messaging

*/

/*
$run = $_REQUEST['run'];
if($run = 'yes') {
	
	$title = $_REQUEST['title'];
	$message = $_REQUEST['message'];
	$gcpm = new GCMPushMessage('AIzaSyDzzlyUvXVeIwVZLF7_J5G0wtg_5b_5Sgs');
	$gcpm->setDevices('cKjmEthLJ6U:APA91bGRevB1L0yu6Wx14wNFaFIyJr7qCrsn_n9oRtHKLqeeZ3jOxNoA_A2q_FkR4TMpO02UmeFIffgIi80hbvogin0vM93IfN8ZyijofQyshc-rMjFIeaJ0E2ChmZYGdpFcvGRPObu2');
	$message = 'test';
	$response = $gcpm->send($message, array('title' => $title));
	echo 'success,'.$title.','.$message;
	
} else {
	echo 'fails';
}
*/


class GCMPushMessage {

	var $url = 'https://android.googleapis.com/gcm/send';
	var $serverApiKey = "";
	var $devices = array();
	
	/*
		Constructor
		@param $apiKeyIn the server API key
	*/
	function GCMPushMessage($apiKeyIn){
		$this->serverApiKey = $apiKeyIn;
	}

	/*
		Set the devices to send to
		@param $deviceIds array of device tokens to send to
	*/
	function setDevices($deviceIds){
	
		if(is_array($deviceIds)){
			$this->devices = $deviceIds;
		} else {
			$this->devices = array($deviceIds);
		}
	
	}

	/*
		Send the message to the device
		@param $message The message to send
		@param $data Array of data to accompany the message
	*/
	function send($message, $data = false){
		
		if(!is_array($this->devices) || count($this->devices) == 0){
			$this->error("No devices set");
		}
		
		if(strlen($this->serverApiKey) < 8){
			$this->error("Server API Key not set");
		}
		
		$fields = array(
			'registration_ids'  => $this->devices,
			'data'              => array( "message" => $message ),
		);
		
		if(is_array($data)){
			foreach ($data as $key => $value) {
				$fields['data'][$key] = $value;
			}
		}

		$headers = array( 
			'Authorization: key=' . $this->serverApiKey,
			'Content-Type: application/json'
		);

		// Open connection
		$ch = curl_init();
		
		// Set the url, number of POST vars, POST data
		curl_setopt( $ch, CURLOPT_URL, $this->url );
		
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
		
		// Avoids problem with https certificate
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
		
		// Execute post
		$result = curl_exec($ch);
		
		// Close connection
		curl_close($ch);
		
		return $result;
	}
	
	function error($msg){
		echo "Android send notification failed with error:";
		echo "\t" . $msg;
		exit(1);
	}
}
