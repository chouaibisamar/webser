<?php
require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$guest= " Web";
	$ax = "http://www.dneonline.com/calculator.asmx";
		if(!$error){
			//create client object
			$client = new nusoap_client($ax, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				 // Call the SOAP method
				$result = $client->call('SayHello', array($guest));
				// Display the result
				echo "<h2>Result<h2/>";
				print_r($result);
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	

// Display the request and response (SOAP messages)
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
// Display the debug messages
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';

?>