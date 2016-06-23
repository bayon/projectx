<?php
	//CONTROLLER TEMPLATE
	
class foo_controller {
	private $instanceName;
	private $view;
	private $view_dir;
	function __construct() {
		$this -> instanceName = 'default';
		$this -> view = 'foo.view.php';
		$this -> view_dir = 'foo/';
	}
	public function home($_data) {
		$view=$this -> view_dir."foo.home.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function read($_data) {
		$view=$this -> view_dir."foo.view.php";
		 
 		 $foo = new foo();
 
		$data = $foo-> read();
		$this->buildView($view,$data);
	} public function read_ModelKV($_data) { 
  		$className = $_data['model']; 
   		$object = new $className;  
     		$data = $object-> read_ModelKV($_data['model'],$_data['k'],$_data['v'],'json');   
    		echo($data);   
    	 
 } 
	public function readToJSON() {
		 
 		 $foo = new foo();
 
		$data = $foo-> read('json');
		 echo($data);
	}
	public function read_id($_data) {
	header('LOCATION: ?c=foo_controller&m=paginate&where=where id='.$_data);
	}
	public function edit($_data) {

		include_once("../models/foo.model.php");
		$foo = new foo(); 
		$foo->init($_data['element'],$_data['id'],$_data['name'],$_data['value'],$_data['placeholder'],$_data['classList'],$_data['text'],$_data['eventType'],$_data['src'],$_data['height'],$_data['width'],$_data['href'],$_data['target'],$_data['type'],$_data['method'],$_data['action'],$_data['data']);
			$foo->set_id($_data['id']);
		$foo ->update($foo);
		unset($foo);
		$view=$this -> view_dir."foo.edit.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function create($_data) {
		$view=$this -> view_dir."foo.create.view.php";
 
		 // include main includes for ajax only:
		include("../models/foo.model.php");
		$foo = new Foo(); 
		$foo->init($_data['element'],$_data['id'],$_data['name'],$_data['value'],$_data['placeholder'],$_data['classList'],$_data['text'],$_data['eventType'],$_data['src'],$_data['height'],$_data['width'],$_data['href'],$_data['target'],$_data['type'],$_data['method'],$_data['action'],$_data['data']);
		$foo ->create( $foo);
		unset($foo); 
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function delete($_data) {
		$view=$this -> view_dir."foo.delete.view.php";
		include("../models/foo.model.php");
		$foo = new foo();
		$foo->set_id($_data['id']);
		$foo ->delete( $foo);
		unset($foo);
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function paginate($_data) {
	$view=$this -> view_dir."foo.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function buildView($view='',$data='') { 
		build_view($view,$data);
	}
}
?>
