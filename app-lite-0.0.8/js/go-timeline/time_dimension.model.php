<?php 
include_once('mySQLi.model.php');

class time_dimension extends Model  { 

	private $id;
	private $db_date;
	private $year;
	private $month;
	private $day;
	private $quarter;
	private $week;
	private $day_name;
	private $month_name;
	private $holiday_flag;
	private $weekend_flag;
	private $event;
	private $event_id;

	function __construct(){
		parent::__construct();
	} 
	public function model_connect() {
		return parent::connect();
	}
	function init($id,$db_date,$year,$month,$day,$quarter,$week,$day_name,$month_name,$holiday_flag,$weekend_flag,$event,$event_id){
		$this -> id = $id;
		$this -> db_date = $db_date;
		$this -> year = $year;
		$this -> month = $month;
		$this -> day = $day;
		$this -> quarter = $quarter;
		$this -> week = $week;
		$this -> day_name = $day_name;
		$this -> month_name = $month_name;
		$this -> holiday_flag = $holiday_flag;
		$this -> weekend_flag = $weekend_flag;
		$this -> event = $event;
		$this -> event_id = $event_id;
	} 
	public function set_id($id){
		$this -> id = $id;
	}
	public function get_id(){
		return $this -> id; 
	}
	public function set_db_date($db_date){
		$this -> db_date = $db_date;
	}
	public function get_db_date(){
		return $this -> db_date; 
	}
	public function set_year($year){
		$this -> year = $year;
	}
	public function get_year(){
		return $this -> year; 
	}
	public function set_month($month){
		$this -> month = $month;
	}
	public function get_month(){
		return $this -> month; 
	}
	public function set_day($day){
		$this -> day = $day;
	}
	public function get_day(){
		return $this -> day; 
	}
	public function set_quarter($quarter){
		$this -> quarter = $quarter;
	}
	public function get_quarter(){
		return $this -> quarter; 
	}
	public function set_week($week){
		$this -> week = $week;
	}
	public function get_week(){
		return $this -> week; 
	}
	public function set_day_name($day_name){
		$this -> day_name = $day_name;
	}
	public function get_day_name(){
		return $this -> day_name; 
	}
	public function set_month_name($month_name){
		$this -> month_name = $month_name;
	}
	public function get_month_name(){
		return $this -> month_name; 
	}
	public function set_holiday_flag($holiday_flag){
		$this -> holiday_flag = $holiday_flag;
	}
	public function get_holiday_flag(){
		return $this -> holiday_flag; 
	}
	public function set_weekend_flag($weekend_flag){
		$this -> weekend_flag = $weekend_flag;
	}
	public function get_weekend_flag(){
		return $this -> weekend_flag; 
	}
	public function set_event($event){
		$this -> event = $event;
	}
	public function get_event(){
		return $this -> event; 
	}
	public function set_event_id($event_id){
		$this -> event_id = $event_id;
	}
	public function get_event_id(){
		return $this -> event_id; 
	}

//---USE CASE (instantiate via POST array)---------------
//$time_dimension = new time_dimension( $_POST['id'], $_POST['db_date'], $_POST['year'], $_POST['month'], $_POST['day'], $_POST['quarter'], $_POST['week'], $_POST['day_name'], $_POST['month_name'], $_POST['holiday_flag'], $_POST['weekend_flag'], $_POST['event'], $_POST['event_id']); 

	 
	public function read($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".time_dimension WHERE db_date BETWEEN '2015-12-30' AND  '2016-02-30' ORDER BY db_date LIMIT 360;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	public function readDaysDateRange($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".time_dimension WHERE db_date BETWEEN '2016-02-01' AND  '2016-02-29' ORDER BY db_date LIMIT 360;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	public function readDaysMax($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".time_dimension WHERE db_date BETWEEN '2015-11-01' AND  '2016-03-01' ORDER BY db_date LIMIT 360;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	public function readMonths($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".time_dimension WHERE  day = '1'   ORDER BY db_date LIMIT 25;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	public function readYears($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT  DISTINCT year FROM " . $this -> getDatabase() . ".time_dimension LIMIT 25  ;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	
	public function readEventsAndDates($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT timelineevent.id,event_description,event_img,event_name,date_timestamp, db_date,year,day_name,month_name FROM  " . $this -> getDatabase() . ".timelineevent LEFT JOIN  " . $this -> getDatabase() . ".time_dimension ON timelineevent.date_timestamp=time_dimension.db_date     ;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	/*
	 * LEFT JOIN:
	 * SELECT column_name(s)
		FROM table1
		LEFT JOIN table2
		ON table1.column_name=table2.column_name;
	 * 
	 * 
	 * //1) YES 
	 * SELECT timelineevent.id,event_description,event_img,date_timestamp, db_date,year,day_name,month_name 
FROM timelineevent
LEFT JOIN time_dimension
ON timelineevent.date_timestamp=time_dimension.db_date;
	 * 
	 * 
	 * 
	 * 
	 */
	 
	public function read_id($id = "",$return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".time_dimension WHERE id='.$_data;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
//---SQL INSERT -------------------------------

	 
	function create($time_dimension,$return = "json") {
		$con = $this -> model_connect();
		$sql = "INSERT INTO ".$this -> getDatabase().".time_dimension (id,db_date,year,month,day,quarter,week,day_name,month_name,holiday_flag,weekend_flag,event,event_id)
		VALUES('".$time_dimension->get_id()."' , '".$time_dimension->get_db_date()."' , '".$time_dimension->get_year()."' , '".$time_dimension->get_month()."' , '".$time_dimension->get_day()."' , '".$time_dimension->get_quarter()."' , '".$time_dimension->get_week()."' , '".$time_dimension->get_day_name()."' , '".$time_dimension->get_month_name()."' , '".$time_dimension->get_holiday_flag()."' , '".$time_dimension->get_weekend_flag()."' , '".$time_dimension->get_event()."' , '".$time_dimension->get_event_id()."' );"; 
	$data = $this -> exe_sql($con,$sql, $return);
		 // in the case of an insert , the return data will be the "last id inserted".
		echo($data);
	 
	 } 
	 function update($time_dimension,$return = "json") {
		$con = $this -> model_connect();
		$sql = "UPDATE ".$this -> getDatabase().".time_dimension set id = '".$time_dimension->get_id()."' , db_date = '".$time_dimension->get_db_date()."' , year = '".$time_dimension->get_year()."' , month = '".$time_dimension->get_month()."' , day = '".$time_dimension->get_day()."' , quarter = '".$time_dimension->get_quarter()."' , week = '".$time_dimension->get_week()."' , day_name = '".$time_dimension->get_day_name()."' , month_name = '".$time_dimension->get_month_name()."' , holiday_flag = '".$time_dimension->get_holiday_flag()."' , weekend_flag = '".$time_dimension->get_weekend_flag()."' , event = '".$time_dimension->get_event()."' , event_id = '".$time_dimension->get_event_id()."'  WHERE id = ".$time_dimension->get_id()."";	
		$data = $this -> exe_sql($con, $sql, $return);
 		echo($data);
	}
	 
	function delete($time_dimension,$return = "json"){
		$con = $this -> model_connect();
		$sql = "DELETE FROM " . $this -> getDatabase() . ".time_dimension WHERE id = " . $time_dimension -> get_id() . "  ;";
		$data = $this -> exe_sql($con, $sql, $return);
		echo($data);
	}
	function create_table_Time_dimension(){
		$con = $this -> model_connect();
		$sql = " CREATE TABLE IF NOT EXISTS `time_dimension` (`id` bigint(20) NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`), `db_date`  varchar(20) NOT NULL, `year`  varchar(20) NOT NULL, `month`  varchar(20) NOT NULL, `day`  varchar(20) NOT NULL, `quarter`  varchar(20) NOT NULL, `week`  varchar(20) NOT NULL, `day_name`  varchar(20) NOT NULL, `month_name`  varchar(20) NOT NULL, `holiday_flag`  varchar(20) NOT NULL, `weekend_flag`  varchar(20) NOT NULL, `event`  varchar(20) NOT NULL, `event_id`  varchar(20) NOT NULL)
		 ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=1 ; " ;

		$data = $this -> exe_sql($con, $sql, $return);
}
	 }
?>

