<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

abstract class Config {
	const db_host = DB_HOST;
	const db_user = DB_USER;
	const db_pass = DB_PASS;
	const db_name = DB_NAME;
}
?>