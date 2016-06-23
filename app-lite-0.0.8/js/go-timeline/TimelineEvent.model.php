<?php 
include_once('mySQLi.model.php');

class TimelineEvent extends Model  { 

	private $id;
	private $event_name;
	private $event_img;
	private $event_description;
	private $date_timestamp;

	function __construct(){
		parent::__construct();
	} 
	public function model_connect() {
		return parent::connect();
	}
	function init($id,$event_name,$event_img,$event_description,$date_timestamp){
		$this -> id = $id;
		$this -> event_name = $event_name;
		$this -> event_img = $event_img;
		$this -> event_description = $event_description;
		$this -> date_timestamp = $date_timestamp;
	} 
	public function set_id($id){
		$this -> id = $id;
	}
	public function get_id(){
		return $this -> id; 
	}
	public function set_event_name($event_name){
		$this -> event_name = $event_name;
	}
	public function get_event_name(){
		return $this -> event_name; 
	}
	public function set_event_img($event_img){
		$this -> event_img = $event_img;
	}
	public function get_event_img(){
		return $this -> event_img; 
	}
	public function set_event_description($event_description){
		$this -> event_description = $event_description;
	}
	public function get_event_description(){
		return $this -> event_description; 
	}
	public function set_date_timestamp($date_timestamp){
		$this -> date_timestamp = $date_timestamp;
	}
	public function get_date_timestamp(){
		return $this -> date_timestamp; 
	}

//---USE CASE (instantiate via POST array)---------------
//$timelineevent = new TimelineEvent( $_POST['id'], $_POST['event_name'], $_POST['event_img'], $_POST['event_description'], $_POST['date_timestamp']); 

	 
	public function read($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".timelineevent  ORDER BY date_timestamp;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	 
	 
	public function read_id($id = "",$return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".timelineevent WHERE id='.$_data;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
//---SQL INSERT -------------------------------

	 
	function create($timelineevent,$return = "json") {
		//echo('MODEL die');die();
		$con = $this -> model_connect();
		$sql = "INSERT INTO ".$this -> getDatabase().".timelineevent (id,event_name,event_img,event_description,date_timestamp)
		VALUES('".$timelineevent->get_id()."' , '".$timelineevent->get_event_name()."' , '".$timelineevent->get_event_img()."' , '".$timelineevent->get_event_description()."' , '".$timelineevent->get_date_timestamp()."' );"; 
	$data = $this -> exe_sql($con,$sql, $return);
		 // in the case of an insert , the return data will be the "last id inserted".
		echo($data);
		//echo($sql);
	 
	 } 
	 function update($timelineevent,$return = "json") {
		$con = $this -> model_connect();
		$sql = "UPDATE ".$this -> getDatabase().".timelineevent set id = '".$timelineevent->get_id()."' , event_name = '".$timelineevent->get_event_name()."' , event_img = '".$timelineevent->get_event_img()."' , event_description = '".$timelineevent->get_event_description()."' , date_timestamp = '".$timelineevent->get_date_timestamp()."'  WHERE id = ".$timelineevent->get_id()."";	
		$data = $this -> exe_sql($con, $sql, $return);
 		echo($data);
	}
	 
	function delete($timelineevent,$return = "json"){
		$con = $this -> model_connect();
		$sql = "DELETE FROM " . $this -> getDatabase() . ".timelineevent WHERE id = " . $timelineevent -> get_id() . "  ;";
		$data = $this -> exe_sql($con, $sql, $return);
		echo($data);
	}
	function create_table_TimelineEvent(){
		$con = $this -> model_connect();
		$sql = " CREATE TABLE IF NOT EXISTS `timelineevent` (`id` bigint(20) NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`), `event_name`  varchar(20) NOT NULL, `event_img`  varchar(20) NOT NULL, `event_description`  varchar(20) NOT NULL, `date_timestamp`  varchar(20) NOT NULL)
		 ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=1 ; " ;

		$data = $this -> exe_sql($con, $sql, $return);
	}
}
?>

