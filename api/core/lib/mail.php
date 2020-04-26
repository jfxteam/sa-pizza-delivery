<?php
namespace Lib;

class Mail {
	public static function send($to, $subject, $message, $headers = []){
		$EOL = "\r\n";
		$boundary = "--".md5(uniqid(time()));
		$headers[] = "MIME-Version: 1.0;";   
		$headers[] = "Content-Type: multipart/mixed; charset=utf-8; boundary=\"$boundary\"";
		$body[] = "--$boundary";
		$body[] = "Content-Type: text/html; charset=utf-8";
		$body[] = "Content-Transfer-Encoding: base64";
		$body[] = $EOL.chunk_split(base64_encode($message));
		$message_part = "";
		return mail($to, $subject, implode("$EOL", $body), implode("$EOL", $headers));
	}
}
?>