<?php 
// Set to disable caching of the wsdl file
ini_set('soap.wsdl_cache_enabled', false);

// Create the SOAP client
$client = new SoapClient("web.wsdl", array('trace' => 1));

// Show all possible functions that can be used
show($client->__getFunctions()); 

// Make a call to the getColors method and print out the results
//~ $info = $client->__soapCall("getColors", array());
//~ show($info); 

// Make a call to the getNames method and print out the results
$names = $client->__soapCall("getNames", array("set" => "all"));
show($names);                    

// please ignore it
function show($data){
    echo "<pre>";
    print_r($data); 
    echo "</pre>";
}
?>
