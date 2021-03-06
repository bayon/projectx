<script> 
 // PARAMETERS ///////////////////////////////////////////////////////////////////////////
 var controller = 'apple_controller'; 
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
 <div style='margin-top:5%;' class='modal fade' id='modal-container-apple' role='dialog' aria-labelledby='myModalLabel' aria-hidden='false'>
 	<div class='modal-dialog'>
 		<div class='modal-content'>
 			<div class='modal-header'>
 				<button type='button' class='close' data-dismiss='modal' aria-hidden='false'>
 					×
 				</button>
 				<h4 class='modal-title' id='myModalLabel'> apple </h4>
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
 				<div class='tablelite-title-row'><h3>apple<button class='create_btn' >+</button> 					<a id='modal-apple' style='' href='#modal-container-apple' role='button' class='btn invisible' data-toggle='modal'>modal-1</a>
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
 									<th></th>									<th>id</th>
									<th>name</th>
									<th>parent_id</th>
									<th>related_id</th>
									<th>parent_class</th>
									<th>created</th>
									<th>modified</th>
									<th>author_id</th>
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
 						html += '<td>' + row.id + '</td>';
 						html += '<td>' + row.name + '</td>';
 						html += '<td>' + row.parent_id + '</td>';
 						html += '<td>' + row.related_id + '</td>';
 						html += '<td>' + row.parent_class + '</td>';
 						html += '<td>' + row.created + '</td>';
 						html += '<td>' + row.modified + '</td>';
 						html += '<td>' + row.author_id + '</td>';
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
 	var dataString = "c=apple_controller&m=readToJSON&data_only=true";
 	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, load_data_callback);
 }
 	( function() {
 			$('#BG_IMG').addClass('gradient6');//be sure to remove unwanted classes before applying a new one.
 		}()); 
 //  POPULATE DETAILS PANEL  /////////////////////////////////////////////////////////////////////////////////
 function rowClick(i) {
 	document.getElementById('modal-apple').click();
 		var html = "<div class='panel_wrapper'><div id='row_" + TABLE_DATA[i]['id'] + "' >";
 		html += "<div class='panel_field'><label>id</label><input type='text' id='id'  name='id' class='info' value='"+TABLE_DATA[i]['id']+"' /> </div>" 
		html += "<div class='panel_field'><label>name</label><input type='text' id='name'  name='name' class='info' value='"+TABLE_DATA[i]['name']+"' /> </div>" 
		html += "<div class='panel_field'><label>parent_id</label><input type='text' id='parent_id'  name='parent_id' class='info' value='"+TABLE_DATA[i]['parent_id']+"' /> </div>" 
		html += "<div class='panel_field'><label>related_id</label><input type='text' id='related_id'  name='related_id' class='info' value='"+TABLE_DATA[i]['related_id']+"' /> </div>" 
		html += "<div class='panel_field'><label>parent_class</label><input type='text' id='parent_class'  name='parent_class' class='info' value='"+TABLE_DATA[i]['parent_class']+"' /> </div>" 
		html += "<div class='panel_field'><label>created</label><input type='text' id='created'  name='created' class='info' value='"+TABLE_DATA[i]['created']+"' /> </div>" 
		html += "<div class='panel_field'><label>modified</label><input type='text' id='modified'  name='modified' class='info' value='"+TABLE_DATA[i]['modified']+"' /> </div>" 
		html += "<div class='panel_field'><label>author_id</label><input type='text' id='author_id'  name='author_id' class='info' value='"+TABLE_DATA[i]['author_id']+"' /> </div>" 
		html += " <input type='hidden' id='app_id'  name='app_id' class='info' value='" + TABLE_DATA[i]['app_id'] + "'    /> ";
 		html +="</div></div>";
 		$('.modal-body').html(html);
 		var footer='';		footer +="<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_edit( "  +TABLE_DATA[i]['id']+");'  >save</button>"; 
		footer +="<button type='button' class='btn btn-default' data-dismiss='modal' onclick='delete_apple( "  +TABLE_DATA[i]['id']+");'  >delete</button>"; 
		footer +="<button type='button' class='btn btn-default' data-dismiss='modal'   >cancel</button>"; 
 		$('.modal-footer').html(footer);
 }
 
 function rowClick_drillDown(i){
  		//i = data index, NOT id.
 		var table_header =  'apple' ;
 		var html = "<div class=' panel_wrapper'><div id='row_" + TABLE_DATA[i]['id'] + "' >";
 		html += "<div class='panel_table_title'>" + table_header + "</div>";
 	 	html += "<div class='panel_field'><label>#</label><input type='text' id='id'  name='id' class='info' value='"+TABLE_DATA[i]['id']+"' /></div>"
 	 	html += "<div class='panel_field'><label>Name</label><input type='text' id='name'  name='name' class='info' value='"+TABLE_DATA[i]['name']+"' /></div>"
 	   	html += "<div class='panel_action_fields'>";
 	    html += "<div class='panel_field'><button  onclick='delete_apple( "+TABLE_DATA[i]['id']+");' class='panel_btn btn_delete'>Delete</button></div>";
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
	document.getElementById('modal-apple').click();
 		var html = "<div class='panel_wrapper'><div id='row_create' >";
 		html += "<div class='panel_field'><label>id</label><input type='text' id='id'  name='id' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>name</label><input type='text' id='name'  name='name' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>parent_id</label><input type='text' id='parent_id'  name='parent_id' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>related_id</label><input type='text' id='related_id'  name='related_id' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>parent_class</label><input type='text' id='parent_class'  name='parent_class' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>created</label><input type='text' id='created'  name='created' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>modified</label><input type='text' id='modified'  name='modified' class='info' value='' /></div>" 
		html += "<div class='panel_field'><label>author_id</label><input type='text' id='author_id'  name='author_id' class='info' value='' /></div>" 
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
	document.getElementById('modal-apple').click(); 
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
  				case 'id':  
 				data.id = e.value;  
 				break; 
 				case 'name':  
 				data.name = e.value;  
 				break; 
 				case 'parent_id':  
 				data.parent_id = e.value;  
 /*  
 				data.name = nameByParentId(data.parent_id); 
  */  
 				break; 
 				case 'related_id':  
 				data.related_id = e.value;  
 				break; 
 				case 'parent_class':  
 				data.parent_class = e.value;  
 				break; 
 				case 'created':  
 				data.created = e.value;  
 				break; 
 				case 'modified':  
 				data.modified = e.value;  
 				break; 
 				case 'author_id':  
 				data.author_id = e.value;  
 				break; 
				default:
 				//default code block
 				break;
 			}
 	});
 	var params = $.param(data);
 	var dataString = 'c=apple_controller&m=create&data_only=true&'+params;
 	
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
 	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=apple_controller&m=read');
 }
 //  DATA EDITING   /////////////////////////////////////////////////////////////////////////////////         
 function save_edit(id) {
 	var data = {};
 	data.id = id;
 	$.each($('#row_' + id + ' .info'), function(i, e) {
 			//alert(i + '||' + e.name + '||' + e.value);
 			switch(e.name) {
 
	case 'id':
	data.id = e.value;
	break;
	case 'name':
	data.name = e.value;
	break;
	case 'parent_id':
	data.parent_id = e.value;
	break;
	case 'related_id':
	data.related_id = e.value;
	break;
	case 'parent_class':
	data.parent_class = e.value;
	break;
	case 'created':
	data.created = e.value;
	break;
	case 'modified':
	data.modified = e.value;
	break;
	case 'author_id':
	data.author_id = e.value;
	break;				default:
 				//default code block
 				break;
 			}
 	});
 	var params = $.param(data);
 	var dataString = 'c=apple_controller&m=edit&'+params;
 	
 	//alert(dataString +' || '+  url);
 	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, edit_callback);
 }
 function edit_callback(data){
 	//alert(data);
 	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=apple_controller&m=read');
 }
 function deny() {
 }
 function cancel_edit(id){
 		  $(location).attr('href',JS_CONFIG.BASE_URL+'?c=apple_controller&m=read');
 }
 function delete_apple(id){
 		if(confirm('Are you sure you want to delete this apple?'))
 		{ verify_delete(id); } else {  deny(); }
 }
 function verify_delete(id) {
 	var data = {};
 	data.id = id;
 	var dataString = 'c=apple_controller&m=delete&id=' + data.id  ;
 	 
 	//alert(BASE_URL+'---'+dataString);
 	ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, delete_callback);
 }
 function delete_callback(data){
 	 $(location).attr('href',JS_CONFIG.BASE_URL+'?c=apple_controller&m=read');
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
  