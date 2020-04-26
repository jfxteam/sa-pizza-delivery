<?
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Cache-Control: no-store, no-cache, must-revalidate");
header('Content-Type: text/html; charset=utf-8');

define('ROOT', dirname(__FILE__));

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once('core/app.php');

App::start([
	'debug_mode' => DEBUG_MODE
]);
?>