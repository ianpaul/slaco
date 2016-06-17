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

$unparsed_json = file_get_contents("http://taco-randomizer.herokuapp.com/random/");

# Decode the JSON array sent back by isitup.org
$json_object = json_decode($unparsed_json, true);

print_r($json_object);


# This code is not working right now. I'll come back to this project in a little bit and figure out what's going wrong.
#if($unparsed_json === FALSE){

  # The Tacofancy API could not be reached 
#  $badNews = "Ack! Tacofancy HQ is down! No tacos for you. :dissapointed:";
# } else {
# foreach($json_object as $items)
#{
# $reply = ":taco: Oh yeah, baby! Here's some taco goodness for you! \n" .$items['seasoning']['name']."";

#}
#}

#echo $reply;


#That's the end of the road mothersucker!
?>