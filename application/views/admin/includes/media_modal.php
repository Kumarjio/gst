<div class="modal fade" tabindex="-1" role="dialog" id="media-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Select File</h4>
      </div>
      <div class="modal-body">
               <div id="modal-loader" style="display: none; text-align: center;">
                <img src="assets/uploads/ajax-loader.gif">
               </div>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'media')">From Media Gallery</button>
  <button class="tablinks" onclick="openCity(event, 'upload')">Upload New File</button>
</div>
       <div id="media" class="tabcontent">
  <h3>Select</h3>
  <div id="dynamic-content"></div>
</div>

<div id="upload" class="tabcontent">
   <h3>Upload</h3>
  <form enctype="multipart/form-data" class = 'form-horizontal' role ="form" id="uploadimage" method="POST" action="/admin/media/upload_media">                 
     <div class="form-body">                    
        <div class="col-md-12">
            <div class="form-group" >
            	  <label class="col-lg-2 control-label">Name</label>
        	      <div class="col-lg-10">
    	            <input type="text" name="name" required="required" class="form-control " id="image_name" placeholder="Name">
					 </div>
		    </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">File</label>
              <div class="col-lg-10">
					<input type="file" name="img_src" required="required" id="myFile"><span>Please Upload image or video</span>
	                </div>
            </div> 
		</div><div style="clear:both"></div>
     	
	</div>
     <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-2 col-md-9">
                 <button class="btn btn-primary m-r-5 m-b-5" type="submit" >save</button>
                </div>
            </div>
        </div>
       </form>
		
</div>
<!--     <div id="dynamic-content"></div>-->
      </div>
  
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<style>
.media-products h3{
	font-size:12px;
}

.media-products {
	overflow-y:auto; 
	overflow-x:hidden;
	height:300px;
}
/*9-june-2017 - wp media gallery/
 /* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
#media {
    display: block;
}
</style>
<!-- 9-june-2017 *** media gallery  -->
<script>
function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
} 
/*function image_upload()
{
	var name=$("#image_name").val();
	var img=$("#img_src").val();
  alert(name);
          $('input[type="file"]').change(function(e){

            var fileName = e.target.files[0].name;
   alert(fileName);
		  });
}
*/
/*$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
var name=$("#image_name").val();
	//var img=$("#img_src").val();
	var x = document.getElementById("myFile").value;
  alert(x);
   $.ajax({
     type: 'post',
     url: '/admin/media/upload_media',
     data: {
      imgname:name, imgsrc:x,
     },

    success: function (response) 
	  {
		  alert(response);
        //  $("#response").html(response);
      } 
   });
}));*/
</script>
