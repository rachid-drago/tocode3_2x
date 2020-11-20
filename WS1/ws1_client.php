<?php
  
	require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$response = '';
	$wsdl = "http://localhost/tocode3_2/WS1/ws1_server.php?wsdl";
	if(isset($_POST['sub'])){
		$id = trim($_POST['id']);
		if(!$id){
			$error = 'id cannot be left blank.';
		}

		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				$result = $client->call('fetchDestinationData', array($id));
				$result = json_decode($result);
			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
	}	

	/* Add new book **/
	if(isset($_POST['addbtn'])){
		/*$title = trim($_POST['title']);
		$id = trim($_POST['id']);
		$author = trim($_POST['author']);
		$category = trim($_POST['category']);
        $price = trim($_POST['price']);*/
        $destination=trim($_POST["destination"]);
        $country=trim($_POST["country"]);
        $continent=trim($_POST["continent"]);
        $id=trim($_POST["id"]);


		//Perform all required validations here
		if(!$destination || !$country || !$continent ){
			$error = 'All fields are required.';
		}
        echo  $destination .' '. $country .' '. $continent;
		if(!$error){
            //create client object
            echo "creation client ";
            $client = new nusoap_client($wsdl, true);

            $err = $client->getError();

			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				/** Call insert book method */
				 $response =  $client->call('insertDestination', array($id,$destination,$country,$continent));
				 $response = json_decode($response);
			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Destination Store Web Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Books Store SOAP Web Service</h2>
  <p>Enter <strong>id</strong> of book and click <strong>Fetch Book Information</strong> button.</p>
  <br />       
  <div class='row'>
  	<form class="form-inline" method = 'post' name='form1'>
  		<?php if($error) { ?> 
	    	<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp;<?php echo $error; ?> 
	        </div>
		<?php } ?>
	    <div class="form-group">
	      <label for="email">id:</label>
	      <input type="text" class="form-control" name="id" id="id" placeholder="Enter id" required>
	    </div>
	    <button type="submit" name='sub' class="btn btn-default">Fetch Book Information</button>
    </form>
   </div>
   <br />
   <h2>Book Information</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Destination</th>
        <th>Country</th>
        <th>Continent</th>
        <th>id</th>
      </tr>
    </thead>
    <tbody>
    <?php if($result){ ?>
      	
		      <tr>
		        <td><?php echo $result->destination; ?></td>
		        <td><?php echo $result->country; ?></td>
		        <td><?php echo $result->continent; ?></td>
		        <td><?php echo $result->id; ?></td>	
		      </tr>
      <?php 
  		}else{ ?>
  			<tr>
		        <td colspan='5'>Enter id and click on Fetch Destination Information button</td>
		      </tr>
  		<?php } ?>
    </tbody>
  </table>
	<div class='row'>
	<h2>Add New Destination</h2>
	 <?php if(isset($response->status)) {

	  if($response->status == 200){ ?>
		<div class="alert alert-success fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Success!</strong>&nbsp; Destination Added succesfully. 
	        </div>
	  <?php }elseif(isset($response) && $response->status != 200) { ?>
			<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp; Cannot Add a Destination. Please try again. 
	        </div>
	 <?php } 
	 }
	 ?>
  	<form class="form-inline" method = 'post' name='form1'>
  		<?php if($error) { ?> 
	    	<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp;<?php echo $error; ?> 
	        </div>
		<?php } ?>
	    <div class="form-group">
	      <label for="email"></label>
	      <input type="text" class="form-control" name="destination" id="destination" placeholder="Enter Destination" required>
				<input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" required>
				<input type="text" class="form-control" name="continent" id="continent" placeholder="Enter Continent" required>
				<input type="text" class="form-control" name="id" id="id" placeholder="Enter id" required>
	    </div>
	    <button type="submit" name='addbtn' class="btn btn-default">Add New Destination</button>
    </form>
   </div>
</div>

</body>
</html>



