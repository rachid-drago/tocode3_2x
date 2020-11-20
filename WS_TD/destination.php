<?php
class destination {

//function to be exposed must be public
public function getDestination($id) {
$dest = array("ID:".$id , "Tunis", "Tunisia","Africa", 
); 
return $dest;
}
}
?>