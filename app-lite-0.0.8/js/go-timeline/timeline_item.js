function makeTimelineItem(id,event_name,event_img,event_description,date_timestamp ) {
	var TimelineItem = ( function() {
			var obj = {}, privateVariable = 1;

			function privateMethod() {
				// ...
			}


			obj.moduleProperty = 1;
			obj.id = id;
			obj.event_name = event_name;
			obj.event_img = event_img;
			obj.event_description = event_description;
			//obj.date_year = date_year;
			//obj.date_month = date_month;
			//obj.date_day = date_day;
			obj.date_timestamp = date_timestamp;
			
			obj.moduleMethod = function() {
				// ...
			};
			obj.html = function() {
				html = "<div class='timeline_event_content'>";
				html += "content";
				html += this.event_html();
				html += this.date_html();
				html += "</div>";
				return html;
			};
			obj.event_html = function() {
				event_html = "<div id='event_id_"+this.id+"' class='timeline_event'>";
				event_html += "<div class='event_name'>"+this.event_name+"</div>";
				event_html += "<div class='event_description'>"+this.event_description+"</div>";
				event_html += "<div class='event_img'  style='background-image:url("+this.event_img+");'></div>";
				// comment out bootstrap class: class='btn  btn-sm '
				event_html += " <div class='event_btn'> <button class='modal_btn' type='button'  data-toggle='modal' data-target='#myModal_"+this.id+"'>see</button></div>";
				//<img src='"+this.event_img+"' width=100% >
				////////////////////////////////////////
				/*
				 * 
				 * mobile friendly button code:?
				 *  $('.List li').on('click touchstart', function() {
        $('.Div').slideDown('500');
        $('#myModal').modal({ show: false});
        $('#myModal').modal('show');
    });
    
    
    // LEFT OFF HERE wanting to apply this modal click with javascript to make work on ipad.....
    
    
				 */
				  event_html += "<!-- Modal -->";
				 event_html += " <div class='modal fade' id='myModal_"+this.id+"' role='dialog' style='margin-top:25%;' >";
				 event_html += "   <div class='modal-dialog'>"; 
				 event_html += "     <!-- Modal content-->";
				 event_html += "     <div class='modal-content'>";
				 event_html += "       <div class='modal-header'>";
				 event_html += "         <button type='button' class='close' data-dismiss='modal'>&times;</button>";
				 event_html += "         <h4 class='modal-title'>"+this.event_name+"</h4>";
				 event_html += "       </div>";
				 event_html += "       <div class='modal-body'>";
				 event_html += "         <p>"+this.event_description;
				 event_html += "<div class='event_img'  style='background-image:url("+this.event_img+");'></div>";
				 event_html += "</p>";
				 event_html += "       </div>";
				event_html += "      <div class='modal-footer'>";
				 event_html += "         <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
				 event_html += "       </div>";
				 event_html += "     </div>";    
				 event_html += "   </div>";
				 event_html += " </div>";
				 
				/////////////////////////////////////////
				event_html += "</div>";
				return event_html;
			};
			obj.date_html = function() {
				date_html = "<div class='timeline_date' >";
				date_html += "<div class='date_timestamp'>"+this.date_timestamp+"</div>";
				date_html += "</div>";
				return date_html;
			};
			return obj;
		}());
	return TimelineItem;
}

