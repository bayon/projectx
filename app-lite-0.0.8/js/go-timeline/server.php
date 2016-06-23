<?php
//session start
session_start();
//echo(__FILE__); //die();
// Turn off error reporting
//error_reporting(0);

// Report runtime errors
//error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
//ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
//error_reporting(E_ALL & ~E_NOTICE);

//main includes
	// config, constants, ajax_config
include_once('main.php');

if(isset($_POST['c']) && isset($_POST['m'])){
	//print_r($_POST);die();
	$_data = $_POST;
	${'controller'} = $_POST['c'];
	${'m'} = $_POST['m'];
	$c = new $controller();
	$res = call_user_func( array( $c, $m ),$_data );
	echo($res);
}else if(isset($_GET['c']) && isset($_GET['m'])){
	$_data = $_GET;
	echo("<script>var controller = '".$_GET['c']."' ;</script>"); 
	
	${'controller'} = $_GET['c'];
	${'m'} = $_GET['m'];
	$c = new $controller();
	
	if(isset($_GET['id'])){
		$res = call_user_func_array( array( $c, $m ),array($_GET['id']) );//,$_data
		echo($res); 
	}else{
		$res = call_user_func( array( $c, $m ),$_data);
	}
	echo($res);
}else{
	echo("<script>var controller = 'main_controller' ;</script>"); 
	echo('REQUEST IS NOT SET');
	echo($_SERVER['QUERY_STRING']);
	parse_str($_SERVER['QUERY_STRING']);
	//echo($controller);
	echo('oops');
	build_view('server.php');
}
?>