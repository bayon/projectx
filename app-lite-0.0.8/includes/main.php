<?php
include_once('./config.php');
include_once('./constants.php');
//include_once('./code_reporter.php');
include_once('views/view_helper.php');

include_once('controllers/main.controller.php');
require_once "includes/controllers/admin.controller.php";

include_once('models/mySQLi.model.php');
require_once "includes/models/admin.model.php";
 

 
 //assets
 

// CODE WRITER INCLUDES:
  

require_once "includes/controllers/apple.controller.php";
require_once "includes/models/apple.model.php";
require_once "includes/controllers/banana.controller.php";
require_once "includes/models/banana.model.php";
require_once "includes/controllers/canalope.controller.php";
require_once "includes/models/canalope.model.php";