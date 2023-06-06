<?php

//===============================================
//GET cURL METHOD:
//===============================================
class SapAPI{

private $url;
// private $public; 
// private $hashkey;
// private $timestamp; 
private $fields;

	function __construct($url,$fields,$transaction){
		$this->url = $url;
		// $this->public = $public;
		// $this->haskey = $hashkey; 
		// $this->timestamp = $timestamp;
		$this->fields = $fields;
        $this->transaction = $transaction;
	}


	function CallAPI()
	{
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => $this->transaction,
		  CURLOPT_POSTFIELDS => $this->fields,
		  CURLOPT_HTTPHEADER => array(
		    'Content-Type: application/json'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
	}
}
?>