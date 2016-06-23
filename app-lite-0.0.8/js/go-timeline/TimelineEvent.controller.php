<?php
	//TIRE CONTROLLER TEMPLATE
	
class timelineevent_controller {
	private $instanceName;
	private $view;
	private $view_dir;
	function __construct() {
		$this -> instanceName = 'default';
		$this -> view = 'timelineevent.view.php';
		$this -> view_dir = '/';
	}
	public function home($_data) {
		//echo('home great success!!!');
		$view=$this -> view_dir."timelineevent.home.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function read($_data) {
		//echo('read great success!!!');
		//$view=$this -> view_dir."timelineevent.pagination.view.php";
		$view=$this -> view_dir."timeline_ui.view.php";
 		 $timelineevent = new TimelineEvent();
		$data = $timelineevent-> read();
		$this->buildView($view,$data);
	}
	public function readJSON($_data) {
		//echo('read JSON great success!!!');
		//$view=$this -> view_dir."timelineevent.pagination.view.php";
		//$view=$this -> view_dir."timeline_ui.view.php";
 		 $timelineevent = new TimelineEvent();
		$data = $timelineevent-> read("json");
		//$this->buildView($view,$data);
		echo($data);
	}
	public function read_id($_data) {
	header('LOCATION: ?c=timelineevent_controller&m=paginate&where=where id='.$_data);
	}
	public function edit($_data) {
		//echo('edit great success!!!');

		include_once("TimelineEvent.model.php");
		$timelineevent = new TimelineEvent(); 
		$timelineevent->init($_data['id'],$_data['event_name'],$_data['event_img'],$_data['event_description'],$_data['date_timestamp']);
			$timelineevent->set_id($_data['id']);
		$timelineevent ->update($timelineevent);
		unset($timelineevent);
		$view=$this -> view_dir."timelineevent.edit.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function create($_data) {
		//echo('create great success!!!');
		//echo('Controller die');die();
		//$view=$this -> view_dir."timelineevent.create.view.php";
 
		 // include main includes for ajax only:
		include_once("TimelineEvent.model.php");
		$timelineevent = new TimelineEvent(); 
		$timelineevent->init($_data['id'],$_data['event_name'],$_data['event_img'],$_data['event_description'],$_data['date_timestamp']);
		$timelineevent ->create( $timelineevent);
		unset($timelineevent); 
		$data = $_data;
		//echo($data);
		//$this->buildView($view,$data);
	}
	public function delete($_data) {
		echo('delete great success!!!');
		$view=$this -> view_dir."timelineevent.delete.view.php";
		include("TimelineEvent.model.php");
		$timelineevent = new TimelineEvent();
		$timelineevent->set_id($_data['id']);
		$timelineevent ->delete( $timelineevent);
		unset($timelineevent);
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function paginate($_data) {
	$view=$this -> view_dir."timelineevent.pagination.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function buildView($view='',$data='') { 
		build_view($view,$data);
	}
}
?>
