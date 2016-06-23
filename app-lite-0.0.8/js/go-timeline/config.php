<?php
 /*============================================================*/
/*-----	AUTOMATED CONFIGS	 ---------------------------------*/
/*============================================================*/
$site_root ="00_research/00_research/timelineGo";
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