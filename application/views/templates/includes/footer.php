<style>
.footer-wrapper ul.social-icons li:hover{
	border:1px solid #FFF !important;
}
.footer-wrapper ul.social-icons li:hover i,
.social-widget ul.social-icons li a:hover i{
	color:#FFF !important;
		
}

.f-menu-widget ul{
	list-style:none;
	padding-left:5px;
}
.subscribe-wrapper{
	padding:40px 0;
	background:#000;
	margin-bottom:0px;
}
.subscribe-wrapper h2{
	margin-bottom:5px;
	color:#fff;
}
@media (max-width: 768px) {
.subscribe-wrapper h2{
	font-size:14px;
}
}


.subscribe-wrapper  .aa-subscribe-form input[type="submit"] {
  background: #F78536 none repeat scroll 0 0;
  border: 1px solid #F78536;  
}
.subscribe-wrapper .aa-subscribe-form {
  margin: 10px auto 0;
  position: relative;
  width: 100%;
}
.subscribe-wrapper .aa-subscribe-form input[type="email"] {
  border: 1px solid #ccc;
  color: #555;
  height: 40px;
  padding: 5px 125px 5px 10px;
  width: 100%;
}
.subscribe-wrapper .aa-subscribe-form input[type="submit"] {
  color: #fff;
  font-size: 15px;
  font-weight: bold;
  height: 40px;
  letter-spacing: 1px;
  position: absolute;
  right: 0;
  text-transform: uppercase;
  top: 0;
  width: 120px;
}

.social-widget{
	text-align:right
}
@media (max-width: 768px) {
.social-widget{
	text-align:center;
	margin-top:10px;
}
}


</style>

<footer>
<section class="subscribe-wrapper">
      <div class="container">
			<div class="row animate-box">
				<div class="col-md-12 fh5co-heading">
                    <h2><?=show_static_text($lang_id,347);?></h2>
				</div>
			</div>

			<div class="row">
<div class="col-md-12 col-xs-12">
            <div class="mail-subscribe-widget">
              <!--<p>Join our mailing list to stay up to date and get notices about our new releases!</p>-->
              
              <form action="" class="aa-subscribe-form" onsubmit="save_newsletter();return false;">
              <input name="" id="newsletter-input" placeholder="<?=show_static_text($lang_id,81);?>" type="email" required="required">
              <input value="<?=show_static_text($lang_id,12);?>" type="submit">
            </form>
            
              <!--<form class="subscribe" onsubmit="save_newsletter();return false;">
                <input type="text" id="newsletter-input" placeholder="mail@example.com" class="form-control" style="margin-bottom:10px">
                <input type="submit" class="btn btn-primary" value="Submit">
              </form>-->
<div id="show_msges" style="color:#C00"></div>
              
            </div>
            
          </div>
          </div><!--//row//-->
</div>
</section>
<section class="footer-wrapper">
<div class="container">
    <div class="row ">
      
      <div class="col-md-8 col-sm-12">
        <div class="">
          <ul class="list-inline footer-menu">
    <?php
    if(isset($bottom_menu)){
    foreach($bottom_menu as $set_bottom_menu){
    ?>
    <li><a href="<?=$set_bottom_menu->slug?>"><?=$set_bottom_menu->title;?></a></li>
    <?php
    }
    }
    ?>        
          </ul>
        </div>
      </div>
      <!-- .col-md-3 -->
    <div class="col-md-4 col-sm-12 ">
        <div class=" social-widget">
          <ul class="social-icons">
            <li><a href="<?=$settings['twitter_url']?>" target="_blank"><i class="icon-twitter2"></i></a></li>
            <li><a href="<?=$settings['facebook_url']?>" target="_blank"><i class="icon-facebook2"></i></a></li>
            <li><a href="<?=$settings['google_plus']?>" target="_blank"><i class="icon-google-plus"></i></a></li>
          </ul>
        </div>
    </div>
    
    
    
    </div><!--//row//-->
</div>
</section>
      <div class="container">
        <!-- Start Copyright -->
        <div class="copyright-section">
          <div class="row">
            <div class="col-md-12 text-center">
              <p><?=show_static_text($lang_id,62);?></p>
            </div>
            <!-- .col-md-6 -->
            <!--<div class="col-md-6">
              <ul class="footer-nav">
                <li><a href="#">Sitemap</a>
                </li>
                <li><a href="#">Privacy Policy</a>
                </li>
                <li><a href="#">Contact</a>
                </li>
              </ul>
            </div>-->
            <!-- .col-md-6 -->
          </div>
          <!-- .row -->
        </div>
        <!-- End Copyright -->

      </div>
    </footer>

        
<script src="assets/frontend/js/main.js"></script>
<script>
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
function save_newsletter(){
	submitSubscribe =false;
	var newsEmail=$('#newsletter-input').val();
	submitSubscribe  = isEmail(newsEmail);
//	alert(ech);
	
	if(submitSubscribe){
		$('#show_msges').html('sending...');
		$.ajax({
			type:"POST",
			url:"ajax/save_newsletter",
			data:{newsEmail:newsEmail,<?=$this->security->get_csrf_token_name();?>:'<?=$this->security->get_csrf_hash();?>'},
			success:function(data){
				if(data==1)
				{
					$('#show_msges').html('<?=show_static_text($lang_id,190);?>');
				}
				else
				{
					$('#show_msges').html('<?=show_static_text($lang_id,191);?>');
				}
				setTimeout(function(){
				  $('#show_msges').html('');
				}, 3000);
			}
		
		});
	}
	else{
		$('#show_msges').html('<?=show_static_text($lang_id,201);?>');
	}
}
</script>


<div class="message-alert " id="message-alert1" style="display:none"></div>
<div class="popups-msge" >
	<div class="popupmsgcontent " >
    	<div class="alert-msge" >Removed from your Wishlist</div>
	</div>
</div>
<style>
div.message-alert {
  background: #666 none repeat scroll 0 0;
  border-radius: 0 0 3px 3px;
  color: #dfdfdf;
  font-size: 12px;
  font-weight: bold;
  left: 50%;
  margin-left: -200px;
  padding: 20px 33px;
  position: fixed;
  text-align: center;
  top: 0;
  width: 452px;
  z-index: 9999;
}



.popups-msge {
  top: 0;
  pointer-events: none;
  position: fixed;
  text-align: center;
  width: 100%;
  z-index: 18;
}
.popupmsgcontent {
  background: #212121 none repeat scroll 0 0;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 2px;
  box-shadow: 0 1px 6px 0 rgba(0, 0, 0, 0.1);
  color: #fff;
  display: inline-block;
  font-size: 13px;
  margin: 0 auto;
  max-width: 568px;
  pointer-events: none;
  position: relative;
  transform: translateY(-123%);
  transition: transform 0.3s ease-in-out 0s, -webkit-transform 0.3s ease-in-out 0s;

  padding: 20px 33px;
  width: 452px;
  color: #dfdfdf;
  font-weight: bold;
}
.popupmsgcontent.show_msge {
  pointer-events: auto;
  transform: translateY(64px);
}
</style>
<script type="text/javascript">
$(".ajax-loading img").css("width", "5%"); 
</script>