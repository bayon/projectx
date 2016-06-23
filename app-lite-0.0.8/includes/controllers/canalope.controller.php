<?php
	//CONTROLLER TEMPLATE
	
class canalope_controller {
	private $instanceName;
	private $view;
	private $view_dir;
	function __construct() {
		$this -> instanceName = 'default';
		$this -> view = 'canalope.view.php';
		$this -> view_dir = 'canalope/';
	}
	public function home($_data) {
		$view=$this -> view_dir."canalope.home.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function read($_data) {
		$view=$this -> view_dir."canalope.view.php";
		 
 		 $canalope = new canalope();
 
		$data = $canalope-> read();
		$this->buildView($view,$data);
	} public function read_ModelKV($_data) { 
  		$className = $_data['model']; 
   		$object = new $className;  
     		$data = $object-> read_ModelKV($_data['model'],$_data['k'],$_data['v'],'json');   
    		echo($data);   
    	 
 } 
	public function readToJSON() {
		 
 		 $canalope = new canalope();
 
		$data = $canalope-> read('json');
		 echo($data);
	}
	public function read_id($_data) {
	header('LOCATION: ?c=canalope_controller&m=paginate&where=where id='.$_data);
	}
	public function edit($_data) {

		include_once("../models/canalope.model.php");
		$canalope = new canalope(); 
		$canalope->init($_data['id'],$_data['name'],$_data['parent_id'],$_data['related_id'],$_data['parent_class'],$_data['created'],$_data['modified'],$_data['author_id']);
			$canalope->set_id($_data['id']);
		$canalope ->update($canalope);
		unset($canalope);
		$view=$this -> view_dir."canalope.edit.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function create($_data) {
		$view=$this -> view_dir."canalope.create.view.php";
 
		 // include main includes for ajax only:
		include("../models/canalope.model.php");
		$canalope = new Canalope(); 
		$canalope->init($_data['id'],$_data['name'],$_data['parent_id'],$_data['related_id'],$_data['parent_class'],$_data['created'],$_data['modified'],$_data['author_id']);
		$canalope ->create( $canalope);
		unset($canalope); 
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function delete($_data) {
		$view=$this -> view_dir."canalope.delete.view.php";
		include("../models/canalope.model.php");
		$canalope = new canalope();
		$canalope->set_id($_data['id']);
		$canalope ->delete( $canalope);
		unset($canalope);
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function paginate($_data) {
	$view=$this -> view_dir."canalope.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function buildView($view='',$data='') { 
		build_view($view,$data);
	}
}
?>
