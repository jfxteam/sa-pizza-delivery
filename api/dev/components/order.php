<?
namespace Components;
use App;
use Module;
use Helpers;

class Order {
	public function __construct($data){
		$this->db = App::$db;
		$this->data = $data;
	}
  
  public function create(){
    $client_id = $this->db->request('set', [
      'table' => 'clients', 
      'keys' => array_keys($this->data['client']),
      'values' => [array_values($this->data['client'])]
    ], true);
    
    $order_id = $this->db->request('set', [
      'table' => 'orders', 
      'keys' => ['client_id', 'address', 'comment', 'currency_id'],
      'values' => [[
        $client_id,
        $this->data['order']['address'],
        $this->data['order']['comment'],
        $this->data['order']['currency_id']
      ]]
    ], true);
    
    $order_positions = $this->db->request('set', [
      'table' => 'orders_positions', 
      'keys' => ['order_id', 'good_id', 'price', 'quantity'],
      'values' => array_map(function($position) use ($order_id){
        return [$order_id, $position['id'], $position['price'], $position['quantity']];
      }, $this->data['order']['positions'])
    ], true);
  
    App::return(['status' => 'success', 'response' => (object) [
      'client_id' => $client_id,
      'order_id' => $order_id,
      'positions' => $order_positions
    ]]);
  }
}
?>