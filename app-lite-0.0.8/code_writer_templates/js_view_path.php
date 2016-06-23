<?php

//unset($view_new__final_filepath);
	$directory = "./" . $objectName . "/";
	if($appropriateDirectory){
	 $directory = "includes/views/". $objectName . "/";
	}
	$js_view_final_path = $OS_FILE_PATH . $directory .=  "RELATED_DATA.js";
	//echo("\n\$view_new__final_filepath: ".$view_new__final_filepath);
	echo($js_view_final_path);
	//---WRITE
	$fp = fopen($js_view_final_path, "w") or die("Couldn't open $js_view_final_path");
	//array of properties to comma separated parameters
	//$arrayOfPropertiesToString = implode(',', $arrayOfProperties);
	
	?>