<?php
	//CONTROLLER TEMPLATE
	
class apple_controller {
	private $instanceName;
	private $view;
	private $view_dir;
	function __construct() {
		$this -> instanceName = 'default';
		$this -> view = 'apple.view.php';
		$this -> view_dir = 'apple/';
	}
	public function home($_data) {
		$view=$this -> view_dir."apple.home.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function read($_data) {
		$view=$this -> view_dir."apple.view.php";
		 
 		 $apple = new apple();
 
		$data = $apple-> read();
		$this->buildView($view,$data);
	} public function read_ModelKV($_data) { 
  		$className = $_data['model']; 
   		$object = new $className;  
     		$data = $object-> read_ModelKV($_data['model'],$_data['k'],$_data['v'],'json');   
    		echo($data);   
    	 
 } 
	public function readToJSON() {
		 
 		 $apple = new apple();
 
		$data = $apple-> read('json');
		 echo($data);
	}
	public function read_id($_data) {
	header('LOCATION: ?c=apple_controller&m=paginate&where=where id='.$_data);
	}
	public function edit($_data) {

		include_once("../models/apple.model.php");
		$apple = new apple(); 
		$apple->init($_data['id'],$_data['name'],$_data['parent_id'],$_data['related_id'],$_data['parent_class'],$_data['created'],$_data['modified'],$_data['author_id']);
			$apple->set_id($_data['id']);
		$apple ->update($apple);
		unset($apple);
		$view=$this -> view_dir."apple.edit.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function create($_data) {
		$view=$this -> view_dir."apple.create.view.php";
 
		 // include main includes for ajax only:
		include("../models/apple.model.php");
		$apple = new Apple(); 
		$apple->init($_data['id'],$_data['name'],$_data['parent_id'],$_data['related_id'],$_data['parent_class'],$_data['created'],$_data['modified'],$_data['author_id']);
		$apple ->create( $apple);
		unset($apple); 
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function delete($_data) {
		$view=$this -> view_dir."apple.delete.view.php";
		include("../models/apple.model.php");
		$apple = new apple();
		$apple->set_id($_data['id']);
		$apple ->delete( $apple);
		unset($apple);
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function paginate($_data) {
	$view=$this -> view_dir."apple.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function buildView($view='',$data='') { 
		build_view($view,$data);
	}
}
?>
