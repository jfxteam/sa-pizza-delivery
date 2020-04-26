<?
namespace Helpers;

class Log {
	private static  $log_path;
	private static function init(){
		$log_path = './dev/tmp/log/log_'.date("d.m.y").'.txt';
		self::$log_path = $log_path;
	}
	
	public static function write($data){
		self::init();
		error_log(date("Y-m-d H:i:s").' '.$data."\r\n", 3, self::$log_path);
	}
}
?>