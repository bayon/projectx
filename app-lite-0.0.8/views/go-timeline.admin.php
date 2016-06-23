<div id="go_timeline_admin" class="container-fluid animated fadeIn kioview" style="text-align:center;"  >
     
     <div class="row top-row">
        <div class="col-md-12  ">
            
            <!-- //////////////////////////////////////////////   --- -->
            
            
 
       
        
        <link rel='stylesheet' type='text/css' href='js/go-timeline/css/gotimeline.css'>
        <!-- <link rel='stylesheet' type='text/css' href='bootstrap.min.css'>
        <script src="jquery-1.11.2.min.js"></script>
        <script src="jquery-ui.js"></script>
        <script src="hammer.js"></script>  js/go-timeline/-->
        <script src="js/go-timeline/timeline_item.js"></script>
        <script src="js/go-timeline/ajax.js"></script>
        <script src="js/go-timeline/config.js"></script>
        <!--<script src="modernizr-2.8.3.min.js"></script>
        <script src="bootstrap.min.js"></script> -->
        <style>
            a{
                font-weight:bold;color:#00A;
                margin-right:25px;
            }
            tr:hover{
                background-color:#eee;
            }
             
            .form_element input{
                 width:100%;
                
            }
            .form_element{
                width:90%;min-width:90%;max-width:90%; 
                margin:1% 5% 0% 5%;
            }
             
        </style>
            
            <!-- <body onload="initUI();" style="text-align:center;overflow:hidden;"> -->
                <div style="margin:2% 2% 2% 2% !important;">
                   <!--  <a href="timelineGo.html" >TIMELINE</a> -->
                    <a href="?pg=go-timeline.view.html&title=go timeline">TIMELINE</a>
                </div>
                
                 <div style="width:90%;margin-left:5%;">
                    
                <div id="scroll_table" style="max-height:150px;overflow-y:scroll;">
                <table border=0 class='table table-striped table-condensed table-bordered table-rounded' >
                            <script> var data = []; </script>  
                            <thead>
                                <tr>
                                    
             <th id='id' class='th_link'  >id</th><th id='id' class='th_link'  >event_name</th><th id='id' class='th_link'  >event_img</th><th id='id' class='th_link'  >event_description</th><th id='id' class='th_link'  >date_timestamp</th>             
                                </tr>
                            </thead>
                            <tbody class='paginator_table_body'>
                                <?php /*
                                <?php for( $i = 0; $i < count( $data ); $i++ ) : ?>
                                    
                                        <tr   id='<?php echo $i; ?>' class='data_row'   title='click to edit'  >
                                      <td><?php echo $data[$i]['id']; ?></td><td><?php echo $data[$i]['event_name']; ?></td><td><?php echo $data[$i]['event_img']; ?></td><td><?php echo $data[$i]['event_description']; ?></td><td><?php echo $data[$i]['date_timestamp']; ?></td>                              
                                        </tr>
                                 <?php 
                                    $json = json_encode($data[$i]);
                                    echo('
                                        <script>
                                            //This script is filling out the details panel by row.
                                            var row_' . $i . ' = ' . $json . ';
                                            data.push(row_' . $i . ');
                                        </script>
                                    ');
                                 ?>      
                                <?php endfor; ?>
                                 * */ ?>
                                
                            </tbody>
                        </table>
                        </div>
                        <hr>
                        <div style="float:left;width:90%;">
                             <div class='paginator_details_content' style="float:left;width:40%;text-align:left;"></div>
                            <div class='paginator_create_content' style="float:left;width:40%;text-align:left;"></div>
                            
                        </div>
                   </div>
                 <hr>
                 
                <script>
                    // PARAMETERS ///////////////////////////////////////////////////////////////////////////////////////////
        var controller = 'timelineevent_controller';
          
        
        //  POPULATE DETAILS PANEL  /////////////////////////////////////////////////////////////////////////////////
        $('.data_row').click(function() {
            
            $('.paginator_create_content').css('opacity','0');
             
            var i = this.id;
             
            var display_fields = ['id','name','thing1','thing2'];
            
            $('.paginator_details_content').html(html);
        
                var html = "<div class='ui_wrapper'><div id='row_" + data[i]['id'] + "' >";
                 
                html += "<div class='form_element'><h3>update:</h3></div>";
                
        //console.log(data[i]['date_timestamp']);
             html += "<div class='form_element'>id:</div><div class='form_element'><input type='text' id='id'  name='id' class='info' value='"+data[i]['id']+"' /> </div>" 
             html += "<div class='form_element'>event_name:</div><div class='form_element'><input type='text' id='event_name'  name='event_name' class='info' value='"+data[i]['event_name']+"' /> </div>" 
             html += "<div class='form_element'>event_img:</div><div class='form_element'><input type='text' id='event_img'  name='event_img' class='info' value='"+data[i]['event_img']+"' /> </div>" 
             html += "<div class='form_element'>event_description:</div><div class='form_element'><input type='text' id='event_description'  name='event_description' class='info' value='"+data[i]['event_description']+"' /> </div>" 
             html += "<form>";
             html += "<div class='form_element'>date_timestamp:</div><div class='form_element'><input type='date' id='date_timestamp'  name='date_timestamp' class='info' value="+data[i]['date_timestamp']+" /> </div>"     
                html +="</form>";
                html += " <input type='hidden' id='app_id'  name='app_id' class='info' value='" + data[i]['app_id'] + "'    /> ";
                html += "<div class='form_element'><a onclick='save_edit( "  +data[i]['id']+");' class='panel_anchor'>save</a></div>";
                html += "<div class='form_element'><a onclick='cancel_edit( "+data[i]['id']+");' class='panel_anchor'>cancel</a></div>";
                html += "<div class='form_element'><a onclick='delete_this( "+data[i]['id']+");' class='panel_anchor'>delete</a></div>";
                html +="</div></div>";
            $('.paginator_details_content').html(html);
            //panel_slide_in();
            /*$('.paginator_details_content').click(function() {
                 // ADD A CONDITION TO CLICK EVENT
                 // SO THAT DATA INPUTS CAN BE ACCESSED.
                   if( ! $( event.target).is('input') ) {
                       panel_slide_out();
                  }
            });*/
        
        });
         
        ////   DATA CREATE ////////////////////////////////////////////////
        function save_create() {
            var data = {};
            ////alert(id);
            //data.id = id;
                $.each($('#row_create .info'), function(i, e) {
                        ////alert(i + '||' + e.name + '||' + e.value);
                        switch(e.name) {
                            
            case 'id':
            data.id = e.value;
            break;
            case 'event_name':
            data.event_name = e.value;
            break;
            case 'event_img':
            data.event_img = e.value;
            break;
            case 'event_description':
            data.event_description = e.value;
            break;
            case 'date_timestamp':
            data.date_timestamp = e.value;
            break;
                            default:
                            //default code block
                            break;
                        }
                });
                var params = $.param(data);
                var dataString = 'c='+controller+'&m=create&'+params;
                 
                alert(JS_CONFIG.BASE_URL+'js/go-timeline/server.php?'+dataString);
                console.log(JS_CONFIG.BASE_URL+'js/go-timeline/server.php?'+dataString);
                ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL+'js/go-timeline/server.php', create_callback);
        }
        function create_callback(data){
           // alert('uncomment redirect');
            //console.log('create callback');
            console.log(data);
            //?pg=go-timeline.view.html&title=go timeline
            $(location).attr('href',JS_CONFIG.BASE_URL+'?pg=go-timeline.view.html&title=go timeline');
        }
        
        ////   DATA EDIT ////////////////////////////////////////////////
        function save_edit(id) {
            var data = {};
            ////alert(id);
            data.id = id;
                $.each($('#row_' + id + ' .info'), function(i, e) {
                        ////alert(i + '||' + e.name + '||' + e.value);
                        switch(e.name) {
                            
            case 'id':
            data.id = e.value;
            break;
            case 'event_name':
            data.event_name = e.value;
            break;
            case 'event_img':
            data.event_img = e.value;
            break;
            case 'event_description':
            data.event_description = e.value;
            break;
            case 'date_timestamp':
            data.date_timestamp = e.value;
            break;
                            default:
                            //default code block
                            break;
                        }
                });
                var params = $.param(data);
                var dataString = 'c='+controller+'&m=edit&'+params;
                 
                //alert(dataString +' || '+  JS_CONFIG.BASE_URL);
                ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL+'js/go-timeline/server.php', edit_callback);
        }
        function edit_callback(data){
            ////alert('uncomment redirect');
            //console.log(data);
            $(location).attr('href',JS_CONFIG.BASE_URL+'js/go-timeline/server.php?c='+controller+'&m=read');
        }
        
        function deny() {
        }
        function cancel_edit(id){
                  $(location).attr('href',JS_CONFIG.BASE_URL+'js/go-timeline/server.php?c='+controller+'&m=read');
        }
        function delete_this(id){
                if(confirm('Are you sure you want to delete this ?'))
                { verify_delete(id); } else {  deny(); }
        }
        function verify_delete(id) {
            var data = {};
            data.id = id;
            var dataString = 'c='+controller+'&m=delete&id=' + data.id  ;
         
            //alert(JS_CONFIG.BASE_URL+'---'+dataString);
            ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL+'js/go-timeline/server.php', delete_callback);
        }
        function delete_callback(data){
             $(location).attr('href',JS_CONFIG.BASE_URL+'js/go-timeline/server.php?c='+controller+'&m=read');
        }
            function initUI(){
                var table_header =  'TimelineEvent' ;
                var display_fields = ['id','name','thing1','thing2'];
                $('.paginator_create_content').html(html);
                    var html = "<div class='ui_wrapper' ><div id='row_create' >";
                     
                    html += "<div class='form_element'><h3>create:</h3></div>";
                    
                 html += "<div class='form_element'>id:</div><div class='form_element'><input type='text' id='id'  name='id' class='info' value='' /></div>" 
                 html += "<div class='form_element'>event_name:</div><div class='form_element'><input type='text' id='event_name'  name='event_name' class='info' value='' /></div>" 
                 html += "<div class='form_element'>event_img:</div><div class='form_element'><input type='text' id='event_img'  name='event_img' class='info' value='' /></div>" 
                 html += "<div class='form_element'>event_description:</div><div class='form_element'><input type='text' id='event_description'  name='event_description' class='info' value='' /></div>" 
                 html += "<div class='form_element'>date_timestamp:</div><div class='form_element'><input type='date' id='date_timestamp'  name='date_timestamp' class='info' value='' /></div>" 
                    html += " <input type='hidden' id='app_id'  name='app_id' class='info' value=''    /> ";
                    html += "<div class='form_element'><a onclick='save_create();' class='panel_anchor'>save</a></div>";
                    html += "<div class='form_element'><a onclick='cancel_create();' class='panel_anchor'>cancel</a></div>";
                    html +="</div></div>";
                $('.paginator_create_content').html(html);
                
                //console.log("data");
                //console.log(data);
            } 
                </script>
                <script>
           /* $(function(){           
                if (!Modernizr.inputtypes.date) {
                // If not native HTML5 support, fallback to jQuery datePicker
                    $('input[type=date]').datepicker({
                        // Consistent format with the HTML5 picker
                            dateFormat : 'yy-mm-dd'
                        },
                        // Localization
                        $.datepicker.regional['it']
                    );
                }
            });*/
        </script>
            

            <!-- ////////////////////////////////////////   -->
            
             
        </div>
     </div>
</div>
<!-- BACKGROUND IMAGES -->
<div id="BG_IMG">
    &nbsp;
    <!-- <img src="img/sky.jpg"> -->
</div>
<div id="BG_IMG_LEFT">
    &nbsp;
</div>
<div id="BG_IMG_RIGHT">
    &nbsp;
</div>
<div id="BG_IMG_TOP">
    &nbsp;
</div>
<!-- end of BACKGROUND IMAGES -->
<script>
    ( function() {
            $('#BG_IMG').addClass('gradient6');//be sure to remove unwanted classes before applying a new one.
        }()); 
</script>
<script>
 function buildPaginationData(data){
     console.log("fn: buildPaginationData(data)");
     console.log(data);
     /*
      * <tr   id='< ? php echo $i; ?>' class='data_row'   title='click to edit'  >
                                      <td>< ?php echo $data[$i]['id']; ?></td><td>< ?php echo $data[$i]['event_name']; ?></td><td>< ?php echo $data[$i]['event_img']; ?></td><td>< ?php echo $data[$i]['event_description']; ?></td><td>< ?php echo $data[$i]['date_timestamp']; ?></td>                              
                                        </tr>
      */
     var html = "";
     for(var i=0; i< data.length;i++){
         html += "<tr id='"+i+"' class='data_row'   title='click to edit' >";
           html += "<td>"+data[i]['id']+"</td>";
         html += "<td>"+data[i]['event_name']+"</td>";
          html += "<td>"+data[i]['event_img']+"</td>";
           html += "<td>"+data[i]['event_description']+"</td>";
            html += "<td>"+data[i]['date_timestamp']+"</td>";
         html += "</tr>";
     }
     $(".paginator_table_body").html(html);
 }
function getTimeDimensionData_callback(json){
                var obj = JSON.parse(json);
                //console.log(obj);
                console.log('DAYS:');
                console.log(obj.days);
                console.log('Events:');
                console.log(obj.events);
                
               // buildTimelineDimension(obj);
                data = obj.events;
                buildPaginationData(data);
                 initUI();
            }
            //////////////////////////////////////////////////////
            function getTimeDimensionData(){
                var dataString = 'c=time_dimension_controller&m=readJSON';
                //alert(JS_CONFIG.BASE_URL+'server.php?'+dataString);
                console.log(JS_CONFIG.BASE_URL+'js/go-timeline/server.php?'+dataString);
                ajax_datastring_URL_callback(dataString, JS_CONFIG.BASE_URL+'js/go-timeline/server.php', getTimeDimensionData_callback);
            }
    $(document).ready(function(){
        getTimeDimensionData();
        //initUI();
    });
</script>

<!-- ////////////////////////////   -->
 