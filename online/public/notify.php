<?php




require 'includes/header.php';







use Twilio\Rest\Client;





function notify($config, $num, $message){

  $client = new client($config['account_sid'],$config['auth_token']);

  $client->account->messages->create($num, ['from'=>$config['phone_number'], 'body'=>$message]);

}


?>
