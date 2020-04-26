<?php
namespace Lib;

class Request {
	public function __construct($host, $content_type = 'application/x-www-form-urlencoded'){
		$this->host = $host;
		$this->content_type = $content_type;
	}
	public function send($url = '', $data = array(), $method = 'POST', $content_type = ''){
		if(!$content_type)$content_type = $this->content_type;
		$opts = array('http' =>
		    array(
		        'method'  => $method,
		        'header'  => 'Content-type: '.$content_type,
		        'content' => http_build_query($data)
		    )
		);
		$context  = stream_context_create($opts);
		$result = file_get_contents($this->host.$url, false, $context);
		$response = json_decode($result, 1);
		return $response;
	}
}
?>