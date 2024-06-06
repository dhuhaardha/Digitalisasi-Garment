<?php 
//Get the imageData sent from Javascript
$imageData = $_POST['imageData'];

// Generate a unique filename for the image
$filename = uniqid('signature_') . '.png';

// Save the image to the server
$image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));

//Generate a unique file name
file_put_contents('upload/' . $filename, $image);

echo $filename;
?>