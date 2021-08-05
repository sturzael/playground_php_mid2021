<?php 

  $ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  $data = curl_exec($ch);
  curl_close($ch);

  //decode the result
  $datafromarray = json_decode($data,true);

  //explode the data into this $bomb variable.
  $bomb = explode( ',', $datafromarray['data']);

  //set the counter to 0
  $count = 0;

  // loop through each array item
  foreach($bomb as $item){

    //catch any number from $item
    $numberfromarray = filter_var($item, FILTER_SANITIZE_NUMBER_INT);

    //if $item contains the string age and the number is over 50 add 1 to the counter
    if(strpos($item, 'age') !== false AND $numberfromarray >= 50){
     $count++;
    }
  }

print_r($count);
?>
