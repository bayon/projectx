<?php 
include_once('mySQLi.model.php');

class foo extends Model  { 

	private $element;
	private $id;
	private $name;
	private $value;
	private $placeholder;
	private $classList;
	private $text;
	private $eventType;
	private $src;
	private $height;
	private $width;
	private $href;
	private $target;
	private $type;
	private $method;
	private $action;
	private $data;

	function __construct(){
		parent::__construct();
	} 
	public function model_connect() {
		return parent::connect();
	}
	function init($element,$id,$name,$value,$placeholder,$classList,$text,$eventType,$src,$height,$width,$href,$target,$type,$method,$action,$data){
		$this -> element = $element;
		$this -> id = $id;
		$this -> name = $name;
		$this -> value = $value;
		$this -> placeholder = $placeholder;
		$this -> classList = $classList;
		$this -> text = $text;
		$this -> eventType = $eventType;
		$this -> src = $src;
		$this -> height = $height;
		$this -> width = $width;
		$this -> href = $href;
		$this -> target = $target;
		$this -> type = $type;
		$this -> method = $method;
		$this -> action = $action;
		$this -> data = $data;
	} 
	public function set_element($element){
		$this -> element = $element;
	}
	public function get_element(){
		return $this -> element; 
	}
	public function set_id($id){
		$this -> id = $id;
	}
	public function get_id(){
		return $this -> id; 
	}
	public function set_name($name){
		$this -> name = $name;
	}
	public function get_name(){
		return $this -> name; 
	}
	public function set_value($value){
		$this -> value = $value;
	}
	public function get_value(){
		return $this -> value; 
	}
	public function set_placeholder($placeholder){
		$this -> placeholder = $placeholder;
	}
	public function get_placeholder(){
		return $this -> placeholder; 
	}
	public function set_classList($classList){
		$this -> classList = $classList;
	}
	public function get_classList(){
		return $this -> classList; 
	}
	public function set_text($text){
		$this -> text = $text;
	}
	public function get_text(){
		return $this -> text; 
	}
	public function set_eventType($eventType){
		$this -> eventType = $eventType;
	}
	public function get_eventType(){
		return $this -> eventType; 
	}
	public function set_src($src){
		$this -> src = $src;
	}
	public function get_src(){
		return $this -> src; 
	}
	public function set_height($height){
		$this -> height = $height;
	}
	public function get_height(){
		return $this -> height; 
	}
	public function set_width($width){
		$this -> width = $width;
	}
	public function get_width(){
		return $this -> width; 
	}
	public function set_href($href){
		$this -> href = $href;
	}
	public function get_href(){
		return $this -> href; 
	}
	public function set_target($target){
		$this -> target = $target;
	}
	public function get_target(){
		return $this -> target; 
	}
	public function set_type($type){
		$this -> type = $type;
	}
	public function get_type(){
		return $this -> type; 
	}
	public function set_method($method){
		$this -> method = $method;
	}
	public function get_method(){
		return $this -> method; 
	}
	public function set_action($action){
		$this -> action = $action;
	}
	public function get_action(){
		return $this -> action; 
	}
	public function set_data($data){
		$this -> data = $data;
	}
	public function get_data(){
		return $this -> data; 
	}

//---USE CASE (instantiate via POST array)---------------
//$foo = new foo( $_POST['element'], $_POST['id'], $_POST['name'], $_POST['value'], $_POST['placeholder'], $_POST['classList'], $_POST['text'], $_POST['eventType'], $_POST['src'], $_POST['height'], $_POST['width'], $_POST['href'], $_POST['target'], $_POST['type'], $_POST['method'], $_POST['action'], $_POST['data']); 

	 
	public function read($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".foo ;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	 
	public function read_id($id = "",$return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".foo WHERE id='.$_data;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} public function read_ModelKV($model='',$k = '',$v='',$return = '') { 
  		$con = $this -> model_connect(); 
    		$sql = ' SELECT * FROM ' . $this -> getDatabase() . '.' . $model . ' WHERE ' . $k . '=' . $v . '; ';  
   		$data = $this -> exe_sql($con, $sql, $return);  
   		return $data; 
    	} 
   
//---SQL INSERT -------------------------------

	 
	function create($foo,$return = "json") {
		$con = $this -> model_connect();
		$sql = "INSERT INTO ".$this -> getDatabase().".foo (element,id,name,value,placeholder,classList,text,eventType,src,height,width,href,target,type,method,action,data)
		VALUES('".$foo->get_element()."' , '".$foo->get_id()."' , '".$foo->get_name()."' , '".$foo->get_value()."' , '".$foo->get_placeholder()."' , '".$foo->get_classList()."' , '".$foo->get_text()."' , '".$foo->get_eventType()."' , '".$foo->get_src()."' , '".$foo->get_height()."' , '".$foo->get_width()."' , '".$foo->get_href()."' , '".$foo->get_target()."' , '".$foo->get_type()."' , '".$foo->get_method()."' , '".$foo->get_action()."' , '".$foo->get_data()."' );"; 
	$data = $this -> exe_sql($con,$sql, $return);
		 // in the case of an insert , the return data will be the "last id inserted".
		echo($data);
	 
	 } 
	 function update($foo,$return = "json") {
		$con = $this -> model_connect();
		$sql = "UPDATE ".$this -> getDatabase().".foo set element = '".$foo->get_element()."' , id = '".$foo->get_id()."' , name = '".$foo->get_name()."' , value = '".$foo->get_value()."' , placeholder = '".$foo->get_placeholder()."' , classList = '".$foo->get_classList()."' , text = '".$foo->get_text()."' , eventType = '".$foo->get_eventType()."' , src = '".$foo->get_src()."' , height = '".$foo->get_height()."' , width = '".$foo->get_width()."' , href = '".$foo->get_href()."' , target = '".$foo->get_target()."' , type = '".$foo->get_type()."' , method = '".$foo->get_method()."' , action = '".$foo->get_action()."' , data = '".$foo->get_data()."'  WHERE id = ".$foo->get_id()."";	
		$data = $this -> exe_sql($con, $sql, $return);
 		echo($data);
	}
	 
	function delete($foo,$return = "json"){
		$con = $this -> model_connect();
		$sql = "DELETE FROM " . $this -> getDatabase() . ".foo WHERE id = " . $foo -> get_id() . "  ;";
		$data = $this -> exe_sql($con, $sql, $return);
		echo($data);
	}
	function create_table_foo(){
		$con = $this -> model_connect();
		$sql = " CREATE TABLE IF NOT EXISTS `foo` (`element` bigint(20) NOT NULL AUTO_INCREMENT, PRIMARY KEY(`element`), `id`  varchar(20) NOT NULL, `name`  varchar(20) NOT NULL, `value`  varchar(20) NOT NULL, `placeholder`  varchar(20) NOT NULL, `classList`  varchar(20) NOT NULL, `text`  varchar(20) NOT NULL, `eventType`  varchar(20) NOT NULL, `src`  varchar(20) NOT NULL, `height`  varchar(20) NOT NULL, `width`  varchar(20) NOT NULL, `href`  varchar(20) NOT NULL, `target`  varchar(20) NOT NULL, `type`  varchar(20) NOT NULL, `method`  varchar(20) NOT NULL, `action`  varchar(20) NOT NULL, `data`  varchar(20) NOT NULL)
		 ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=1 ; " ;

		$data = $this -> exe_sql($con, $sql, $return);
}
	 }
?>

