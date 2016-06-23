<?php
 /*============================================================*/
/*-----	AUTOMATED CONFIGS	 ---------------------------------*/
/*============================================================*/
//HOME: 
$site_root ="app-lite/app-lite-0.0.8";
//STORY AVE: $site_root ="00_research/app-lite/app-lite-0.0.6";
//$site_root ="00_research/app-lite/app-lite-0.0.7";
define('BASE_PATH', realpath(dirname(__FILE__)));
$domain = $_SERVER['HTTP_HOST'];
$hostname = $domain . "/" . $site_root . "/";
define('BASE_URL', 'http://' . $hostname . '');



//echo("<br>".BASE_PATH);
//echo("<br>".BASE_URL);
/*
//HEAD_CSS
$_GLOBAL['css'][] = "style.css";
//HEAD_JS
$_GLOBAL['js'][] = "ajax.js";
$_GLOBAL['js'][] = "jquery-1.11.2.min.js";
 * 
 */
?>