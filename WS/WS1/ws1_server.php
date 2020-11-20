<?php

 /** 
  @Description: Book Information Server Side Web Service:
  This Script creates a web service using NuSOAP php library. 
  fetchBookData function accepts ISBN and sends back book information.
 */
 require_once('dbconn1.php');
 require_once('lib/nusoap.php'); 
 $server = new nusoap_server();

 /* Method to insert a new book */
function insertDestination($destination, $country, $continent ){

  global $dbconn;
  $sql_insert = "insert into destination (destination, country, continent) values ( :destination, :country, :continent)";
  $stmt = $dbconn->prepare($sql_insert);
  // insert a row
  $result = $stmt->execute(array(':destination'=>$destination, ':country'=>$country, ':continent'=>$continent));
  if($result) {

    return json_encode(array('status'=> 200, 'msg'=> 'success'));
  }
  else {

    return json_encode(array('status'=> 400, 'msg'=> 'fail'));
  }
  
  $dbconn = null;
  }
/* Fetch 1 book data */
function fetchDestinationData($id){
	global $dbconn;
	$sql = "SELECT id, destination, country, continent FROM destination 
	        where id = :id";
  // prepare sql and bind parameters
    $stmt = $dbconn->prepare($sql);
    $stmt->bindParam(':id', $id);
    // insert a row
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return json_encode($data);
    $dbconn = null;
}
$server->configureWSDL('destinationServer', 'urn:destination');
$server->wsdl->addComplexType(
    'Destination', //complex type name
    'complexType', // type simple/complex
    'struct','all', // All-sequence
    '',
    array(
        'id' => array('name' => 'id', 'type' => 'xsd:int'),
        'destination' => array('name' => 'destination', 'type' => 'xsd:string'),
        'country' => array('name' => 'country', 'type' => 'xsd:string'),
        'continent' => array('name' => 'continent', 'type' => 'xsd:int')) //tableau des elements 
);
$server->register('fetchDestinationData',
			array('id' => 'xsd:integer'),  //parameter
			array('data' => 'xsd:Destination'),  //output
			'urn:destination',   //namespace
			'urn:destination#fetchDestinationData' //soapaction
      );  
      $server->register('insertDestination',
			array('destination' => 'xsd:string', 'country' => 'xsd:string', 'continent' => 'xsd:string'),  //parameter
			array('data' => 'xsd:string'),  //output
			'urn:destination',   //namespace
			'urn:destination#insertDestination' //soapaction
			);  
$server->service(file_get_contents("php://input"));

?>