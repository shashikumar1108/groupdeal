<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function hashPassword($password = 'password',$cost=12){
    //$password = 'password';
    $options = [
        'cost' => $cost,
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

function verifyPassword($password,$hash){
    return (boolean)password_verify($password,$hash);
}

function base64url_encode($str) {
    return rtrim(strtr(base64_encode($str), '+/', '-_'), '=');
}

function createJwt($headers, $payload, $secret = 'secret'){

    $headers_encoded = base64url_encode(json_encode($headers));
	
	$payload_encoded = base64url_encode(json_encode($payload));
	
	$signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
	$signature_encoded = base64url_encode($signature);
	
	$jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
	
	return $jwt;

}

function validJwt($jwt, $secret = 'secret'){

    // split the jwt
	$tokenParts = explode('.', $jwt);
	$header = base64_decode($tokenParts[0]);
	$payload = base64_decode($tokenParts[1]);
	$signature_provided = $tokenParts[2];

	// check the expiration time - note this will cause an error if there is no 'exp' claim in the jwt
	$expiration = json_decode($payload)->exp;
	$is_token_expired = ($expiration - time()) < 0;

	// build a signature based on the header and payload using the secret
	$base64_url_header = base64url_encode($header);
	$base64_url_payload = base64url_encode($payload);
	$signature = hash_hmac('SHA256', $base64_url_header . "." . $base64_url_payload, $secret, true);
	$base64_url_signature = base64url_encode($signature);

	// verify it matches the signature provided in the jwt
	$is_signature_valid = ($base64_url_signature === $signature_provided);
	
	if ($is_token_expired || !$is_signature_valid) {
		return FALSE;
	} else {
		return TRUE;
	}

}

function tokenData($jwt){
    // split the jwt
	$tokenParts = explode('.', $jwt);
	$header = base64_decode($tokenParts[0]);
	$payload = base64_decode($tokenParts[1]);
	$signature_provided = $tokenParts[2];

	// check the expiration time - note this will cause an error if there is no 'exp' claim in the jwt
	return json_decode($payload);
}

function checkAuthorization($headers = []){
    if( isset($headers['Authorization']) && !empty($headers['Authorization']) ){
        if( validJwt($headers['Authorization'],'secret') ){
            return 1;
        }else{
            return 2;
        }
    }else{
        return 3;
    }
}

function success($res,$data = []){
    $result = [
        'message'=>''
    ];
    if( count($data) ){
        $result = $data;
    }
    //echo json_encode($result);
    $res->output->set_status_header(200);
    echo json_encode($result);exit;
}

function clientErr($res,$data = []){
    $result = [
        'message'=>''
    ];
    if( count($data) ){
        $result = $data;
    }
    //echo json_encode($result);
    $res->output->set_status_header(400);
    echo json_encode($result);exit;
}

function tokenErr($res,$data = []){
    $result = [
        'message'=>''
    ];
    if( count($data) ){
        $result = $data;
    }
    //echo json_encode($result);
    $res->output->set_status_header(401);
    echo json_encode($result);exit;
}

function serverErr($res,$data = []){
    $result = [
        'message'=>''
    ];
    if( count($data) ){
        $result = $data;
    }
    //echo json_encode($result);
    $res->output->set_status_header(500);
    echo json_encode($result);exit;
}

function notFound($res,$data = []){
    $result = [
        'message'=>'Api not found!!!'
    ];
    if( count($data) ){
        $result = $data;
    }
    //echo json_encode($result);
    $res->output->set_status_header(404);
    echo json_encode($result);exit;
}

function uploadFile(){

}

function asset_url(){
    return base_url().'assets/';
}

function api_url(){
    return base_url().'api/v1/';
}

?>