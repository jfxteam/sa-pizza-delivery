<?
use Lib\Text;

abstract class Module {
	public static $mod_folder = './dev/modules';
	public static function load($mod_name, $mod_controller_data = [], $mod_model_data = []){
		$mod_controller_file = self::$mod_folder."/{$mod_name}/controller.php";
		$mod_controller_classname = '\\Modules\\Controller\\'.Text::camelizeByDots($mod_name);
		$mod_model_file = self::$mod_folder."/{$mod_name}/model.php";
		$mod_model_classname = '\\Modules\\Model\\'.Text::camelizeByDots($mod_name);
		
		require_once($mod_controller_file);
		require_once($mod_model_file);

		$reflect = new ReflectionClass($mod_controller_classname);
		$model = new $mod_model_classname($mod_model_data);
		$mod_refl = $reflect->newInstanceWithoutConstructor();
		$prop = $reflect->getProperty('model');
		$prop->setAccessible(true);
		$prop->setValue($mod_refl, $model); 
		$mod_refl->__construct($mod_controller_data);
		$mod_controller = $mod_refl;

		return $mod_controller;
	}

	public static function getTestData($mod_name){
		return require(self::$mod_folder."/{$mod_name}/test.php");
	}
	
}
?>