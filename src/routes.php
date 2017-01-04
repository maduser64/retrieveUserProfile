<?php
// Routes

// route for facebook retrieve profile data
$app->get('/profile/facebook/{id}', function ($request, $response, $args) {
    
    // load de graph api
    $fb = new Facebook\Facebook([
  		'app_id' => $this->get('settings')['openGraph']['app_id'],
  		'app_secret' => $this->get('settings')['openGraph']['app_secret'],
  		'default_graph_version' => $this->get('settings')['openGraph']['default_graph_version'],
  	]);

	try {
		// get user data from graph api (first_name & last_name)
  		$fbData = $fb->get('/'.$args['id'].'?fields='.$this->get('settings')['openGraph']['query_fields'],$this->get('settings')['openGraph']['app_id'].'|'.$this->get('settings')['openGraph']['app_secret']);
  		// decode de response
  		$userData = json_decode($fbData->getBody());
  		// json format to return
  		$data = array(
  			'id' => $userData->id,
  			'firstName' => $userData->first_name,
  			'lastName' => $userData->last_name
  		);
  		return $response->withStatus(200)
        ->withHeader('Content-Type', 'application/json')
        ->withJson($data);
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
		return $response->withStatus(400)
		->withHeader('Content-Type', 'application/json')
        ->withJson(array('response' => 'Graph returned an error: ' . $e->getMessage()));
  		exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
  		return $response->withStatus(400)
		->withHeader('Content-Type', 'application/json')
        ->withJson(array('response' => 'Facebook SDK returned an error: ' . $e->getMessage()));
  		exit;
	}

});