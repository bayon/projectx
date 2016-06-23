function read_item_ByThisId(id){ 
    $('#details_content').fadeIn('fast'); 
    $('.rd_tab').removeClass('active'); 
    $('#data_tab1').addClass('active'); 
    current_parent_id = id;  
    console.log('read_item_By_THIS_ID'); 
    //read_ModelKV($_data)  
    //related_id INSTEAD of PARENT ID 
    // var dataString = "c=item_controller&m=read_ModelKV&model=item&k=parent_id&v="+id+"&data_only=true"; 
     var dataString = "c=item_controller&m=read_ModelKV&model=item&k=related_id&v="+id+"&data_only=true"; 
    ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, read_item_By_THIS_ID_callback); 
 }   
 function read_item_By_THIS_ID_callback(data){ 
    console.log('read_item_By_THIS_ID_callback'); 
    var obj =JSON.parse(data); 
    console.log(obj); 
    format_item(obj); 
        
 }  
 
 
  
 function format_item(obj) { 
     
    console.log('format item');
    //var item_tally = 0;
    console.log(obj);
    var html = "";
    //html += "<a href='#' onclick='addNew_item()'>Add _item</a>";
    //html += "<div id='add_item_form' class='hidden_form'  >";
    //html += "<div class='ui_wrapper'><div id='row_create_item' >";
    //html += "<div class='panel_field'><input type='hidden' id='id'  name='id' class='info' value='' /></div>";
    //html += "<div class='panel_field'>name:<input type='text' id='name'  name='name' class='info' value='' /></div>";
    //html += "<div class='panel_field'><input type='hidden' id='parent_id'  name='parent_id' class='info' value='" + current_parent_id + "' /></div>";
    //html += "<div class='panel_field'><a href='#' onclick='save_create_item();' class='panel_anchor'>save</a></div>";
    //html += "<div class='panel_field'><a href='#' onclick='cancel_create_item();' class='panel_anchor'>cancel</a></div>";
    //html += "</div></div>";
    //html += "</div>";
    html +="<div class='row'>";//class = subtotal_table_wrapper
    html += "<div class='col-md-12'>";
    html += "<div id='details_actions'>details actions</div>";
    html +="<table class='subtotal_table' border=1 >";
    //HIDDEN HEADERS: <th>parent_id</th>
    html +="<tr><th>ID</th><th>Name</th><th>parent_id</th><th>related_id</th><th>Actions</th></tr>";
    //LOOP LIST OF ITEMS
    for (var i = 0; i < obj.length; i++) {
        html += "<tr>";
        html += " <td width='10%' >" + obj[i].id +"</td>";
        html += " <td>" + obj[i].name+"</td>";
        html += " <td>" + obj[i].parent_id+"</td>";
        html += " <td>" + obj[i].related_id+"</td>";
        html += " <td>";
        html += "<button id='" + obj[i].id +"' class='action_button' onclick='item_ACTION(this);' value='delete' >Delete</button>";
        html += "</td>";
        html += "</tr>";
    }
     
    html += "</table>";
    html += "</div>";
    html += "</div>";
    $('#details_content').html(html);
     
     //click the hidden anchor link that opens the modal 
     //row_create_item
    var html = "<div class='panel_wrapper'><div id='row_create_item' >"; 
        html += "<select id='related_id'  name='related_id' class='info'>";   
            for(var i = 0; i <= o_relatedData.length; i++){  
                if(typeof o_relatedData[i] != 'undefined'){   
                    html += "<option value="+o_relatedData[i]['id'];   
                    html +=" >"+o_relatedData[i]['name']+"</option>";   
                }         
            }   
            html += '</select>';  
            html += " <input type='hidden' id='app_id'  name='app_id' class='info' value=''    /> ";  
           
         
    //save_create_item
            html +="<button type='button' class='btn btn-default' data-dismiss='modal' onclick='save_create_item();' >save</button>";  
            html +="<button type='button' class='btn btn-default' data-dismiss='modal'  >cancel</button>";  
           html +="</div></div>";  
        $('#details_actions').html(html); 
    
    
    
 }
  function nameByRelatedId(id){
    var name = null;
    for (var i = 0; i <= o_relatedData.length; i++) {
        if ( typeof o_relatedData[i] != "undefined") {
            if (o_relatedData[i]['id'] == id){
                name = o_relatedData[i]['name'];
            }
        }
    }
    return name;
 }
 
 
 
 
 function item_ACTION(obj){
    if(obj.value == "delete"){
        delete_item(obj.id);
    }
 }
 function cancel_create_item(){
    $('#details_content').fadeOut('slow');
 }
 function addNew_item(){
    $("#add_item_form").css('display','block');
 }
 function submitNew_item(){
    var dataString = "c=item_controller&m=createEmptyForWorkOrderId&id="+current_parent_id+"";
    ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, addNew_item_callback);
 }
 function addNew_item_callback(data){
    console.log(data);
 }
 function save_create_item() {
    var data = {};
    $.each($('#row_create_item .info'), function(i, e) {
        switch(e.name) {
 
            case 'id':
                data.id = e.value;
                break;
            case 'name':
                data.name = e.value;
                break;
                //add parent_id and related_id 
            case 'parent_id':
                data.parent_id = e.value;
                break;
            case 'related_id':
                data.related_id = e.value;
                data.name = nameByRelatedId(data.related_id);
                break;
            default:
                //default code block
                break;
        }
    });
    var params = $.param(data);
    var dataString = 'c=item_controller&m=create&' + params;
    ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, create_callback_item);
 }
 
 function create_callback_item(data){   
    $('#details_content').fadeOut('slow');
 }
 
 function delete_item(id){
        if(confirm('Are you sure you want to delete this items?'))
        { verify_delete_item(id); } else {  deny(); }
 }
 function verify_delete_item(id) {
    var data = {};
    data.id = id;
    var dataString = 'c=item_controller&m=delete&id=' + data.id  ;
    //alert(BASE_URL+'---'+dataString);
    ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL, delete_item_callback);
 }
 function delete_item_callback(data){
    $('#details_content').fadeOut('slow');
 }
   
 