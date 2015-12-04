<?php
/**
* @author: Prahlad Yeri
* @title: Indiegogo library implementation in PHP
* @version: 1.3
*/

function indie_get_comments($token) {
	//'user_agent':'Mozilla/4.0 (compatible; MSIE 6.0)' 
	$getdata = http_build_query(
		array('api_token'=>$token)
	);
	
	// Create a stream
	$opts = array(
	  'http'=>array(
		'method'=>"GET",
		//'header'=>"Accept-language: en\r\n" . "Cookie: foo=bar\r\n",
		'header'=>"User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36",
		//'content'=>$getdata,
	  )
	);

	$context = stream_context_create($opts);

	// Open the file using the HTTP headers set above
	$json = file_get_contents('https://api.indiegogo.com/1.1/campaigns/790357/comments.json?api_token='.$token, false, $context);
	$data  = json_decode($json);
	//var_dump($data);
	return $data;
}

function indie_get_contributions($token)
{
	//'user_agent':'Mozilla/4.0 (compatible; MSIE 6.0)' 
	$getdata = http_build_query(
		array('api_token'=>$token)
	);
	
	// Create a stream
	$opts = array(
	  'http'=>array(
		'method'=>"GET",
		//'header'=>"Accept-language: en\r\n" . "Cookie: foo=bar\r\n",
		'header'=>"User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36",
		//'content'=>$getdata,
	  )
	);

	$context = stream_context_create($opts);

	// Open the file using the HTTP headers set above
	$json = file_get_contents('https://api.indiegogo.com/1.1/campaigns/790357/contributions.json?api_token='.$token, false, $context);
	$data  = json_decode($json);
	//var_dump($data);
	return $data;	
}

?>

