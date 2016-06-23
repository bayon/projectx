<script> 
 // PARAMETERS ///////////////////////////////////////////////////////////////////////////
 var controller = 'foo_controller'; 
 var TABLE_DATA = []; 
 var itemsPerPage = null;
 </script> 
 <!-- PARENT Class Data  --> 
<?php  
/*  
 // IF THIS CLASS HAS PARENT CLASS : 
//1)  get parent data here 
//2) change 'create_btn' to 'create_from_parent_class_btn' 
//3) uncomment that function 
//4) uncomment //data.name = nameByParentId(data.parent_id);  
 $parentData = new (); 
 $parentData = $parentData-> read(); 
 $parentData_json = json_encode($parentData); 
 echo("<script>  var o_parentData = ".$parentData_json."; </script>");	 
*/  
  ?>  
<!-- RELATED Class Data  --> 
<?php  
/*  
//  IF THIS CLASS HAS RELATED CLASS : 
//1)  get related data here   
 $relatedData = new (); 
 $relatedData = $relatedData-> read(); 
 $relatedData_json = json_encode($relatedData); 
 echo("<script>  var o_relatedData = ".$relatedData_json."; </script>");	 
*/  
  ?>  
<!--  THE MODAL -->
 <div style='margin-top:5%;' class='modal fade' id='modal-container-foo' role='dialog' aria-labelledby='myModalLabel' aria-hidden='false'>
 	<div class='modal-dialog'>
 		<div class='modal-content'>
 			<div class='modal-header'>
 				<button type='button' class='close' data-dismiss='modal' aria-hidden='false'>
 					×
 				</button>
 				<h4 class='modal-title' id='myModalLabel'> foo </h4>
 			</div>
 			<div class='modal-body'>
 				...
 			</div>
 			<div class='modal-footer'>
 				<button type='button' class='btn btn-default' data-dismiss='modal'>
 					Close
 				</button>
 			</div>
 		</div>
 	</div>
 </div>
 <!--  THE PAGE -->
 <div id='template_view_1' class='container animated fadeIn kioview' style='text-align:center;'  >
 	<div class='row top-row'>
 		<div class='col-md-12'>
 			<div id='stage'>
 				<div class='tablelite-title-row'><h3>foo<button class='create_btn' >+</button> 					<a id='modal-foo' style='' href='#modal-container-foo' role='button' class='btn invisible' data-toggle='modal'>modal-1</a>
 					</h3> 				</div> 				<div class='row'>
 					<div id='tableBody1-pagination' class='tableLiteTBody-pagination'>
 								<input type='search' class='light-table-filter' data-table='order-table' placeholder='Filter'>
 								<a id='tableBody1-previous' href='#'>
 								<button class='table-lite-btn'>
 									&laquo; Previous
 								</button></a>
 								<a id='tableBody1-next' href='#'>
 								<button class='table-lite-btn'>
 									Next &raquo;
 								</button></a>
 
 								<select id='itemsPerPage' onchange='changeItemsPerPage(this);'>
 									<option>10</option>
 									<option>25</option>
 									<option>50</option>
 									<option>100</option>
 									<option>500</option>
 									<option>1000</option>
 								</select>
 								<a href = '' >
 								<button class='table-lite-btn' >
 									refresh
 								</button></a>
 								<button onclick='tableLiteCheckedRows('table');'>
 									handle checked rows
 								</button>
 					</div>
 				</div>
 				<div class='row'>
 					<table id='table' class='sortable order-table table layout display responsive-table'>
 						<thead>
 							<tr id='table_headers'>
 									<th></th>									<th>element</th>
									<th>id</th>
									<th>name</th>
									<th>value</th>
									<th>placeholder</th>
									<th>classList</th>
									<th>text</th>
									<th>eventType</th>
									<th>src</th>
									<th>height</th>
									<th>width</th>
									<th>href</th>
									<th>target</th>
									<th>type</th>
									<th>method</th>
									<th>action</th>
									<th>data</th>
							</tr>
 						</thead>
 						<tbody id='tableBody1' class='tableLiteTBody'>
 							<!-- json data inserted here -->
 						</tbody>
 					</table>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
 
 	<!-- BACKGROUND IMAGES -->
 	<div id='BG_IMG'>
 		&nbsp;
 		<!-- <img src='img/sky.jpg'> -->
 	</div>
 	<div id='BG_IMG_LEFT'>
 		&nbsp;
 	</div>
 	<div id='BG_IMG_RIGHT'>
 		&nbsp;
 	</div>
 	<div id='BG_IMG_TOP'>
 		&nbsp;
 	</div>
 	<!-- end of BACKGROUND IMAGES -->
 <script>
 function read_ModelKV_callback(data){ 
  	var obj = JSON.parse(data); 
  	console.log(obj); 
  } 
 function getChildren(){ 
    	read_ModelKV('model','key','value'); 
    } 
 function read_ModelKV(model,k,v){  
    	var dataString = 'c='+model+'_controller&m=read_ModelKV&data_only=true&model='+model+'&k='+k+'&v='+v+'';  
    	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, read_ModelKV_callback);  
 } 
 function changeItemsPerPage(obj) {
 	itemsPerPage = obj.value;
 	load_data();
 }
 function tableLiteCheckedRows_callback(array_of_ids) {
 	console.log('table-lite: Loop through these ids and handle them as you will...');
 }
 $(document).ready(function() {
 	itemsPerPage = 10;
 	load_data();
 });	 
 function load_data_callback(data){
 	console.log('load data callback fn:');
 	var obj = JSON.parse(data);
 	TABLE_DATA = obj;
 	var rows = [];
 		$.each(obj, function(i, row) {
 			if ( typeof row == 'object') {
 				var html = '';
 				html += "<tr id=''+row.id+'' onclick='rowClick("+i+");' class='data_row' >";
 					html += "<td><input type='checkbox'  ><input type='hidden' name='id' value='' + row.id + ''></td>";
 						html += '<td>' + row.element + '</td>';
 						html += '<td>' + row.id + '</td>';
 						html += '<td>' + row.name + '</td>';
 						html += '<td>' + row.value + '</td>';
 						html += '<td>' + row.placeholder + '</td>';
 						html += '<td>' + row.classList + '</td>';
 						html += '<td>' + row.text + '</td>';
 						html += '<td>' + row.eventType + '</td>';
 						html += '<td>' + row.src + '</td>';
 						html += '<td>' + row.height + '</td>';
 						html += '<td>' + row.width + '</td>';
 						html += '<td>' + row.href + '</td>';
 						html += '<td>' + row.target + '</td>';
 						html += '<td>' + row.type + '</td>';
 						html += '<td>' + row.method + '</td>';
 						html += '<td>' + row.action + '</td>';
 						html += '<td>' + row.data + '</td>';
 				html += '</tr>';
 				rows.push(html);
 			}
 		});
 		$('#tableBody1').append(rows.join(''));
 		$('#tableBody1').paginate({
 			itemsPerPage : itemsPerPage
 		});
 	
 };
 function load_data(){
 	var dataString = "c=foo_controller&m=readToJSON&data_only=true";
 	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, load_data_callback);
 }
 	( function() {
 			$('#BG_IMG').addClass('gradient6');//be sure to remove unwanted classes before applying a new one.
 		}()); 
 //  POPULATE DETAILS PANEL  /////////////////////////////////////////////////////////////////////////////////
 function rowClick(i) {
 	document.getElementById('modal-foo').click();
 		var html = "<div class='panel_wrapper'><div id='row_" + TABLE_DATA[i]['id'] + "' >";
 		html += "<div class='panel_field'><label>element</label><input type='text' id='element'  name='element' class='info' value='"+TABLE_DATA[i]['element']+"' /> </div>" 
		html += "<div class='panel_field'><label>id</label><input type='text' id='id'  name='id' class='info' value='"+TABLE_DATA[i]['id']+"' /> </div>" 
		html += "<div class='panel_field'><label>name</label><input type='text' id='name'  name='name' class='info' value='"+TABLE_DATA[i]['name']+"' /> </div>" 
		html += "<div class='panel_field'><label>value</label><input type='text' id='value'  name='value' class='info' value='"+TABLE_DATA[i]['value']+"' /> </div>" 
		html += "<div class='panel_field'><label>placeholder</label><input type='text' id='placeholder'  name='placeholder' class='info' value='"+TABLE_DATA[i]['placeholder']+"' /> </div>" 
		html += "<div class='panel_field'><label>classList</label><input type='text' id='classList'  name='classList' class='info' value='"+TABLE_DATA[i]['classList']+"' /> </div>" 
		html += "<div class='panel_field'><label>text</label><input type='text' id='text'  name='text' class='info' value='"+TABLE_DATA[i]['text']+"' /> </div>" 
		html += "<div class='panel_field'><label>eventType</label><input type='text' id='eventType'  name='eventType' class='info' value='"+TABLE_DATA[i]['eventType']+"' /> </div>" 
		html += "<div class='panel_field'><label>src</label><input type='text' id='src'  name='src' class='info' value='"+TABLE_DATA[i]['src']+"' /> </div>" 
		html += "<div class='panel_field'><label>height</label><input type='text' id='height'  name='height' class='info' value='"+TABLE_DATA[i]['height']+"' /> </div>" 
		html += "<div class='panel_field'><label>width</label><input type='text' id='width'  name='width' class='info' value='"+TABLE_DATA[i]['width']+"' /> </div>" 
		html += "<div class='panel_field'><label>href</label><input type='text' id='href'  name='href' class='info' value='"+TABLE_DATA[i]['href']+"' /> </div>" 
		html += "<div class='panel_field'><label>target</label><input type='text' id='target'  name='target' class='info' value='"+TABLE_DATA[i]['target']+"' /> </div>" 
		html += "<div class='panel_field'><label>type</label><input type='text' id='type'  name='type' class='info' value='"+TABLE_DATA[i]['type']+"' /> </div>" 
		html += "<div class='panel_field'><label>method</label><input type='text' id='method'  name='method' class='info' value='"+TABLE_DATA[i]['method']+"' /> </div>" 
		html += "<div class='panel_field'><label>action</label><input type='text' id='action'  name='action' class='info' value='"+TABLE_DATA[i]['action']+"' /> </div>" 
		html += "<div class='panel_field'><label>data</label><input type='text' id='data'  name='data' class='info' value='"+TABLE_DATA[i]['data']+"' /> </div>" 
		html += " <input type='hidden' id='app_id'  name='app_id' class='info' value='" + TABLE_DATA[i]['app_id'] + "'    /> ";
 		html +="</div></div>";
 		$('.modal-body').html(html);
 		var footer='';		footer +="<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_edit( "  +TABLE_DATA[i]['id']+");'  >save</button>"; 
		footer +="<button type='button' class='btn btn-default' data-dismiss='modal' onclick='delete_foo( "  +TABLE_DATA[i]['id']+");'  >delete</button>"; 
		footer +="<button type='button' class='btn btn-default' data-dismiss='modal'   >cancel</button>"; 
 		$('.modal-footer').html(footer);
 }
 
 function rowClick_drillDown(i){
  		//i = data index, NOT id.
 		var table_header =  'foo' ;
 		var html = "<div class=' panel_wrapper'><div id='row_" + TABLE_DATA[i]['id'] + "' >";
 		html += "<div class='panel_table_title'>" + table_header + "</div>";
 	 	html += "<div class='panel_field'><label>#</label><input type='text' id='id'  name='id' class='info' value='"+TABLE_DATA[i]['id']+"' /></div>"
 	 	html += "<div class='panel_field'><label>Name</label><input type='text' id='name'  name='name' class='info' value='"+TABLE_DATA[i]['name']+"' /></div>"
 	   	html += "<div class='panel_action_fields'>";
 	    html += "<div class='panel_field'><button  onclick='delete_foo( "+TABLE_DATA[i]['id']+");' class='panel_btn btn_delete'>Delete</button></div>";
 	   	html += "<div class='panel_field'><button  onclick='cancel_edit( "+TABLE_DATA[i]['id']+");' class='panel_btn btn_cancel'>Cancel</button></div>";
 	   	html += "<div class='panel_field'><button  onclick='save_edit( "  +TABLE_DATA[i]['id']+");' class='panel_btn btn_save'>Save</button></div>";
 		html += "</div>";
 		//DETAILS PANEL
 		html += "<div class='panel_details_section'>";
 		html += "<div class='panel_details_tabs'>";
 		// The Following JS functions that get called need to be included at top of the page at least.
 		html += "<ul class='nav nav-tabs'>";
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
 $('.create_btn').click(function() { 
	document.getElementById('modal-foo').click();
 		var html = "<div class='panel_wrapper'><div id='row_create' >";
 		html += "<div class='panel_field'><label>element</label><input type='text' id='element'  name='element' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>id</label><input type='text' id='id'  name='id' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>name</label><input type='text' id='name'  name='name' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>value</label><input type='text' id='value'  name='value' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>placeholder</label><input type='text' id='placeholder'  name='placeholder' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>classList</label><input type='text' id='classList'  name='classList' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>text</label><input type='text' id='text'  name='text' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>eventType</label><input type='text' id='eventType'  name='eventType' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>src</label><input type='text' id='src'  name='src' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>height</label><input type='text' id='height'  name='height' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>width</label><input type='text' id='width'  name='width' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>href</label><input type='text' id='href'  name='href' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>target</label><input type='text' id='target'  name='target' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>type</label><input type='text' id='type'  name='type' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>method</label><input type='text' id='method'  name='method' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>action</label><input type='text' id='action'  name='action' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>data</label><input type='text' id='data'  name='data' class='info' value='' /></div>" 
		html += " <input type='hidden' id='app_id'  name='app_id' class='info' value=''    /> "; 
		html +="</div></div>"; 
		$('.modal-body').html(html);
 			var footer = ''; 			footer +="<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_create();' >save</button>"; 
			footer +="<button type='button' class='btn btn-default' data-dismiss='modal'  >cancel</button>"; 
		$('.modal-footer').html(footer);
 }); 
  //uncomment if parent class exists: 
/*  
$('.create_from_parent_class_btn').click(function() { 
   //click the hidden anchor link that opens the modal 
	document.getElementById('modal-foo').click(); 
  	var html = "<div class='panel_wrapper'><div id='row_create' >"; 
  		html += "<select id='parent_id'  name='parent_id' class='info'>";   
 	  	 	for(var i = 0; i <= o_parentData.length; i++){  
  	  	 		if(typeof o_parentData[i] != 'undefined'){   
 	  	 			html += "<option value="+o_parentData[i]['id'];   
  	 	 			html +=" >"+o_parentData[i]['name']+"</option>";   
 	  	 		}		  
  	  	 	}   
  	 	 	html += '</select>';  
 			html += " <input type='hidden' id='app_id'  name='app_id' class='info' value=''    /> ";  
 			html +="</div></div>";  
 		$('.modal-body').html(html); 
  	var footer = ''; 
  			footer +="<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_create();' >save</button>";  
 			footer +="<button type='button' class='btn btn-default' data-dismiss='modal'  >cancel</button>";  
 		$('.modal-footer').html(footer); 
  });  
   */  
//  DATA CREATE   /////////////////////////////////////////////////////////////////////////////////         
 function save_create(id) {
 	var data = {};
 	data.id = id;
 	$.each($('#row_create .info'), function(i, e) {
 			//alert(i + '||' + e.name + '||' + e.value);
 			switch(e.name) {
  				case 'element':  
 				data.element = e.value;  
 				break; 
 				case 'id':  
 				data.id = e.value;  
 				break; 
 				case 'name':  
 				data.name = e.value;  
 				break; 
 				case 'value':  
 				data.value = e.value;  
 				break; 
 				case 'placeholder':  
 				data.placeholder = e.value;  
 				break; 
 				case 'classlist':  
 				data.classlist = e.value;  
 				break; 
 				case 'text':  
 				data.text = e.value;  
 				break; 
 				case 'eventtype':  
 				data.eventtype = e.value;  
 				break; 
 				case 'src':  
 				data.src = e.value;  
 				break; 
 				case 'height':  
 				data.height = e.value;  
 				break; 
 				case 'width':  
 				data.width = e.value;  
 				break; 
 				case 'href':  
 				data.href = e.value;  
 				break; 
 				case 'target':  
 				data.target = e.value;  
 				break; 
 				case 'type':  
 				data.type = e.value;  
 				break; 
 				case 'method':  
 				data.method = e.value;  
 				break; 
 				case 'action':  
 				data.action = e.value;  
 				break; 
 				case 'data':  
 				data.data = e.value;  
 				break; 
				default:
 				//default code block
 				break;
 			}
 	});
 	var params = $.param(data);
 	var dataString = 'c=foo_controller&m=create&data_only=true&'+params;
 	
 	//alert(dataString +' || '+  url);
 	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, create_callback);
 }
 function nameByParentId(id){
 	var name = null;
 	for (var i = 0; i <= o_parentData.length; i++) {
 		if ( typeof o_parentData[i] != "undefined") {
 			if (o_parentData[i]['id'] == id){
 				name = o_parentData[i]['name'];
 			}
 		}
 	}
 	return name;
 }
 function create_callback(data){
 	//alert(data);
 	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=foo_controller&m=read');
 }
 //  DATA EDITING   /////////////////////////////////////////////////////////////////////////////////         
 function save_edit(id) {
 	var data = {};
 	data.id = id;
 	$.each($('#row_' + id + ' .info'), function(i, e) {
 			//alert(i + '||' + e.name + '||' + e.value);
 			switch(e.name) {
 
	case 'element':
	data.element = e.value;
	break;
	case 'id':
	data.id = e.value;
	break;
	case 'name':
	data.name = e.value;
	break;
	case 'value':
	data.value = e.value;
	break;
	case 'placeholder':
	data.placeholder = e.value;
	break;
	case 'classlist':
	data.classlist = e.value;
	break;
	case 'text':
	data.text = e.value;
	break;
	case 'eventtype':
	data.eventtype = e.value;
	break;
	case 'src':
	data.src = e.value;
	break;
	case 'height':
	data.height = e.value;
	break;
	case 'width':
	data.width = e.value;
	break;
	case 'href':
	data.href = e.value;
	break;
	case 'target':
	data.target = e.value;
	break;
	case 'type':
	data.type = e.value;
	break;
	case 'method':
	data.method = e.value;
	break;
	case 'action':
	data.action = e.value;
	break;
	case 'data':
	data.data = e.value;
	break;				default:
 				//default code block
 				break;
 			}
 	});
 	var params = $.param(data);
 	var dataString = 'c=foo_controller&m=edit&'+params;
 	
 	//alert(dataString +' || '+  url);
 	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, edit_callback);
 }
 function edit_callback(data){
 	//alert(data);
 	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=foo_controller&m=read');
 }
 function deny() {
 }
 function cancel_edit(id){
 		  $(location).attr('href',JS_CONFIG.BASE_URL+'?c=foo_controller&m=read');
 }
 function delete_foo(id){
 		if(confirm('Are you sure you want to delete this foo?'))
 		{ verify_delete(id); } else {  deny(); }
 }
 function verify_delete(id) {
 	var data = {};
 	data.id = id;
 	var dataString = 'c=foo_controller&m=delete&id=' + data.id  ;
 	 
 	//alert(BASE_URL+'---'+dataString);
 	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, delete_callback);
 }
 function delete_callback(data){
 	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=foo_controller&m=read');
 }
 	 
 </script>
 
  
 <script>  
 	 /* 
  * DISPLAY ( ONLY ) : CURRENT OPTION VALUE 
    html +='<td>'; 
 	 for(var i = 0; i <= o_bigdogs.length; i++){ 
 	 	if(typeof o_bigdogs[i] != "undefined"){ 
 	 		if (o_bigdogs[i]['id'] == row.parent_id){ 
 	 			html +=" "+o_bigdogs[i]['name']+""; 
 	 		} 
 	 	}		 
 	 } 
 	html += '</td>'; 
   */ 
 	/* SELECTION CHOICE:  
  	 *  html += '<select id='parentData'  name='parentData' class='info'>';  
  	 for(var i = 0; i <= o_parentData.length; i++){  
  	 	if(typeof o_parentData[i] != 'undefined'){  
  	 		html += '<option value=''+o_parentData[i]['id']+''';   
 	 		if (o_parentData[i]['id'] == row.parent_id){   
 	 			html += ' selected '   
 	 		}   
 	 		html +=' >'+o_parentData[i]['name']+'</option>'  
  	 	}		  
  	 }   
 	 html += '</select>';   
 	 */   
 	/* BUTTON CHOICE:  
  	 *    html += '<div class='btn-group'>';  
  	 for(var i = 0; i <= o_parentData.length; i++){  
  	 	if(typeof o_parentData[i] != 'undefined'){   
 	 		html += '<button id=''+i+'_'+o_parentData[i]['id']+''  name=''+o_parentData[i]['id']+'' class=' info btn btn-default ';   
 	 		if (o_parentData[i]['id'] == row.parent_id){   
 	 			html += ' active ';  
  	 		}   
 	 		html += '' type='button'> ';  
  	 		html += '<em class='glyphicon glyphicon-user'></em>'+o_parentData[i]['name']+'';   
  	 		html += '</button>  ';   
  	 	}		  
  	 }  
  	 html += '</div>';   
 	 */  
  	/*   
 	 *  BUTTON DROPDOWN MENU   
  		html += '<div class='btn-group'>';  
  		html += '				<button class='btn btn-default'>  ';   
  		html += '					Action  ';   
  		html += '				</button>   ';    
 		html += '				<button data-toggle='dropdown' class='btn btn-default dropdown-toggle'>  ';   
  		html += '					<span class='caret'></span>  ';   
  		html += '				</button>  ';   
  		html += '				<ul class='dropdown-menu'>  ';   
  	 for(var i = 0; i <= o_parentData.length; i++){  
  	 	if(typeof o_parentData[i] != 'undefined'){  
  	 		html += '<li id=''+i+'_'+o_parentData[i]['id']+''  name=''+o_parentData[i]['id']+'' class='info' ';   
 	 		html += '						<a href='#'  id=''+i+'_'+o_parentData[i]['id']+''  name=''+o_parentData[i]['id']+'' class='info'  >'+o_parentData[i]['name']+'</a>  ';   
   	 		html += '</li>  ';   
  	 	}		  
  	 }  
  html += '</ul>  ';   
  html += '</div>';  
      
  	 */  
  </script> 
  