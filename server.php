<?php 
ini_set('soap.wsdl_cache_enabled', false);
/** // debugging functions 
echo "<pre>";
print_r(getColors());
print_r(getNames()); 
echo "</pre>";
**/

/**
 * getColors will return all colors in the array when called
 *
 * @param string $which
 * @return array
 */
function getColors($which = null){
	// Process to get real data, for this example
	// it is just a static array
	$colors = array(
		'responseMsg' 	=> setResponse(), 
		'allColors' 	=> array('blue', 'green', 'black', 'white', 'yellow', 'red', 'beige')
	); 
	
	return $colors; 
}

/**
 * getNames will return a list of names, divided by boys and girls 
 * depending on what is passed to it, default is all names
 *
 * @param string $set
 * @return array
 */
function getNames($set = null){
	// Process to get real data, for this example
	// it is just a set array to return the names based on input
	$names = array(
		'boys' => array('stephen', 'dave', 'ryan', 'brian', 'chris', 'tom'),
		'girls' => array('elise', 'sheri', 'kim', 'marci', 'megan')
	);
	
	$final['responseMsg'] = setResponse();
	
	switch ($set) {
		case 'boys': 
			$final['nameList']['boys'] = $names['boys'];
			// $final['name_list']['girls'] = array();
			break;
		case 'girls':
			$final['nameList']['girls'] = $names['girls'];
			// $final['name_list']['boys'] = array();
			break;
		default:
			$final['nameList'] = $names; 
			break;
	}
	
	return $final; 
	
}

/**
 * setResponse sets the reszponse header to display a success or fail message
 *
 * @return array
 */
function setResponse(){
	// Set the response message header
	// This example just sets a basic header response but you may need to 
	// add some more checks, authentication, etc 
	$header = array(
		'status'	=> 'ok',
		'message'	=> 'Service call was successful'
	);
	
	return $header; 
}
 
 
// Set up the PHP SOAP server
$server = new SoapServer("http://www.hirdweb.com/soap/hirdweb.wsdl");
// Add the exposable functions
$server->addFunction("getColors");
$server->addFunction("getNames");
// Handle the request 
$server->handle();

?>
