<?
use Lib\Text;

abstract class Component {
	public static function load($com_name, $com_data = []){
		$com_folder = "components";
		$com_file = "./dev/{$com_folder}/{$com_name}.php";
		$com_classname = ucfirst($com_folder)."\\".Text::camelizeByDots($com_name);
		$com_config_key = Input::get("cfg");
		$com_action = str_replace('.', '_', Input::get("act"));
		
		if(!file_exists($com_file))
			App::return(["status" => "error", "response" => "File {$com_file} is not exsist!"]);
		
		require_once $com_file;
		
		if(!class_exists($com_classname))
			App::return(["status" => "error", "response" => "Class {$com_classname} is not exsist!"]);
			
		if($com_config_key){
			$com_config_file = "./dev/configs/{$com_name}.{$com_config_key}.php";
			if(!file_exists($com_config_file))
				App::return(["status" => "error", "response" => "Config \"{$com_config_key}\" is not exists!"]);
			$com_data = self::get_config($com_config_file, $com_data);
		}

		$com = new $com_classname($com_data, $com_config_key);
		if($com_action){
			if(method_exists($com, $com_action)){
				$com->$com_action();
			} else {
				App::return(["status" => "error", "response" => "Method {$com_action} of {$com_classname} is not exsist!"]);
			}
		}
	}
	
	private static function get_config($file, $data){
		return require $file;
	}
}
?>