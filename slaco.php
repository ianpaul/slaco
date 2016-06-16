<?php

/** Slaco is a slash command that retrieves a random taco recipe
from the Tacofancy repository courtesy of the Tacofancy API.

Tacofancy: https://github.com/sinker/tacofancy

Tacofancy API: https://github.com/evz/tacofancy-api

**/

$command = $_POST['command'];
$token = $_POST['token'];

# Check the token and make sure the request is from our team 
if($token != '3vRooEUYQoPmYSuDQ1DJKqgh'){ #replace this with the token from your slash command configuration page
  $msg = "The token for the slash command doesn't match. No tacos for you. :dissapointed:";
  die($msg);
  echo $msg;
}

$taco_HQ = "https://taco-randomizer.herokuapp.com/random/";

# Set up cURL 
$feed = curl_init();

# Set up options for cURL 
# We want to get the value back from our query 
curl_setopt($feed);
# Make the call and get the response 
$json = curl_exec($feed);
# Close the connection 
curl_close($feed);

# Decode the JSON array sent back by isitup.org
$response_array = json_decode($json, $assoc = TRUE);

if($json === FALSE){

  # The Tacofancy API could not be reached 
  $badNews = "Ack! Tacofancy HQ is down! No tacos for you. :dissapointed:";  exit();}

foreach($response_array as $items)
{
  $reply = ":taco: Oh yeah, baby! Here's some taco goodness for you! \n" .$taco['shell']['name']."";

}

#Now we put the data back into JSON so that Slack will do its styling magic 
#on the returned link.
$payload = json_encode(array(
  "text" => $reply,
  "unfurl_media" => "true",
  "unfurl_links" => "true"
));
   
header('Content-Type: application/json');
echo $reply;

#That's the end of the road mothersucker!
?>