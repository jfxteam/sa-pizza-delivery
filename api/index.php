<?
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Cache-Control: no-store, no-cache, must-revalidate");


ini_set ( 'DOCUMENT_ROOT' , 'C:/www/projects/ca-pizza-delivery' );
phpinfo();
die();


try {
  $config_file = 'config.php';
  if(!file_exists($config_file))
    throw new Error("$config_file file is not exists!");
  
  require_once $config_file;
  

chdir('../ca-pizza-delivery/dist');



  
  include 'index.html';
} catch(Exception $e){
  echo $e->getMessage();
}
?>