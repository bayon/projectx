<?php
	//TIRE CONTROLLER TEMPLATE
	
class time_dimension_controller {
	private $instanceName;
	private $view;
	private $view_dir;
	function __construct() {
		$this -> instanceName = 'default';
		$this -> view = 'time_dimension.view.php';
		$this -> view_dir = 'time_dimension/';
	}
	public function home($_data) {
		echo('home great success!!!');
		$view=$this -> view_dir."time_dimension.home.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function read($_data) {
		echo('read great success!!!');
		$view=$this -> view_dir."time_dimension.pagination.view.php";
		 
 		 $time_dimension = new Time_dimension();
 
		$data = $time_dimension-> read();
		$this->buildView($view,$data);
	}
	
	
	public function readJSON($_data) {
		$time_dimension = new Time_dimension();
		//$days = $time_dimension-> readDaysDateRange("json");
		//$data = $time_dimension-> readMonths("json");
		//$data = $time_dimension-> readYears("json");
		//readEventsAndDates
		//$events = $time_dimension-> readEventsAndDates("json");
		
		//$days = $time_dimension-> readDaysDateRange();
		$days = $time_dimension-> readDaysMax();
		$events = $time_dimension-> readEventsAndDates();
		$data = array();
		$data['days']  = $days;
		$data['events']  = $events;
		$data_package = json_encode($data);
		//readMonths
		//echo($data);
		echo($data_package);
	}
	
	
	public function read_id($_data) {
	header('LOCATION: ?c=time_dimension_controller&m=paginate&where=where id='.$_data);
	}
	public function edit($_data) {
		echo('edit great success!!!');

		include_once("Time_dimension.model.php");
		$time_dimension = new Time_dimension(); 
		$time_dimension->init($_data['id'],$_data['db_date'],$_data['year'],$_data['month'],$_data['day'],$_data['quarter'],$_data['week'],$_data['day_name'],$_data['month_name'],$_data['holiday_flag'],$_data['weekend_flag'],$_data['event'],$_data['event_id']);
			$time_dimension->set_id($_data['id']);
		$time_dimension ->update($time_dimension);
		unset($time_dimension);
		$view=$this -> view_dir."time_dimension.edit.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function create($_data) {
		echo('create great success!!!');
		$view=$this -> view_dir."time_dimension.create.view.php";
 
		 // include main includes for ajax only:
		include("Time_dimension.model.php");
		$time_dimension = new Time_dimension(); 
		$time_dimension->init($_data['id'],$_data['db_date'],$_data['year'],$_data['month'],$_data['day'],$_data['quarter'],$_data['week'],$_data['day_name'],$_data['month_name'],$_data['holiday_flag'],$_data['weekend_flag'],$_data['event'],$_data['event_id']);
		$time_dimension ->create( $time_dimension);
		unset($time_dimension); 
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function delete($_data) {
		echo('delete great success!!!');
		$view=$this -> view_dir."time_dimension.delete.view.php";
		include("Time_dimension.model.php");
		$time_dimension = new Time_dimension();
		$time_dimension->set_id($_data['id']);
		$time_dimension ->delete( $time_dimension);
		unset($time_dimension);
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function paginate($_data) {
	$view=$this -> view_dir."time_dimension.pagination.view.php";
		$data = $_data;
		$this->buildView($view,$data);
	}
	public function buildView($view='',$data='') { 
		build_view($view,$data);
	}
}
?>
