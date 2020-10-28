<?php

 require_once('lib/nusoap.php'); 
 // Create the server instance
 $server = new nusoap_server();

// Define the method as a PHP function
function SayHello($name){
 $hi = "Hi ".$name;
 return $hi;
}
// Initialize WSDL support
$server->configureWSDL('myname', 'http://www.mynamespace.com');

// Register the method to expose
      $server->register('SayHello',
			array('name' => 'xsd:string'),  //parameter
			array('hi' => 'xsd:string'),  //output
			'http://www.mynamespace.com',   //namespace
      'http://www.mynamespace.com#SayHello' //soapaction           // documentation

      ); 

// Use the request to (try to) invoke the service
$server->service(file_get_contents("php://input"));
?>
