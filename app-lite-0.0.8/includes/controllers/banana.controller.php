<?php
	//CONTROLLER TEMPLATE
	
class banana_controller {
	private $instanceName;
	private $view;
	private $view_dir;
	function __construct() {
		$this -> instanceName = 'default';
		$this -> view = 'banana.view.php';
		$this -> view_dir = 'banana/';
	}
	public function home($_data) {
		$view=$this -> view_dir."banana.home.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function read($_data) {
		$view=$this -> view_dir."banana.view.php";
		 
 		 $banana = new banana();
 
		$data = $banana-> read();
		$this->buildView($view,$data);
	} public function read_ModelKV($_data) { 
  		$className = $_data['model']; 
   		$object = new $className;  
     		$data = $object-> read_ModelKV($_data['model'],$_data['k'],$_data['v'],'json');   
    		echo($data);   
    	 
 } 
	public function readToJSON() {
		 
 		 $banana = new banana();
 
		$data = $banana-> read('json');
		 echo($data);
	}
	public function read_id($_data) {
	header('LOCATION: ?c=banana_controller&m=paginate&where=where id='.$_data);
	}
	public function edit($_data) {

		include_once("../models/banana.model.php");
		$banana = new banana(); 
		$banana->init($_data['id'],$_data['name'],$_data['parent_id'],$_data['related_id'],$_data['parent_class'],$_data['created'],$_data['modified'],$_data['author_id']);
			$banana->set_id($_data['id']);
		$banana ->update($banana);
		unset($banana);
		$view=$this -> view_dir."banana.edit.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function create($_data) {
		$view=$this -> view_dir."banana.create.view.php";
 
		 // include main includes for ajax only:
		include("../models/banana.model.php");
		$banana = new Banana(); 
		$banana->init($_data['id'],$_data['name'],$_data['parent_id'],$_data['related_id'],$_data['parent_class'],$_data['created'],$_data['modified'],$_data['author_id']);
		$banana ->create( $banana);
		unset($banana); 
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function delete($_data) {
		$view=$this -> view_dir."banana.delete.view.php";
		include("../models/banana.model.php");
		$banana = new banana();
		$banana->set_id($_data['id']);
		$banana ->delete( $banana);
		unset($banana);
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function paginate($_data) {
	$view=$this -> view_dir."banana.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function buildView($view='',$data='') { 
		build_view($view,$data);
	}
}
?>
