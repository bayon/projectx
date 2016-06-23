<?php
	//CONTROLLER TEMPLATE
	
class monkey_controller {
	private $instanceName;
	private $view;
	private $view_dir;
	function __construct() {
		$this -> instanceName = 'default';
		$this -> view = 'monkey.view.php';
		$this -> view_dir = 'monkey/';
	}
	public function home($_data) {
		$view=$this -> view_dir."monkey.home.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function read($_data) {
		$view=$this -> view_dir."monkey.view.php";
		 
 		 $monkey = new monkey();
 
		$data = $monkey-> read();
		$this->buildView($view,$data);
	} public function read_ModelKV($_data) { 
  		$className = $_data['model']; 
   		$object = new $className;  
     		$data = $object-> read_ModelKV($_data['model'],$_data['k'],$_data['v'],'json');   
    		echo($data);   
    	 
 } 
	public function readToJSON() {
		 
 		 $monkey = new monkey();
 
		$data = $monkey-> read('json');
		 echo($data);
	}
	public function read_id($_data) {
	header('LOCATION: ?c=monkey_controller&m=paginate&where=where id='.$_data);
	}
	public function edit($_data) {

		include_once("../models/monkey.model.php");
		$monkey = new monkey(); 
		$monkey->init($_data['id'],$_data['name'],$_data['parent_id'],$_data['related_id'],$_data['parent_class'],$_data['created'],$_data['modified'],$_data['author_id']);
			$monkey->set_id($_data['id']);
		$monkey ->update($monkey);
		unset($monkey);
		$view=$this -> view_dir."monkey.edit.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function create($_data) {
		$view=$this -> view_dir."monkey.create.view.php";
 
		 // include main includes for ajax only:
		include("../models/monkey.model.php");
		$monkey = new Monkey(); 
		$monkey->init($_data['id'],$_data['name'],$_data['parent_id'],$_data['related_id'],$_data['parent_class'],$_data['created'],$_data['modified'],$_data['author_id']);
		$monkey ->create( $monkey);
		unset($monkey); 
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function delete($_data) {
		$view=$this -> view_dir."monkey.delete.view.php";
		include("../models/monkey.model.php");
		$monkey = new monkey();
		$monkey->set_id($_data['id']);
		$monkey ->delete( $monkey);
		unset($monkey);
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function paginate($_data) {
	$view=$this -> view_dir."monkey.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function buildView($view='',$data='') { 
		build_view($view,$data);
	}
}
?>
