<?
namespace Components;
use App;
use Module;
use Helpers;

class Config {
	public function __construct($data){
		$this->db = App::$db;
		$this->data = $data;
	}
  
  public function get(){
    $currencies = $this->db->request('select', [
      'table' => 'currencies'
    ], true);
    
    $result = [];
    
    foreach($currencies as $currency)
      $result['currencies'][$currency['id']] = [
        'id' => (int) $currency['id'],
        'name' => $currency['name'],
        'delivery_min_price' => (float) $currency['delivery_min_price'],
      ];
  
    App::return(['status' => 'success', 'response' => (object) $result]);
  }
}
?>