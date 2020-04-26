<?
final class Router {
	public function __construct(){
		$com_name = Input::get('com');
		if($com_name && Input::method() === 'POST'){
			$com_data = Input::post() ?? [];
			//Helpers\Log::write(json_encode($com_data));
			die(Component::load($com_name, $com_data));
		}
	}

	public function navigate(){

	}
}
?>