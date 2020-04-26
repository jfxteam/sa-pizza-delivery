<?php
namespace Lib;

class Curl {
	public $defaults = [
		'host' => '', 
		'content_type' => 'application/x-www-form-urlencoded', 
		'sleep' => 0, 
		'method' => 'POST',
		'auth' => []
	];

	public function __construct($settings = []){
		$this->settings = array_merge($this->defaults, $settings);
	}

	public function send($settings = []){
		$auth = $this->settings['auth'];
		$url = $settings['url'] ?? '';
		$method = $settings['method'] ?? $this->settings['method'];
		$content_type = $settings['content_type'] ?? $this->settings['content_type'];
		$data = $settings['data'] ?? [];

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: '.$content_type, 'Accept: '.$content_type]);
		curl_setopt($curl, CURLOPT_COOKIEFILE, ROOT.'/dev/tmp/curl/'.parse_url($this->settings['host'], PHP_URL_HOST).'.cookie.txt');
		curl_setopt($curl, CURLOPT_COOKIEJAR, ROOT.'/dev/tmp/curl/'.parse_url($this->settings['host'], PHP_URL_HOST).'.cookie.txt');
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
		if($auth){
			curl_setopt($curl, CURLOPT_USERPWD, implode(':', $auth));
		}
		if($data){
			if($method !== 'GET'){
				curl_setopt($curl, CURLOPT_POSTFIELDS, $content_type === 'application/json' ? json_encode($data) : http_build_query($data));
			} else {
				$url = implode('?', [$url, http_build_query($data)]);
			}
		}
		curl_setopt($curl, CURLOPT_URL, $this->settings['host'].$url);

		$response = json_decode(curl_exec($curl), 1);
		curl_close($curl);
		usleep($this->settings['sleep']);
		return $response;
	}
}
?>