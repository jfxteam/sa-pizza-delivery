<?
namespace Components;
use App;
use Module;
use Helpers;

class Catalog {
	public function __construct($data){
		$this->db = App::$db;
		$this->data = $data;
	}
  
  public function get_list(){
    $goods = $this->db->request('select', [
      'table' => 'goods',
      'values' => $this->data['select'] ?? [],
      'join' => [
        [
          'base_table' => 'goods',
          'table' => 'goods_prices',
          'on' => [
            'base_table' => 'id',
            'join_table' => 'good_id'
          ],
          'values' => ['price']
        ],
        [
          'base_table' => 'goods_prices',
          'table' => 'currencies',
          'on' => [
            'base_table' => 'currency_id',
            'join_table' => 'id'
          ],
          'values' => ['name' => 'currency_name']
        ],
      ],
      'where' => [
        'goods' => $this->data['filters'],
      ],
      'limit' => $this->data['limit'] ?? '',
    ], true);
    
    $result = [];
    foreach($goods as $good){
      $result[$good['id']] = array_merge(
        !empty($good['id']) ? ['id' => (int) $good['id']] : [],
        !empty($good['name']) ? ['name' => $good['name']] : [],
        !empty($good['description']) ? ['description' => $good['description']] : [],
        !empty($good['image']) ? ['image' => $good['image']] : [],
        !empty($good['type']) ? ['type' => $good['type']] : [],
        !empty($good['active']) ? ['active' => (bool) $good['active']] : [],
        ['prices' => $result[$good['id']]['prices'] ?? []]
      );
      $result[$good['id']]['prices'][$good['currency_name']] = (float) $good['price'];
    }
  
    App::return(['status' => 'success', 'response' => (object) $result]);
  }
}
?>