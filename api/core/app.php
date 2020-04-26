<?php
final class App {
	public static $db;
	public static $router;

	public static function start($params = array()){
		if($params['debug_mode']){
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
		}

		self::need(['./dev/config.php', './core/db/mysqli.php']);
		self::$db = new DB\MySQLiControl;

		self::need(['./core/engine/input.php', './core/admin/user.php']);
		User::login();

		self::need([
			'./core/engine/controller.php', 
			'./core/engine/component.php', 
			'./core/engine/module.php', 
			'./core/engine/router.php',
			'./core/helpers/log.php',
			'./core/helpers/lang.php',
			'./core/lib/text.php',
			'./core/lib/request.php',
			'./core/lib/curl.php',
		]);
		self::$router = new Router();

		require_once('./dev/index.php');
	}

	public static function need($files){
		if(is_array($files)){
			array_map(function($file_name){
				require_once($file_name);
			}, $files);
		} else {
			$file = $files;
			require_once($file);
		}
	}

	public static function return($data){
		$data = json_encode($data);
		die($data);
	}

	private static function checkUpdates(){

	}
}

?>