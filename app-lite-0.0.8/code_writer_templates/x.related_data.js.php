<?php
//  L E F T   O F F   H E R E  
//todo: 3/7/2016: need to be able to add records from a parent class to a child class.ie. labor to tasks, materials to items.
// NEED TO DO THIS FOR EACH ONE...may need different filenames or file paths...
   $max = count($arrayOfRelatedTables);
   //HOST FILES UNDER THEIR MAIN DATA RELATION
  
	for ($x = 0; $x < $max; $x++) {
		//fputs($fp,"html += '<td>' + row.".$arrayOfRelatedTables[$x]." + '</td>';\n ");
		//fputs($fp, " <script src='includes/views/".strtolower($objectName)."/".$arrayOfRelatedTables[$x].".js'></script> \n");
	 $directory = "./" . $objectName . "/";
   if($appropriateDirectory){
	 $directory = "includes/views/". $objectName . "/";
	}
 	//Create the file name
	$js_view_final_path = $OS_FILE_PATH . $directory .= "". $arrayOfRelatedTables[$x].".js";
	// write to that file
	$fp = fopen($js_view_final_path, "w") or die("Couldn't open $js_view_final_path");
	 
	fwrite($fp, "function read_". strtolower($arrayOfRelatedTables[$x])."_ByThisId(id){ \n ");
	fputs($fp, "	\$('#details_content').fadeIn('fast'); \n ");
	fputs($fp, "	\$('.rd_tab').removeClass('active'); \n ");
	fputs($fp, "	\$('#data_tab1').addClass('active'); \n ");
	fputs($fp, "	current_parent_id = id;	 \n ");
	fputs($fp, "	console.log('read_". strtolower($arrayOfRelatedTables[$x])."_By_THIS_ID'); \n ");
	fputs($fp, "	//read_ModelKV(\$_data)  \n ");
	fputs($fp, "	 var dataString = \"c=". strtolower($arrayOfRelatedTables[$x])."_controller&m=read_ModelKV&model=". strtolower($arrayOfRelatedTables[$x])."&k=related_id&v=\"+id+\"&data_only=true\"; \n ");
	fputs($fp, "	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, read_". strtolower($arrayOfRelatedTables[$x])."_By_THIS_ID_callback); \n ");
	fputs($fp, "}	 \n ");
	fputs($fp, "function read_". strtolower($arrayOfRelatedTables[$x])."_By_THIS_ID_callback(data){ \n ");
	fputs($fp, "	console.log('read_". strtolower($arrayOfRelatedTables[$x])."_By_THIS_ID_callback'); \n ");
	fputs($fp, "	var obj =JSON.parse(data); \n ");
	fputs($fp, "	console.log(obj); \n ");
	fputs($fp, "	format_". strtolower($arrayOfRelatedTables[$x])."(obj); \n ");
	fputs($fp, "} 	 \n ");
	fputs($fp, "function format_". strtolower($arrayOfRelatedTables[$x])."(obj) { \n ");
	fputs($fp, "	var ". strtolower($arrayOfRelatedTables[$x])."_tally = 0;\n ");
	fputs($fp, "	console.log(obj);\n ");
	fputs($fp, "	var html = \"\";\n ");
	/*fputs($fp, "	html += \"<a href='#' onclick='addNew_". strtolower($arrayOfRelatedTables[$x])."()'>Add _". strtolower($arrayOfRelatedTables[$x])."</a>\";\n ");
	fputs($fp, "	html += \"<div id='add_". strtolower($arrayOfRelatedTables[$x])."_form' class='hidden_form'  >\";\n ");
	fputs($fp, "	html += \"<div class='ui_wrapper'><div id='row_create_". strtolower($arrayOfRelatedTables[$x])."' >\";\n ");
	fputs($fp, "	html += \"<div class='panel_field'><input type='hidden' id='id'  name='id' class='info' value='' /></div>\";\n ");
	fputs($fp, "	html += \"<div class='panel_field'>name:<input type='text' id='name'  name='name' class='info' value='' /></div>\";\n ");
	fputs($fp, "	html += \"<div class='panel_field'><input type='hidden' id='parent_id'  name='parent_id' class='info' value='\" + current_parent_id + \"' /></div>\";\n ");
	fputs($fp, "	html += \"<div class='panel_field'><a href='#' onclick='save_create_". strtolower($arrayOfRelatedTables[$x])."();' class='panel_anchor'>save</a></div>\";\n ");
	fputs($fp, "	html += \"<div class='panel_field'><a href='#' onclick='cancel_create_". strtolower($arrayOfRelatedTables[$x])."();' class='panel_anchor'>cancel</a></div>\";\n ");
	fputs($fp, "	html += \"</div></div>\";\n ");
	fputs($fp, "	html += \"</div>\";\n ");*/
	fputs($fp, "	html +=\"<div class='row'>\";//class = subtotal_table_wrapper\n ");
	fputs($fp, "	html += \"<div class='col-md-12'>\";\n ");
	 fputs($fp, " html += \"<div id='details_actions'>details actions</div>\" \n  ");
	fputs($fp, "	html +=\"<table class='subtotal_table' border=1 >\";\n ");
	fputs($fp, "	//HIDDEN HEADERS: <th>parent_id</th>\n ");
	fputs($fp, "	html +=\"<tr><th>ID</th><th>Name</th><th>parent_id</th><th>Actions</th></tr>\";\n ");
	fputs($fp, "	//LOOP LIST OF ITEMS\n ");
	fputs($fp, "	for (var i = 0; i < obj.length; i++) {\n ");
	fputs($fp, "		html += \"<tr>\";\n ");
	fputs($fp, "		html += \" <td width='10%' >\" + obj[i].id +\"</td>\";\n ");
	fputs($fp, "		html += \" <td>\" + obj[i].name+\"</td>\";\n ");
	fputs($fp, "		html += \" <td>\" + obj[i].parent_id+\"</td>\";\n ");
	fputs($fp, "		html += \" <td>\";\n ");
	fputs($fp, "		html += \"<button id='\" + obj[i].id +\"' class='action_button' onclick='". strtolower($arrayOfRelatedTables[$x])."_ACTION(this);' value='delete' >Delete</button>\";\n ");
	fputs($fp, "		html += \"</td>\";\n ");
	fputs($fp, "		html += \"</tr>\";\n ");
	fputs($fp, "	}\n ");
	fputs($fp, "	 \n ");
	fputs($fp, "	html += \"</table>\";\n ");
	fputs($fp, "	html += \"</div>\";\n ");
	fputs($fp, "	html += \"</div>\";\n ");
	fputs($fp, "	\$('#details_content').html(html);\n ");
	
	fputs($fp," //row_create_item"); 
fputs($fp,"    var html = \"<div class='panel_wrapper'><div id='row_create_item' >\"; \n "); 
fputs($fp,"        html += \"<select id='related_id'  name='related_id' class='info'>\";  \n   "); 
fputs($fp,"            for(var i = 0; i <= o_relatedData.length; i++){  \n  "); 
fputs($fp,"                if(typeof o_relatedData[i] != 'undefined'){   \n  "); 
fputs($fp,"                    html += \"<option value=\"+o_relatedData[i]['id'];   \n  "); 
fputs($fp,"                    html +=\" >\"+o_relatedData[i]['name']+\"</option>\";  \n   "); 
fputs($fp,"                }         \n  "); 
fputs($fp,"            }   \n  "); 
fputs($fp,"            html += '</select>';   \n "); 
fputs($fp,"            html += \" <input type='hidden' id='app_id'  name='app_id' class='info' value=''    /> \";  \n  "); 
fputs($fp,"           \n  "); 
fputs($fp,"         \n  "); 
fputs($fp,"    //save_create_item  \n "); 
fputs($fp,"            html +=\"<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_create_item();' >save</button>\";  \n  "); 
fputs($fp,"            html +=\"<button type='button' class='btn btn-default' data-dismiss='modal'  >cancel</button>\";   \n  "); 
fputs($fp,"           html +=\"</div></div>\";  \n  "); 
fputs($fp,"        $('#details_actions').html(html);  \n  ");
	
	
	
	
	
	fputs($fp, "}\n ");
	
	fputs($fp," function nameByRelatedId(id){ \n "); 
fputs($fp,"    var name = null; \n "); 
fputs($fp,"    for (var i = 0; i <= o_relatedData.length; i++) { \n "); 
fputs($fp,"        if ( typeof o_relatedData[i] != \"undefined\") { \n "); 
fputs($fp,"            if (o_relatedData[i]['id'] == id){ \n "); 
fputs($fp,"                name = o_relatedData[i]['name']; \n "); 
fputs($fp,"            } \n "); 
fputs($fp,"        } \n "); 
fputs($fp,"    } \n "); 
fputs($fp,"    return name; \n "); 
fputs($fp," } \n  "); 
	
	
	
	fputs($fp, "function ". strtolower($arrayOfRelatedTables[$x])."_ACTION(obj){\n ");
	fputs($fp, "	if(obj.value == \"delete\"){\n ");
	fputs($fp, "		delete_". strtolower($arrayOfRelatedTables[$x])."(obj.id);\n ");
	fputs($fp, "	}\n ");
	fputs($fp, "}\n ");
	fputs($fp, "function cancel_create_". strtolower($arrayOfRelatedTables[$x])."(){\n ");
	fputs($fp, "	\$('#details_content').fadeOut('slow');\n ");
	fputs($fp, "}\n ");
	fputs($fp, "function addNew_". strtolower($arrayOfRelatedTables[$x])."(){\n ");
	fputs($fp, "	\$(\"#add_". strtolower($arrayOfRelatedTables[$x])."_form\").css('display','block');\n ");
	fputs($fp, "}\n ");
	fputs($fp, "function submitNew_". strtolower($arrayOfRelatedTables[$x])."(){\n ");
	fputs($fp, "	var dataString = \"c=". strtolower($arrayOfRelatedTables[$x])."_controller&m=createEmptyForWorkOrderId&id=\"+current_parent_id+\"\";\n ");
	fputs($fp, "	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, addNew_". strtolower($arrayOfRelatedTables[$x])."_callback);\n ");
	fputs($fp, "}\n ");
	fputs($fp, "function addNew_". strtolower($arrayOfRelatedTables[$x])."_callback(data){\n ");
	fputs($fp, "	console.log(data);\n ");
	fputs($fp, "}\n ");
	fputs($fp, "function save_create_". strtolower($arrayOfRelatedTables[$x])."() {\n ");
	fputs($fp, "	var data = {};\n ");
	fputs($fp, "	\$.each(\$('#row_create_". strtolower($arrayOfRelatedTables[$x])." .info'), function(i, e) {\n ");
	fputs($fp, "		switch(e.name) {\n ");
	fputs($fp, "\n ");
	fputs($fp, "			case 'id':\n ");
	fputs($fp, "				data.id = e.value;\n ");
	fputs($fp, "				break;\n ");
	fputs($fp, "			case 'name':\n ");
	fputs($fp, "				data.name = e.value;\n ");
	fputs($fp, "				break;\n ");
	fputs($fp, "			case 'parent_id':\n ");
	fputs($fp, "				data.parent_id = e.value;\n ");
	fputs($fp, "				break;\n ");
	fputs($fp," case 'related_id': \n ");  
fputs($fp,"                data.related_id = e.value; \n ");
fputs($fp,"                data.name = nameByRelatedId(data.related_id); \n ");
fputs($fp,"                break; \n ");
	
	
	
	fputs($fp, "			default:\n ");
	fputs($fp, "				//default code block\n ");
	fputs($fp, "				break;\n ");
	fputs($fp, "		}\n ");
	fputs($fp, "	});\n ");
	fputs($fp, "	var params = \$.param(data);\n ");
	fputs($fp, "	var dataString = 'c=". strtolower($arrayOfRelatedTables[$x])."_controller&m=create&' + params;\n ");
	fputs($fp, "	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, create_callback_". strtolower($arrayOfRelatedTables[$x]).");\n ");
	fputs($fp, "}\n ");
	fputs($fp, "\n ");
	fputs($fp, "function create_callback_". strtolower($arrayOfRelatedTables[$x])."(data){	\n ");
	fputs($fp, "	\$('#details_content').fadeOut('slow');\n ");
	fputs($fp, "}\n ");
	fputs($fp, "\n ");
	fputs($fp, "function delete_". strtolower($arrayOfRelatedTables[$x])."(id){\n ");
	fputs($fp, "		if(confirm('Are you sure you want to delete this items?'))\n ");
	fputs($fp, "		{ verify_delete_". strtolower($arrayOfRelatedTables[$x])."(id); } else {  deny(); }\n ");
	fputs($fp, "}\n ");
	fputs($fp, "function verify_delete_". strtolower($arrayOfRelatedTables[$x])."(id) {\n ");
	fputs($fp, "	var data = {};\n ");
	fputs($fp, "	data.id = id;\n ");
	fputs($fp, "	var dataString = 'c=". strtolower($arrayOfRelatedTables[$x])."_controller&m=delete&id=' + data.id  ;\n ");
	fputs($fp, "	//alert(BASE_URL+'---'+dataString);\n ");
	fputs($fp, "	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, delete_". strtolower($arrayOfRelatedTables[$x])."_callback);\n ");
	fputs($fp, "}\n ");
	fputs($fp, "function delete_". strtolower($arrayOfRelatedTables[$x])."_callback(data){\n ");
	fputs($fp, "	\$('#details_content').fadeOut('slow');\n ");
	fputs($fp, "}\n ");
	
	
	
	
	fclose($fp);
	echo('<h3>RELATED DATA JS VIEW</h3>');
	showCode($js_view_final_path);
 
}

?>