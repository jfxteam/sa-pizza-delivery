<?
abstract class Input {
	public static function __callStatic($name, $arguments) {
		$input = [
			'get' => $_GET,
			'post' => file_get_contents('php://input'),
            'method' => $_SERVER['REQUEST_METHOD']
		];

        $content_type_data_handler = [
            'application/json' => function($data){
                return json_decode($data, true);
            },
            'application/x-www-form-urlencoded' => function($data){
                parse_str($data, $output);
                return $output;
            },
        ];

        if(isset($_SERVER['CONTENT_TYPE'])){
            $current_content_type_parts = explode(';', str_replace(' ', '', $_SERVER['CONTENT_TYPE']));
            foreach($content_type_data_handler as $content_type => $data_handler){
                if(in_array($content_type, $current_content_type_parts)){
                    $input['post'] = $data_handler($input['post']);
                    break;
                }
            }
        } else {
            $input['post'] = $content_type_data_handler['application/x-www-form-urlencoded']($input['post']);
        }

		if(!isset($input[$name]))return;
		$input_data = $input[$name];
		if(!count($arguments))return $input_data;
        $property = $arguments[0];
        if(isset($arguments[1])){
        	$value = $arguments[1];
        	$input_data[$property] = $value;
        	return $value;
        } else {
        	return isset($input_data[$property]) ? $input_data[$property] : null;
        }
    }
}
?>