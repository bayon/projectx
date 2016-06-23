<?php 
require_once("view_paths.php");
fwrite($fp, "<script> \n ");
fputs($fp, "// PARAMETERS ///////////////////////////////////////////////////////////////////////////\n ");
fputs($fp, "var controller = '".strtolower($objectName)."_controller'; \n ");
fputs($fp, "var TABLE_DATA = []; \n ");
fputs($fp, "var itemsPerPage = null;\n ");
fputs($fp, "</script> \n ");

//COLLARS to RELATED_DATA
 $max = count($arrayOfRelatedTables);
	for ($x = 0; $x < $max; $x++) {
		//fputs($fp,"html += '<td>' + row.".$arrayOfRelatedTables[$x]." + '</td>';\n ");
		fputs($fp, " <script src='includes/views/".strtolower($objectName)."/".$arrayOfRelatedTables[$x].".js'></script> \n");
	}
fputs($fp, "<!-- PARENT Class Data  --> \n");
fputs($fp, "<?php  \n");
if(!$hasParentClass){ fputs($fp, "/*  \n"); }
 
fputs($fp, " // IF THIS CLASS HAS PARENT CLASS : \n//1)  get parent data here \n//2) change 'create_btn' to 'create_from_parent_class_btn' \n//3) uncomment that function \n//4) uncomment //data.name = nameByParentId(data.parent_id);  \n");
fputs($fp, " \$parentData = new ".strtolower($parentClass)."(); \n");
fputs($fp, " \$parentData = \$parentData-> read(); \n");
fputs($fp, " \$parentData_json = json_encode(\$parentData); \n");
fputs($fp, " echo(\"<script>  var o_parentData = \".\$parentData_json.\"; </script>\");	 \n");
 
if(!$hasParentClass){ fputs($fp, "*/  \n"); }
fputs($fp, "  ?>  \n");



fputs($fp, "<!-- RELATED Class Data  --> \n");
fputs($fp, "<?php  \n");
if(!$hasRelatedClass){ fputs($fp, "/*  \n"); }
fputs($fp, "//  IF THIS CLASS HAS RELATED CLASS : \n//1)  get related data here   \n");
fputs($fp, " \$relatedData = new ".strtolower($relatedClass)."(); \n");
fputs($fp, " \$relatedData = \$relatedData-> read(); \n");
fputs($fp, " \$relatedData_json = json_encode(\$relatedData); \n");
fputs($fp, " echo(\"<script>  var o_relatedData = \".\$relatedData_json.\"; </script>\");	 \n");
if(!$hasRelatedClass){ fputs($fp, "*/  \n"); }
fputs($fp, "  ?>  \n");


fputs($fp, "<!--  THE MODAL -->\n ");
fputs($fp, "<div style='margin-top:5%;' class='modal fade' id='modal-container-".strtolower($objectName)."' role='dialog' aria-labelledby='myModalLabel' aria-hidden='false'>\n ");
fputs($fp, "	<div class='modal-dialog'>\n ");
fputs($fp, "		<div class='modal-content'>\n ");
fputs($fp, "			<div class='modal-header'>\n ");
fputs($fp, "				<button type='button' class='close' data-dismiss='modal' aria-hidden='false'>\n ");
fputs($fp, "					×\n ");
fputs($fp, "				</button>\n ");
fputs($fp, "				<h4 class='modal-title' id='myModalLabel'> ".strtolower($objectName)." </h4>\n ");
fputs($fp, "			</div>\n ");
fputs($fp, "			<div class='modal-body'>\n ");
fputs($fp, "				...\n ");
fputs($fp, "			</div>\n ");
fputs($fp, "			<div class='modal-footer'>\n ");
fputs($fp, "				<button type='button' class='btn btn-default' data-dismiss='modal'>\n ");
fputs($fp, "					Close\n ");
fputs($fp, "				</button>\n ");
fputs($fp, "			</div>\n ");
fputs($fp, "		</div>\n ");
fputs($fp, "	</div>\n ");
fputs($fp, "</div>\n ");


fputs($fp, "<!--  THE PAGE -->\n ");
fputs($fp, "<div id='template_view_1' class='container animated fadeIn kioview' style='text-align:center;'  >\n ");
//fputs($fp, "	<div class='xxxpagination_page' >\n ");
fputs($fp, "	<div class='row top-row'>\n ");
fputs($fp, "		<div class='col-md-12'>\n ");
// <h2 style='  '>ZONK</h2><button class='create_btn' >+</button>
//CREATE BUTTON CLASS:  'create_btn' to 'create_from_parent_class_btn' 
// L E F T   O F F   H E R E   !!!! untested.

if(!$hasParentClass){
	$createButtonClass='create_btn';
}else{
	$createButtonClass='create_from_parent_class_btn'; 
}
fputs($fp, "			<div id='stage'>\n ");
fputs($fp, "				<div class='tablelite-title-row'><h3>".strtolower($objectName)."<button class='".$createButtonClass."' >+</button> ");
fputs($fp, "					<a id='modal-".strtolower($objectName)."' style='' href='#modal-container-".strtolower($objectName)."' role='button' class='btn invisible' data-toggle='modal'>modal-1</a>\n ");
fputs($fp, "					</h3> ");
fputs($fp, "				</div> ");
fputs($fp, "				<div class='row'>\n ");
 
fputs($fp, "					<div id='tableBody1-pagination' class='tableLiteTBody-pagination'>\n ");
fputs($fp, "								<input type='search' class='light-table-filter' data-table='order-table' placeholder='Filter'>\n ");
fputs($fp, "								<a id='tableBody1-previous' href='#'>\n ");
fputs($fp, "								<button class='table-lite-btn'>\n ");
fputs($fp, "									&laquo; Previous\n ");
fputs($fp, "								</button></a>\n ");
fputs($fp, "								<a id='tableBody1-next' href='#'>\n ");
fputs($fp, "								<button class='table-lite-btn'>\n ");
fputs($fp, "									Next &raquo;\n ");
fputs($fp, "								</button></a>\n ");
fputs($fp, "\n ");
fputs($fp, "								<select id='itemsPerPage' onchange='changeItemsPerPage(this);'>\n ");
fputs($fp, "									<option>10</option>\n ");
fputs($fp, "									<option>25</option>\n ");
fputs($fp, "									<option>50</option>\n ");
fputs($fp, "									<option>100</option>\n ");
fputs($fp, "									<option>500</option>\n ");
fputs($fp, "									<option>1000</option>\n ");
fputs($fp, "								</select>\n ");
fputs($fp, "								<a href = '' >\n ");
fputs($fp, "								<button class='table-lite-btn' >\n ");
fputs($fp, "									refresh\n ");
fputs($fp, "								</button></a>\n ");
fputs($fp, "								<button onclick='tableLiteCheckedRows('table');'>\n ");
fputs($fp, "									handle checked rows\n ");
fputs($fp, "								</button>\n ");
fputs($fp, "					</div>\n ");
fputs($fp, "				</div>\n ");//end of row



fputs($fp, "				<div class='row'>\n ");
fputs($fp, "					<table id='table' class='sortable order-table table layout display responsive-table'>\n ");
fputs($fp, "						<thead>\n ");
fputs($fp, "							<tr id='table_headers'>\n ");
fputs($fp,"									<th></th>");// for the rows checkbox
$max = count($arrayOfProperties);
for ($x = 0; $x < $max; $x++) {
fputs($fp,"									<th>".$arrayOfProperties[$x]."</th>\n");
}
fputs($fp, "							</tr>\n ");
fputs($fp, "						</thead>\n ");
fputs($fp, "						<tbody id='tableBody1' class='tableLiteTBody'>\n ");
fputs($fp, "							<!-- json data inserted here -->\n ");
fputs($fp, "						</tbody>\n ");
fputs($fp, "					</table>\n ");
fputs($fp, "				</div>\n ");

fputs($fp, "			</div>\n ");//end of stage
fputs($fp, "		</div>\n ");
fputs($fp, "	</div>\n ");
fputs($fp, "</div>\n ");
fputs($fp, "\n ");
fputs($fp, "	<!-- BACKGROUND IMAGES -->\n ");
fputs($fp, "	<div id='BG_IMG'>\n ");
fputs($fp, "		&nbsp;\n ");
fputs($fp, "		<!-- <img src='img/sky.jpg'> -->\n ");
fputs($fp, "	</div>\n ");
fputs($fp, "	<div id='BG_IMG_LEFT'>\n ");
fputs($fp, "		&nbsp;\n ");
fputs($fp, "	</div>\n ");
fputs($fp, "	<div id='BG_IMG_RIGHT'>\n ");
fputs($fp, "		&nbsp;\n ");
fputs($fp, "	</div>\n ");
fputs($fp, "	<div id='BG_IMG_TOP'>\n ");
fputs($fp, "		&nbsp;\n ");
fputs($fp, "	</div>\n ");
fputs($fp, "	<!-- end of BACKGROUND IMAGES -->\n ");
fputs($fp, "<script>\n ");

fputs($fp, "function read_ModelKV_callback(data){ \n "); 
fputs($fp, " 	var obj = JSON.parse(data); \n "); 
fputs($fp, " 	console.log(obj); \n "); 
fputs($fp, " } \n "); 
 
fputs($fp,"function getChildren(){ \n "); 
fputs($fp,"   	read_ModelKV('model','key','value'); \n "); 
fputs($fp,"   } \n "); 
fputs($fp,"function read_ModelKV(model,k,v){  \n "); 
fputs($fp,"   	var dataString = 'c='+model+'_controller&m=read_ModelKV&data_only=true&model='+model+'&k='+k+'&v='+v+'';  \n "); 
fputs($fp,"   	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, read_ModelKV_callback);  \n "); 
fputs($fp,"} \n ");

fputs($fp, "function changeItemsPerPage(obj) {\n ");
fputs($fp, "	itemsPerPage = obj.value;\n ");
fputs($fp, "	load_data();\n ");
fputs($fp, "}\n ");
fputs($fp, "function tableLiteCheckedRows_callback(array_of_ids) {\n ");
fputs($fp, "	console.log('table-lite: Loop through these ids and handle them as you will...');\n ");
fputs($fp, "}\n ");
fputs($fp, "$(document).ready(function() {\n ");
fputs($fp, "	itemsPerPage = 10;\n ");
fputs($fp, "	load_data();\n ");
fputs($fp, "});	 \n ");
fputs($fp, "function load_data_callback(data){\n ");
fputs($fp, "	console.log('load data callback fn:');\n ");
fputs($fp, "	var obj = JSON.parse(data);\n ");
fputs($fp, "	TABLE_DATA = obj;\n ");
fputs($fp, "	var rows = [];\n ");
fputs($fp, "		$.each(obj, function(i, row) {\n ");
fputs($fp, "			if ( typeof row == 'object') {\n ");
fputs($fp, "				var html = '';\n ");
if(count($arrayOfRelatedTables) > 0){
	fputs($fp, "				html += \"<tr id=''+row.id+'' onclick='rowClick_drillDown(\"+i+\");' class='data_row' >\";\n ");	
}else{
	fputs($fp, "				html += \"<tr id=''+row.id+'' onclick='rowClick(\"+i+\");' class='data_row' >\";\n ");	
}

fputs($fp, "					html += \"<td><input type='checkbox'  ><input type='hidden' name='id' value='' + row.id + ''></td>\";\n ");
$max = count($arrayOfProperties);
for ($x = 0; $x < $max; $x++) {
	fputs($fp,"						html += '<td>' + row.".$arrayOfProperties[$x]." + '</td>';\n ");
}
fputs($fp, "				html += '</tr>';\n ");
fputs($fp, "				rows.push(html);\n ");
fputs($fp, "			}\n ");
fputs($fp, "		});\n ");
fputs($fp, "		$('#tableBody1').append(rows.join(''));\n ");
fputs($fp, "		$('#tableBody1').paginate({\n ");
fputs($fp, "			itemsPerPage : itemsPerPage\n ");
fputs($fp, "		});\n ");
fputs($fp, "	\n ");
fputs($fp, "};\n ");

fputs($fp, "function load_data(){\n ");
fputs($fp, "	var dataString = \"c=".strtolower($objectName)."_controller&m=readToJSON&data_only=true\";\n ");
fputs($fp, "	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, load_data_callback);\n ");
fputs($fp, "}\n ");

fputs($fp, "	( function() {\n ");
fputs($fp, "			$('#BG_IMG').addClass('gradient6');//be sure to remove unwanted classes before applying a new one.\n ");
fputs($fp, "		}()); \n ");


fputs($fp, "//  POPULATE DETAILS PANEL  /////////////////////////////////////////////////////////////////////////////////\n ");
fputs($fp, "function rowClick(i) {\n ");
fputs($fp, "	document.getElementById('modal-".strtolower($objectName)."').click();\n ");
fputs($fp, "		var html = \"<div class='panel_wrapper'><div id='row_\" + TABLE_DATA[i]['id'] + \"' >\";\n ");
$max = count($arrayOfProperties);
for ($x = 0; $x < $max; $x++) {
	//if property-suffix ends in '_id' then make a link to related table.
	$a_relation = explode("_",$arrayOfProperties[$x]);
	if($a_relation[1] == "id"){
		fputs($fp,"		html += \"<div class='panel_field'><label>".$arrayOfProperties[$x]."</label><input type='text' id='".$arrayOfProperties[$x]."'  name='".$arrayOfProperties[$x]."' class='info' value='\"+TABLE_DATA[i]['".$arrayOfProperties[$x]."']+\"' /> </div>\" \n");
		
	}else{
		fputs($fp,"		html += \"<div class='panel_field'><label>".$arrayOfProperties[$x]."</label><input type='text' id='".$arrayOfProperties[$x]."'  name='".$arrayOfProperties[$x]."' class='info' value='\"+TABLE_DATA[i]['".$arrayOfProperties[$x]."']+\"' /> </div>\" \n");
		
	}
}
fputs($fp, "		html += \" <input type='hidden' id='app_id'  name='app_id' class='info' value='\" + TABLE_DATA[i]['app_id'] + \"'    /> \";\n ");


fputs($fp, "		html +=\"</div></div>\";\n ");
fputs($fp, "		$('.modal-body').html(html);\n ");
 
 fputs($fp,"		var footer='';");
 //	footer += "<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_create();' >save</button>";
fputs($fp,"		footer +=\"<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_edit( \"  +TABLE_DATA[i]['id']+\");'  >save</button>\"; \n");
fputs($fp,"		footer +=\"<button type='button' class='btn btn-default' data-dismiss='modal' onclick='delete_".strtolower($objectName)."( \"  +TABLE_DATA[i]['id']+\");'  >delete</button>\"; \n");
fputs($fp,"		footer +=\"<button type='button' class='btn btn-default' data-dismiss='modal'   >cancel</button>\"; \n ");
 //fputs($fp, "	   	footer += \"<a onclick='save_edit( \"  +TABLE_DATA[i]['id']+\");' class='panel_anchor'>save</a>\";\n ");
//fputs($fp, "	   	footer += \"<a onclick='cancel_edit( \"+TABLE_DATA[i]['id']+\");' class='panel_anchor'>cancel</a>\";\n ");
//fputs($fp, "	    footer += \"<a onclick='delete_".strtolower($objectName)."( \"+TABLE_DATA[i]['id']+\");' class='panel_anchor'>delete</a>\";\n ");
 fputs($fp, "		$('.modal-footer').html(footer);\n ");

fputs($fp, "}\n ");
fputs($fp, "\n ");


fputs($fp, "function rowClick_drillDown(i){\n ");
fputs($fp, " 		//i = data index, NOT id.\n ");
fputs($fp, "		var table_header =  '".strtolower($objectName)."' ;\n ");
fputs($fp, "		var html = \"<div class=' panel_wrapper'><div id='row_\" + TABLE_DATA[i]['id'] + \"' >\";\n ");
fputs($fp, "		html += \"<div class='panel_table_title'>\" + table_header + \"</div>\";\n ");
fputs($fp, "	 	html += \"<div class='panel_field'><label>#</label><input type='text' id='id'  name='id' class='info' value='\"+TABLE_DATA[i]['id']+\"' /></div>\"\n "); 
fputs($fp, "	 	html += \"<div class='panel_field'><label>Name</label><input type='text' id='name'  name='name' class='info' value='\"+TABLE_DATA[i]['name']+\"' /></div>\"\n "); 
fputs($fp, "	   	html += \"<div class='panel_action_fields'>\";\n ");
fputs($fp, "	    html += \"<div class='panel_field'><button  onclick='delete_".strtolower($objectName)."( \"+TABLE_DATA[i]['id']+\");' class='panel_btn btn_delete'>Delete</button></div>\";\n ");
fputs($fp, "	   	html += \"<div class='panel_field'><button  onclick='cancel_edit( \"+TABLE_DATA[i]['id']+\");' class='panel_btn btn_cancel'>Cancel</button></div>\";\n ");
fputs($fp, "	   	html += \"<div class='panel_field'><button  onclick='save_edit( \"  +TABLE_DATA[i]['id']+\");' class='panel_btn btn_save'>Save</button></div>\";\n ");
fputs($fp, "		html += \"</div>\";\n ");
fputs($fp, "		//DETAILS PANEL\n ");
fputs($fp, "		html += \"<div class='panel_details_section'>\";\n ");
fputs($fp, "		html += \"<div class='panel_details_tabs'>\";\n ");
fputs($fp, "		// The Following JS functions that get called need to be included at top of the page at least.\n ");
fputs($fp, "		html += \"<ul class='nav nav-tabs'>\";\n ");


/*
 *  $max = count($arrayOfRelatedTables);
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
 * */
$max = count($arrayOfRelatedTables);
for ($x = 0; $x < $max; $x++) {
	//\". strtolower(\$arrayOfRelatedTables[\$x]).\"   ".$x."
	fputs($fp, "		html += \"<li id='data_tab".$x."' class='rd_tab'><a href='#' onclick='read_". strtolower($arrayOfRelatedTables[$x])."_ByThisId( \"  +TABLE_DATA[i]['id']+\");' class='panel_anchor'>". strtolower($arrayOfRelatedTables[$x])."</a></li>\";\n ");
	
}

/*
fputs($fp, "		html += \"<li id='data_tab1' class='rd_tab'><a href='#' onclick='read_RELATED_DATA_ByThisId( \"  +TABLE_DATA[i]['id']+\");' class='panel_anchor'>Collars</a></li>\";\n ");
fputs($fp, "		html += \"<li id='data_tab2' class='rd_tab' ><a href='#' onclick='readRelatedDataByThisId( \"  +TABLE_DATA[i]['id']+\");' class='panel_anchor'>Related Data2</a></li>\";\n ");
fputs($fp, "		html += \"<li id='data_tab3'  class='rd_tab'><a href='#' onclick='readRelatedDataByThisId( \"  +TABLE_DATA[i]['id']+\");' class='panel_anchor'>Related Data3</a></li>\";\n ");
fputs($fp, "		html += \"<li id='data_tab4'  class='rd_tab'><a href='#' onclick='readRelatedDataByThisId( \"  +TABLE_DATA[i]['id']+\");' class='panel_anchor'>Related Data4</a></li>\";\n ");
*/


fputs($fp, "		html += \"</ul>\";\n ");
fputs($fp, "		html +=\"</div>\";\n ");
fputs($fp, "		// #Details Content is where sub-data is displayed\n "); 
fputs($fp, "		html += \"<div id='details_content' class='panel_details_content'>\";\n ");
fputs($fp, "		html += \"\";\n ");
fputs($fp, "		html += \"</div>\";\n ");
fputs($fp, "		html +=\"</div>\";\n ");
fputs($fp, "		html +=\"</div></div>\";\n ");		
fputs($fp, "		$('#stage').html(html);\n ");
fputs($fp, "}\n ");
 

if($hasParentClass){ fputs($fp, "/*  \n"); }
fputs($fp, "$('.create_btn').click(function() { \n");  
fputs($fp, "	document.getElementById('modal-".strtolower($objectName)."').click();\n "); 
fputs($fp, "		var html = \"<div class='panel_wrapper'><div id='row_create' >\";\n ");  
 
$max = count($arrayOfProperties);
for ($x = 0; $x < $max; $x++) {
	fputs($fp,"		html += \"<div class='panel_field'><label>".$arrayOfProperties[$x]."</label><input type='text' id='".$arrayOfProperties[$x]."'  name='".$arrayOfProperties[$x]."' class='info' value='' /></div>\" \n");
}
fputs($fp, "		html += \" <input type='hidden' id='app_id'  name='app_id' class='info' value=''    /> \"; \n");  
fputs($fp, "		html +=\"</div></div>\"; \n");  
fputs($fp, "		$('.modal-body').html(html);\n ");
fputs($fp,"			var footer = ''; ");
fputs($fp,"			footer +=\"<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_create();' >save</button>\"; \n");
fputs($fp,"			footer +=\"<button type='button' class='btn btn-default' data-dismiss='modal'  >cancel</button>\"; \n");

 
fputs($fp, "		$('.modal-footer').html(footer);\n ");
fputs($fp, "}); \n");  
if($hasParentClass){ fputs($fp, "*/  \n"); }
 /////////////////////////////////////////////
fputs($fp,"  //uncomment if parent class exists: \n");
if(!$hasParentClass){ fputs($fp, "/*  \n"); }
fputs($fp,"$('.create_from_parent_class_btn').click(function() { \n "); 
fputs($fp,"  //click the hidden anchor link that opens the modal \n");
fputs($fp,"	document.getElementById('modal-".strtolower($objectName)."').click(); \n "); 
fputs($fp," 	var html = \"<div class='panel_wrapper'><div id='row_create' >\"; \n "); 
fputs($fp," 		html += \"<select id='parent_id'  name='parent_id' class='info'>\";   \n "); 
fputs($fp,"	  	 	for(var i = 0; i <= o_parentData.length; i++){  \n  "); 
fputs($fp,"	  	 		if(typeof o_parentData[i] != 'undefined'){   \n "); 
fputs($fp,"	  	 			html += \"<option value=\"+o_parentData[i]['id'];   \n  "); 
fputs($fp,"	 	 			html +=\" >\"+o_parentData[i]['name']+\"</option>\";   \n "); 
fputs($fp,"	  	 		}		  \n  "); 
fputs($fp,"	  	 	}   \n  "); 
fputs($fp,"	 	 	html += '</select>';  \n "); 
fputs($fp,"			html += \" <input type='hidden' id='app_id'  name='app_id' class='info' value=''    /> \";  \n "); 
fputs($fp,"			html +=\"</div></div>\";  \n "); 
fputs($fp,"		$('.modal-body').html(html); \n "); 
fputs($fp," 	var footer = ''; \n  ");
fputs($fp,"			footer +=\"<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_create();' >save</button>\";  \n "); 
fputs($fp,"			footer +=\"<button type='button' class='btn btn-default' data-dismiss='modal'  >cancel</button>\";  \n "); 
fputs($fp,"		$('.modal-footer').html(footer); \n "); 
fputs($fp," });  \n  ");  
if(!$hasParentClass){ fputs($fp, " */  \n"); } 
 ////////////////////////////////  
fputs($fp, "//  DATA CREATE   /////////////////////////////////////////////////////////////////////////////////         \n ");
fputs($fp, "function save_create(id) {\n ");
fputs($fp, "	var data = {};\n ");
fputs($fp, "	data.id = id;\n ");
fputs($fp, "	$.each($('#row_create .info'), function(i, e) {\n ");
fputs($fp, "			//alert(i + '||' + e.name + '||' + e.value);\n ");
fputs($fp, "			switch(e.name) {\n ");
$max = count($arrayOfProperties);
for ($x = 0; $x < $max; $x++) {	
if(strtolower($arrayOfProperties[$x]) ==  "parent_id"){
	fputs($fp," 				case '".strtolower($arrayOfProperties[$x])."':  \n");
	fputs($fp," 				data.".strtolower($arrayOfProperties[$x])." = e.value;  \n");
	//get data.name from parent.name based on parent id.
	//data.name = nameByParentId(data.parent_id);
	if(!$hasParentClass){ fputs($fp, " /*  \n"); } 
	fputs($fp," 				data.name = nameByParentId(data.parent_id); \n ");
	if(!$hasParentClass){ fputs($fp, " */  \n"); } 
	fputs($fp," 				break; \n");
	
	
}else{
	fputs($fp," 				case '".strtolower($arrayOfProperties[$x])."':  \n");
	fputs($fp," 				data.".strtolower($arrayOfProperties[$x])." = e.value;  \n");
	fputs($fp," 				break; \n");
	
	
}	
}
fputs($fp, "				default:\n ");
fputs($fp, "				//default code block\n ");
fputs($fp, "				break;\n ");
fputs($fp, "			}\n ");
fputs($fp, "	});\n ");
fputs($fp, "	var params = $.param(data);\n ");
//&data_only=true added: 3/8/2016 Bayon.
fputs($fp, "	var dataString = 'c=".strtolower($objectName)."_controller&m=create&data_only=true&'+params;\n ");
fputs($fp, "	\n ");
fputs($fp, "	//alert(dataString +' || '+  url);\n ");
fputs($fp, "	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, create_callback);\n ");
fputs($fp, "}\n ");

fputs($fp, "function nameByParentId(id){\n ");
fputs($fp, "	var name = null;\n ");
fputs($fp, "	for (var i = 0; i <= o_parentData.length; i++) {\n ");
fputs($fp, "		if ( typeof o_parentData[i] != \"undefined\") {\n ");
fputs($fp, "			if (o_parentData[i]['id'] == id){\n ");
fputs($fp, "				name = o_parentData[i]['name'];\n ");
fputs($fp, "			}\n ");
fputs($fp, "		}\n ");
fputs($fp, "	}\n ");
fputs($fp, "	return name;\n ");
fputs($fp, "}\n ");




fputs($fp, "function create_callback(data){\n ");
fputs($fp, "	//alert(data);\n ");
fputs($fp, "	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=".strtolower($objectName)."_controller&m=read');\n ");
fputs($fp, "}\n ");



fputs($fp, "//  DATA EDITING   /////////////////////////////////////////////////////////////////////////////////         \n ");
fputs($fp, "function save_edit(id) {\n ");
fputs($fp, "	var data = {};\n ");
fputs($fp, "	data.id = id;\n ");
fputs($fp, "	$.each($('#row_' + id + ' .info'), function(i, e) {\n ");
fputs($fp, "			//alert(i + '||' + e.name + '||' + e.value);\n ");
fputs($fp, "			switch(e.name) {\n ");
$max = count($arrayOfProperties);
	for ($x = 0; $x < $max; $x++) {
		fputs($fp,"\n\tcase '".strtolower($arrayOfProperties[$x])."':");
		fputs($fp,"\n\tdata.".strtolower($arrayOfProperties[$x])." = e.value;");
		fputs($fp,"\n\tbreak;");
	}
fputs($fp, "				default:\n ");
fputs($fp, "				//default code block\n ");
fputs($fp, "				break;\n ");
fputs($fp, "			}\n ");
fputs($fp, "	});\n ");
fputs($fp, "	var params = $.param(data);\n ");
fputs($fp, "	var dataString = 'c=".strtolower($objectName)."_controller&m=edit&'+params;\n ");
fputs($fp, "	\n ");
fputs($fp, "	//alert(dataString +' || '+  url);\n ");
fputs($fp, "	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, edit_callback);\n ");
fputs($fp, "}\n ");

fputs($fp, "function edit_callback(data){\n ");
fputs($fp, "	//alert(data);\n ");
fputs($fp, "	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=".strtolower($objectName)."_controller&m=read');\n ");
fputs($fp, "}\n ");





fputs($fp, "function deny() {\n ");
fputs($fp, "}\n ");
fputs($fp, "function cancel_edit(id){\n ");
fputs($fp, "		  $(location).attr('href',JS_CONFIG.BASE_URL+'?c=".strtolower($objectName)."_controller&m=read');\n ");
fputs($fp, "}\n ");
fputs($fp, "function delete_".strtolower($objectName)."(id){\n ");
fputs($fp, "		if(confirm('Are you sure you want to delete this ".strtolower($objectName)."?'))\n ");
fputs($fp, "		{ verify_delete(id); } else {  deny(); }\n ");
fputs($fp, "}\n ");
fputs($fp, "function verify_delete(id) {\n ");
fputs($fp, "	var data = {};\n ");
fputs($fp, "	data.id = id;\n ");
fputs($fp, "	var dataString = 'c=".strtolower($objectName)."_controller&m=delete&id=' + data.id  ;\n ");
fputs($fp, "	 \n ");
fputs($fp, "	//alert(BASE_URL+'---'+dataString);\n ");
fputs($fp, "	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, delete_callback);\n ");
fputs($fp, "}\n ");
fputs($fp, "function delete_callback(data){\n ");
fputs($fp, "	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=".strtolower($objectName)."_controller&m=read');\n ");
fputs($fp, "}\n ");
fputs($fp, "	 \n ");
fputs($fp, "</script>\n ");
fputs($fp, "\n ");
fputs($fp, " \n ");

 ////////////////////////////".strtolower($objectName)."
 fputs($fp, "<script>  \n "); 
 
fputs($fp, "	 /* \n "); 
fputs($fp, " * DISPLAY ( ONLY ) : CURRENT OPTION VALUE \n "); 
fputs($fp, "   html +='<td>'; \n "); 
fputs($fp, "	 for(var i = 0; i <= o_bigdogs.length; i++){ \n "); 
fputs($fp, "	 	if(typeof o_bigdogs[i] != \"undefined\"){ \n "); 
fputs($fp, "	 		if (o_bigdogs[i]['id'] == row.parent_id){ \n "); 
fputs($fp, "	 			html +=\" \"+o_bigdogs[i]['name']+\"\"; \n "); 
fputs($fp, "	 		} \n "); 
fputs($fp, "	 	}		 \n "); 
fputs($fp, "	 } \n "); 
fputs($fp, "	html += '</td>'; \n ");  
fputs($fp, "  */ \n "); 
 
fputs($fp, "	/* SELECTION CHOICE:  \n  "); 
fputs($fp, "	 *  html += '<select id='parentData'  name='parentData' class='info'>';  \n  "); 
fputs($fp, "	 for(var i = 0; i <= o_parentData.length; i++){  \n  "); 
fputs($fp, "	 	if(typeof o_parentData[i] != 'undefined'){  \n  "); 
fputs($fp, "	 		html += '<option value=''+o_parentData[i]['id']+''';   \n "); 
fputs($fp, "	 		if (o_parentData[i]['id'] == row.parent_id){   \n "); 
fputs($fp, "	 			html += ' selected '   \n "); 
fputs($fp, "	 		}   \n "); 
fputs($fp, "	 		html +=' >'+o_parentData[i]['name']+'</option>'  \n  "); 
fputs($fp, "	 	}		  \n  "); 
fputs($fp, "	 }   \n "); 
fputs($fp, "	 html += '</select>';   \n "); 
fputs($fp, "	 */   \n "); 
fputs($fp, "	/* BUTTON CHOICE:  \n  "); 
fputs($fp, "	 *    html += '<div class='btn-group'>';  \n  "); 
fputs($fp, "	 for(var i = 0; i <= o_parentData.length; i++){  \n  "); 
fputs($fp, "	 	if(typeof o_parentData[i] != 'undefined'){   \n "); 
fputs($fp, "	 		html += '<button id=''+i+'_'+o_parentData[i]['id']+''  name=''+o_parentData[i]['id']+'' class=' info btn btn-default ';   \n "); 
fputs($fp, "	 		if (o_parentData[i]['id'] == row.parent_id){   \n "); 
fputs($fp, "	 			html += ' active ';  \n  "); 
fputs($fp, "	 		}   \n "); 
fputs($fp, "	 		html += '' type='button'> ';  \n  "); 
fputs($fp, "	 		html += '<em class='glyphicon glyphicon-user'></em>'+o_parentData[i]['name']+'';   \n  "); 
fputs($fp, "	 		html += '</button>  ';   \n  "); 
fputs($fp, "	 	}		  \n  "); 
fputs($fp, "	 }  \n  "); 
fputs($fp, "	 html += '</div>';   \n "); 
fputs($fp, "	 */  \n  "); 
fputs($fp, "	/*   \n "); 
fputs($fp, "	 *  BUTTON DROPDOWN MENU   \n  "); 
fputs($fp, "		html += '<div class='btn-group'>';  \n  "); 
fputs($fp, "		html += '				<button class='btn btn-default'>  ';   \n  "); 
fputs($fp, "		html += '					Action  ';   \n  "); 
fputs($fp, "		html += '				</button>   ';    \n "); 
fputs($fp, "		html += '				<button data-toggle='dropdown' class='btn btn-default dropdown-toggle'>  ';   \n  "); 
fputs($fp, "		html += '					<span class='caret'></span>  ';   \n  "); 
fputs($fp, "		html += '				</button>  ';   \n  "); 
fputs($fp, "		html += '				<ul class='dropdown-menu'>  ';   \n  "); 
fputs($fp, "	 for(var i = 0; i <= o_parentData.length; i++){  \n  "); 
fputs($fp, "	 	if(typeof o_parentData[i] != 'undefined'){  \n  "); 
fputs($fp, "	 		html += '<li id=''+i+'_'+o_parentData[i]['id']+''  name=''+o_parentData[i]['id']+'' class='info' ';   \n "); 
fputs($fp, "	 		html += '						<a href='#'  id=''+i+'_'+o_parentData[i]['id']+''  name=''+o_parentData[i]['id']+'' class='info'  >'+o_parentData[i]['name']+'</a>  ';   \n  "); 
fputs($fp, " 	 		html += '</li>  ';   \n  "); 
fputs($fp, "	 	}		  \n  "); 
fputs($fp, "	 }  \n  "); 
fputs($fp, "html += '</ul>  ';   \n  "); 
fputs($fp, "html += '</div>';  \n  "); 
fputs($fp, "    \n  "); 
fputs($fp, "	 */  \n  "); 
fputs($fp, "</script> \n  ");
 
 ///////////////////////////// 
 
 fclose($fp);
echo('<h3>TABLE-LITE VIEW</h3>');
showCode($view_list_final_filepath);
 ?>
			
			
			
			
			<script>
			 /*
  * DISPLAY ( ONLY ) : CURRENT OPTION VALUE
   html +='<td>';
	 for(var i = 0; i <= o_parentData.length; i++){
	 	if(typeof o_parentData[i] != "undefined"){
	 		if (o_parentData[i]['id'] == row.parent_id){
	 			html +=" "+o_parentData[i]['name']+"";
	 		}
	 	}		
	 }
	html += '</td>'; 
  */
	/* SELECTION CHOICE:
	 *  html += "<select id='parentData'  name='parentData' class='info'>";
	 for(var i = 0; i <= o_parentData.length; i++){
	 	if(typeof o_parentData[i] != "undefined"){
	 		html += "<option value='"+o_parentData[i]['id']+"'";
	 		if (o_parentData[i]['id'] == row.parent_id){
	 			html += " selected "
	 		}
	 		html +=" >"+o_parentData[i]['name']+"</option>"
	 	}		
	 }
	 html += "</select>";
	 */
	/* BUTTON CHOICE:
	 *    html += "<div class='btn-group'>";
	 for(var i = 0; i <= o_parentData.length; i++){
	 	if(typeof o_parentData[i] != "undefined"){
	 		html += "<button id='"+i+"_"+o_parentData[i]['id']+"'  name='"+o_parentData[i]['id']+"' class=' info btn btn-default ";
	 		if (o_parentData[i]['id'] == row.parent_id){
	 			html += " active ";
	 		}
	 		html += "' type='button'> ";
	 		html += "<em class='glyphicon glyphicon-user'></em>"+o_parentData[i]['name']+""; 
	 		html += "</button>  "; 
	 	}		
	 }
	 html += "</div>";
	 */
	/*
	 *  BUTTON DROPDOWN MENU 
html += "<div class='btn-group'>";
html += "				<button class='btn btn-default'>  "; 
html += "					Action  "; 
html += "				</button>   "; 
html += "				<button data-toggle='dropdown' class='btn btn-default dropdown-toggle'>  "; 
html += "					<span class='caret'></span>  "; 
html += "				</button>  "; 
html += "				<ul class='dropdown-menu'>  "; 
	 for(var i = 0; i <= o_parentData.length; i++){
	 	if(typeof o_parentData[i] != "undefined"){
	 		html += "<li id='"+i+"_"+o_parentData[i]['id']+"'  name='"+o_parentData[i]['id']+"' class='info' ";
	 		html += "						<a href='#'  id='"+i+"_"+o_parentData[i]['id']+"'  name='"+o_parentData[i]['id']+"' class='info'  >"+o_parentData[i]['name']+"</a>  "; 
 	 		html += "</li>  "; 
	 	}		
	 }
html += "</ul>  "; 
html += "</div>";
  
	 */
	
	/*
	 * //////   DRILL DOWN VIEW TEMPLATE
	 * 
 
 function rowClick_drillDown(i){
 	//i = data index, NOT id.
	var table_header =  'Main Data' ;
	var html = "<div class=' panel_wrapper'><div id='row_" + TABLE_DATA[i]['id'] + "' >";
	html += "<div class='panel_table_title'>" + table_header + "</div>";
		
	 html += "<div class='panel_field'>#<input type='text' id='id'  name='id' class='info' value='"+TABLE_DATA[i]['id']+"' /></div>" 
	 html += "<div class='panel_field'>Name<input type='text' id='name'  name='name' class='info' value='"+TABLE_DATA[i]['name']+"' /></div>" 
	// html += "<div class='panel_field'>client_id:<input type='text' id='client_id'  name='client_id' class='info' value='"+data[i]['client_id']+"' /></div>" 
		 // pagination: select for ...row click
	 
	   	html += "<div class='panel_action_fields'>";
	   	html += "<div class='panel_field'><a href='#' onclick='save_edit( "  +TABLE_DATA[i]['id']+");' class='panel_anchor'>Save</a></div>";
	   	html += "<div class='panel_field'><a href='#' onclick='cancel_edit( "+TABLE_DATA[i]['id']+");' class='panel_anchor'>Cancel</a></div>";
	    html += "<div class='panel_field'><a href='#' onclick='delete_".strtolower($objectName)."( "+TABLE_DATA[i]['id']+");' class='panel_anchor'>Delete</a></div>";
		html += "</div>";
		
		//DETAILS PANEL
		html += "<div class='panel_details_section'>";
		html += "<div class='panel_table_title'>Related Data Tabs</div>";
		html += "<div class='panel_details_tabs'>";
		
		// The Following JS functions that get called need to be included at top of the page at least.
		html += "<ul class='nav nav-tabs'>";
		html += "<li id='data_tab1' class='rd_tab'><a href='#' onclick='readRelatedDataByThisId( "  +TABLE_DATA[i]['id']+");' class='panel_anchor'>Related Data1</a></li>";
		html += "<li id='data_tab2' class='rd_tab' ><a href='#' onclick='readRelatedDataByThisId( "  +TABLE_DATA[i]['id']+");' class='panel_anchor'>Related Data2</a></li>";
		html += "<li id='data_tab3'  class='rd_tab'><a href='#' onclick='readRelatedDataByThisId( "  +TABLE_DATA[i]['id']+");' class='panel_anchor'>Related Data3</a></li>";
		html += "<li id='data_tab4'  class='rd_tab'><a href='#' onclick='readRelatedDataByThisId( "  +TABLE_DATA[i]['id']+");' class='panel_anchor'>Related Data4</a></li>";
		 
		html += "</ul>";
		html +="</div>";
		// #Details Content is where sub-data is displayed 
		html += "<div id='details_content' class='panel_details_content'>";
		html += "";
		html += "</div>";
		html +="</div>";
		
		html +="</div></div>";
		
		$('#stage').html(html);
 }
 
	 */
	
	
	
	/*
	 * 
	 * 
	 * // ////   RELATED DATA JAVASCRIPT   ////////////////
	function read_RELATED_DATA_By_THIS_ID(id){
	$('#details_content').fadeIn('fast');
	$('.rd_tab').removeClass('active');
	$('#data_tab1').addClass('active');
	current_MAIN_DATA_ID = id;	
	console.log('read_RELATED_DATA_By_THIS_ID');
	 var dataString = "c=related_data_controller&m=read_RELATED_DATA_By_THIS_ID&id="+id+"";
	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, read_RELATED_DATA_By_THIS_ID_callback);
}
	
function read_RELATED_DATA_By_THIS_ID_callback(data){
	console.log('read_RELATED_DATA_By_THIS_ID_callback');
	var obj =JSON.parse(data);
	format_RELATED_DATA(obj);
} 	

function format_RELATED_DATA(obj) {
	var RELATED_DATA_tally = 0;
	console.log(obj);
	var html = "";
	html += "<a href='#' onclick='addNew_RELATED_DATA()'>Add _RELATED_DATA</a>";
	html += "<div id='add_RELATED_DATA_form' class='hidden_form'  >";

	 
	html += "<div class='ui_wrapper'><div id='row_create_RELATED_DATA' >";
	html += "<div class='panel_field'><input type='hidden' id='id'  name='id' class='info' value='' /></div>"
	html += "<div class='panel_field'>name:<input type='text' id='name'  name='name' class='info' value='' /></div>"

	html += "<div class='panel_field'>Part";
	html += "<select id='parts_id'  name='parts_id' class='info'>";
	console.log('parts object:');
	console.log(parts);
	for (var p = 0; p <= parts.length; p++) {
		if ( typeof parts[p] != "undefined") {
			html += "<option value='" + parts[p]['id'] + "'";
			html += " >" + parts[p]['name'] + "</option>"
		}
	}
	html += "</select>";
	html += "</div>";
	html += "<div class='panel_field'><input type='hidden' id='MAIN_DATA_ID'  name='MAIN_DATA_ID' class='info' value='" + current_MAIN_DATA_ID + "' /></div>"
	// html += "<div class='panel_field'>parts_id:<input type='text' id='parts_id'  name='parts_id' class='info' value='' /></div>"
	html += "<div class='panel_field'><input type='hidden' id='dt_created'  name='dt_created' class='info' value='' /></div>"
	html += "<div class='panel_field'><input type='hidden' id='dt_updated'  name='dt_updated' class='info' value='' /></div>"
	html += " <input type='hidden' id='app_id'  name='app_id' class='info' value=''    /> ";
	html += "<div class='panel_field'><a href='#' onclick='save_create_RELATED_DATA();' class='panel_anchor'>save</a></div>";
	html += "<div class='panel_field'><a href='#' onclick='cancel_create_RELATED_DATA();' class='panel_anchor'>cancel</a></div>";
	html += "</div></div>";
	html += "</div>";
	
	html +="<div class='subtotal_table_wrapper'>";
	html +="<table class='subtotal_table' border=1 >";
	//HIDDEN HEADERS: <th>MAIN_DATA_ID</th>
	html +="<tr><th>ID</th><th>Name</th><th width='10%'>Part ID</th><th>Price</th><th>Actions</th></tr>";
	
	//LOOP LIST OF ITEMS
	for (var i = 0; i < obj.length; i++) {
		var price = 0;
		html += "<tr>";
		html += " <td width='10%' >" + obj[i].id +"</td>";
		html += " <td>" + obj[i].name+"</td>";
		//html += " <td>" + obj[i].MAIN_DATA_ID+"</td>";
		html += "<td>" + obj[i].parts_id+"</td>";
		//based on 'parts_id' need to get part.price 
		for (var pp = 0; pp <= parts.length; pp++) {
			if ( typeof parts[pp] != "undefined") {
				if (parseFloat(parts[pp]['id']) == parseFloat( obj[i].parts_id)){
					price = parts[pp]['price'];
					RELATED_DATA_tally = Math.round(RELATED_DATA_tally + parseFloat(price));
				}
			}
		}
		html += " <td>$" + price+"</td>";
		html += " <td>";
		html += "<button id='" + obj[i].id +"' class='action_button' onclick='itemAction(this);' value='delete' >Delete</button>";
		html += "</td>";
		html += "</tr>";
	}
	html += " <tr><td>_RELATED_DATA_ Subtotal:</td><td>$"+ RELATED_DATA_tally+"</td></tr>";
	html += "</table>";
	html += "</div>";
	
	subtotal_RELATED_DATAs = RELATED_DATA_tally;
	$('#details_content').html(html);
}
function itemAction(obj){
	//alert(obj.id + ":"+ obj.value);
	if(obj.value == "delete"){
		delete_RELATED_DATAs(obj.id);
	}
	
}
function cancel_create_RELATED_DATA(){
	$('#details_content').fadeOut('slow');
	//panel_slide_out();//left  
}


function addNew_RELATED_DATA(){
	//alert('make a form for new item visible here...then call submitNew_RELATED_DATA()');
	$("#add_RELATED_DATA_form").css('display','block');
}
function submitNew_RELATED_DATA(){
	//alert('add new item to work order id:'+ current_MAIN_DATA_ID);
	//createEmptyForWorkOrderId($wo_id) 
	var dataString = "c=related_data_controller&m=createEmptyForWorkOrderId&id="+current_MAIN_DATA_ID+"";
	//alert(JS_CONFIG.BASE_URL + "---"+ dataString);
	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, addNew_RELATED_DATA_callback);
	
}

function addNew_RELATED_DATA_callback(data){
	console.log(data);
}
function save_create_RELATED_DATA() {
	var data = {};
	$.each($('#row_create_RELATED_DATA .info'), function(i, e) {

		switch(e.name) {

			case 'id':
				data.id = e.value;
				break;
			//case 'name':
				//data.name = e.value;
				//break;
			case 'MAIN_DATA_ID':
				data.MAIN_DATA_ID = e.value;

				break;
			case 'parts_id':
				data.parts_id = e.value;
				data.name = partsNameById(data.parts_id);
				break;
			case 'dt_created':
				data.dt_created = e.value;
				break;
			case 'dt_updated':
				data.dt_updated = e.value;
				break;
			default:
				//default code block
				break;
		}
	});
	var params = $.param(data);
	var dataString = 'c=related_data_controller&m=create&' + params;
	//alert(dataString + ' || ' + JS_CONFIG.BASE_URL);
	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, create_callback_RELATED_DATA);
}
function partsNameById(id){
	var name = null;
	for (var p = 0; p <= parts.length; p++) {
		if ( typeof parts[p] != "undefined") {
			if (parts[p]['id'] == id){
				name = parts[p]['name'];
			}
		}
	}
	return name;
}
function create_callback_RELATED_DATA(data){
	 
	
	$('#details_content').fadeOut('slow');
	 
}

function delete_RELATED_DATAs(id){
		if(confirm('Are you sure you want to delete this items?'))
		{ verify_delete_RELATED_DATA(id); } else {  deny(); }
}
function verify_delete_RELATED_DATA(id) {
	var data = {};
	data.id = id;
	var dataString = 'c=related_data_controller&m=delete&id=' + data.id  ;
	 
	//alert(BASE_URL+'---'+dataString);
	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, delete_RELATED_DATA_callback);
}
function delete_RELATED_DATA_callback(data){
	//alert('maybe just fade?');
	$('#details_content').fadeOut('slow');
	 
}

	 */
	
	
</script> 