
<?php
// need code to query sub data...
//similar to ...
// HERE WE SHOULD QUERY THE status data
		//Pagination: query sub data
		$status = new Status();
		$stati = $status-> read_Status();
		$stati_json = json_encode($stati);
		//convert sub-data to js
		echo("<script>  var stati = ".$stati_json."; </script>");
?>


<script>
//selector for a NEW form
	 //html +="<div class='panel_field'>status";
	 html += "<select id='status'  name='status' class='info'>";
	 for(var status = 0; status <= stati.length; status++){
	 	if(typeof stati[status] != "undefined"){
	 		html += "<option value='"+stati[status]['id']+"' >"+stati[status]['name']+"</option>"
	 	}
	 }
	 html += "</select>";
	// html += "</div>";
</script>


<script>
//selector built by reference class. ie. status types...etc.
// MAY CONTAIN EXISTING VALUE.
	// html +="<div class='panel_field'>Status";
	 html += "<select id='status'  name='status' class='info'>";
	 for(var status = 0; status <= stati.length; status++){
	 	if(typeof stati[status] != "undefined"){
	 		html += "<option value='"+stati[status]['id']+"'";
	 		if (stati[status]['id'] == data[i]['status']){
	 			html += " selected "
	 		}
	 		html +=" >"+stati[status]['name']+"</option>"
	 	}		
	 }
	 html += "</select>";
	// html += "</div>";
</script>

<script>
var data_X = [{"id":"1","name":"little blue","thing1":"","thing2":"","parent_id":"2"},{"id":"3","name":"little blue green","thing1":"","thing2":"","parent_id":"2"},{"id":"4","name":"aqua","thing1":"","thing2":"","parent_id":"2"}];
	/////////  experimental ////////////
	// 
	//1) existing_data_object= data[] 
	//2) sub_data_object= stati[]  
	//3) field_name = 'status' 
	
	
	function makeSelect_persistant(persistantData,subData,fieldname){
	var MODULE = (function () {
		var obj = {},
			privateVariable = 1;
	
		function privateMethod() {
			// ...
		}
	
		obj.moduleProperty = 1;
		obj.persistantData = persistantData;
		obj.subData = subData;
		obj.fieldname = fieldname;
		
		
		
			obj.moduleMethod = function () {
				// ...
			};
		        obj.html = function(){
		        	
		      //  html ="<select>";
		       // html += "options and option logic";
		       // html += "</select>";
		         html += "<select id='"+fieldname+"'  name='"+fieldname+"' class='info'>";
				 for(var n = 0; n <= obj.subData.length; n++){
				 	if(typeof obj.subData[n] != "undefined"){
				 		html += "<option value='"+obj.subData[n]['id']+"'";
				 		if (obj.subData[n]['id'] == obj.persistantData[i][fieldname]){
				 			html += " selected "
				 		}
				 		html +=" >"+obj.subData[n]['name']+"</option>"
				 	}		
				 }
				 html += "</select>";
		        
		        
		        
		        
		        return html;
		}
			return obj;
		}());
		return MODULE;
	}
</script>





