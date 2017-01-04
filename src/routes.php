<?php
// Routes

$app->get('/profile/facebook/{id}', function ($request, $response, $args) {
    
    $fb = new Facebook\Facebook([
  		'app_id' => '643931279111443',
  		'app_secret' => '4b27dbed273f80adbcc5072f0688cb18',
  		'default_graph_version' => 'v2.2',
  	]);

	try {
  		$fbData = $fb->get('/'.$args['id'].'?fields=first_name,last_name','EAAJJpu8mtRMBAPkAxkeGqVCcFNznQa54ffsKYcBRfU2BWqPuLVS3sNimpNCWtDeDcLVFoHToDyRAVMT7CbbZCXR2ceMNTO50e49cvgzmsndry7ZB34yqxaEbsxKeuZCmpEjPv1HZBTGfICfTOkwo7sZA6fSqfzSH4Ggbw4B2CrD4821pQg3ZCQVmI6HMutBl0ZD');
  		return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->write($fbData->getBody());
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
  		echo 'Graph returned an error: ' . $e->getMessage();
  		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
  		echo 'Facebook SDK returned an error: ' . $e->getMessage();
  		exit;
	}

});