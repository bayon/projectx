<?php 
include_once('mySQLi.model.php');

class monkey extends Model  { 

	private $id;
	private $name;
	private $parent_id;
	private $related_id;
	private $parent_class;
	private $created;
	private $modified;
	private $author_id;

	function __construct(){
		parent::__construct();
	} 
	public function model_connect() {
		return parent::connect();
	}
	function init($id,$name,$parent_id,$related_id,$parent_class,$created,$modified,$author_id){
		$this -> id = $id;
		$this -> name = $name;
		$this -> parent_id = $parent_id;
		$this -> related_id = $related_id;
		$this -> parent_class = $parent_class;
		$this -> created = $created;
		$this -> modified = $modified;
		$this -> author_id = $author_id;
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
	public function set_parent_id($parent_id){
		$this -> parent_id = $parent_id;
	}
	public function get_parent_id(){
		return $this -> parent_id; 
	}
	public function set_related_id($related_id){
		$this -> related_id = $related_id;
	}
	public function get_related_id(){
		return $this -> related_id; 
	}
	public function set_parent_class($parent_class){
		$this -> parent_class = $parent_class;
	}
	public function get_parent_class(){
		return $this -> parent_class; 
	}
	public function set_created($created){
		$this -> created = $created;
	}
	public function get_created(){
		return $this -> created; 
	}
	public function set_modified($modified){
		$this -> modified = $modified;
	}
	public function get_modified(){
		return $this -> modified; 
	}
	public function set_author_id($author_id){
		$this -> author_id = $author_id;
	}
	public function get_author_id(){
		return $this -> author_id; 
	}

//---USE CASE (instantiate via POST array)---------------
//$monkey = new monkey( $_POST['id'], $_POST['name'], $_POST['parent_id'], $_POST['related_id'], $_POST['parent_class'], $_POST['created'], $_POST['modified'], $_POST['author_id']); 

	 
	public function read($return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".monkey ;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} 
	 
	public function read_id($id = "",$return = "") {
		$con = $this -> model_connect();
		$sql = " SELECT * FROM " . $this -> getDatabase() . ".monkey WHERE id='.$_data;";
		$data = $this -> exe_sql($con, $sql, $return);
		return $data;
	 
	} public function read_ModelKV($model='',$k = '',$v='',$return = '') { 
  		$con = $this -> model_connect(); 
    		$sql = ' SELECT * FROM ' . $this -> getDatabase() . '.' . $model . ' WHERE ' . $k . '=' . $v . '; ';  
   		$data = $this -> exe_sql($con, $sql, $return);  
   		return $data; 
    	} 
   
//---SQL INSERT -------------------------------

	 
	function create($monkey,$return = "json") {
		$con = $this -> model_connect();
		$sql = "INSERT INTO ".$this -> getDatabase().".monkey (id,name,parent_id,related_id,parent_class,created,modified,author_id)
		VALUES( null , '".$monkey->get_name()."' , '".$monkey->get_parent_id()."' , '".$monkey->get_related_id()."' , '".$monkey->get_parent_class()."' , '".$monkey->get_created()."' , '".$monkey->get_modified()."' , '".$monkey->get_author_id()."' );"; 
	$data = $this -> exe_sql($con,$sql, $return);
		 // in the case of an insert , the return data will be the "last id inserted".
		echo($data);
	 
	 } 
	 function update($monkey,$return = "json") {
		$con = $this -> model_connect();
		$sql = "UPDATE ".$this -> getDatabase().".monkey set id = '".$monkey->get_id()."' , name = '".$monkey->get_name()."' , parent_id = '".$monkey->get_parent_id()."' , related_id = '".$monkey->get_related_id()."' , parent_class = '".$monkey->get_parent_class()."' , created = '".$monkey->get_created()."' , modified = '".$monkey->get_modified()."' , author_id = '".$monkey->get_author_id()."'  WHERE id = ".$monkey->get_id()."";	
		$data = $this -> exe_sql($con, $sql, $return);
 		echo($data);
	}
	 
	function delete($monkey,$return = "json"){
		$con = $this -> model_connect();
		$sql = "DELETE FROM " . $this -> getDatabase() . ".monkey WHERE id = " . $monkey -> get_id() . "  ;";
		$data = $this -> exe_sql($con, $sql, $return);
		echo($data);
	}
	function create_table_monkey(){
		$con = $this -> model_connect();
		$sql = " CREATE TABLE IF NOT EXISTS `monkey` (`id` bigint(20) NOT NULL AUTO_INCREMENT, PRIMARY KEY(`id`), `name`  varchar(20) NOT NULL, `parent_id`  varchar(20) NOT NULL, `related_id`  varchar(20) NOT NULL, `parent_class`  varchar(20) NOT NULL, `created`  varchar(20) NOT NULL, `modified`  varchar(20) NOT NULL, `author_id`  varchar(20) NOT NULL)
		 ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='viaCodeWriter' AUTO_INCREMENT=1 ; " ;

		$data = $this -> exe_sql($con, $sql, $return);
}
	 }
?>

