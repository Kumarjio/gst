<link href="<?php echo base_url(); ?>assets/user/css/welcome.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/chat/js/jScrollPane/jScrollPane.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/chat/css/page.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/chat/css/chat.css" />
<!--<script type="text/javascript">
/*function confirm_box(){
	var answer = confirm ("Are you sure?");
	if(!answer)
	 return false;
	}
	
*/	
</script>
-->
<style>
.article{
	border:solid 1px #D7D7D7;
	border-radius:5px;
	padding:7px;
}

.article_content{
	float:left !important;
	margin:15px 10px 15px;
	height:380px;
}

</style> 

<!-- start content-outer -->
<div id="content-outer" style="height:500px;">
<!-- start content -->
<div id="content" style="padding:3px 0 30px;max-width:1325px">


<?php
if(isset($user_details)){
	$this->db->select('AVG(rating_points) as swipe_rating_point');
	$this->db->where('user_id',$user_details['id']);
	$this->db->where("rating_type", "PARTNER_RATING");
	$this->db->where("transaction_type", "SWAP_SOLO");
	//$this->db->where( "rating", "BAD");
	$query=$this->db->get('user_rating');
	$result=$query->row();
	if(!empty($result)){
		$swipe_rating_points = round($result->swipe_rating_point,2);
	}
	else{
		$swipe_rating_points = 0;
	}

	$this->db->select('AVG(rating_points) as solo_rating');
	$this->db->where('user_id',$user_details['id']);
	$this->db->where("rating_type", "PARTNER_RATING");
	$this->db->where("transaction_type", "BUY_SOLO");
	//$this->db->where( "rating", "BAD");
	$query1=$this->db->get('user_rating');
	$result1=$query1->row();
	if(!empty($result1)){
		$solo_rating_points = round($result1->solo_rating,2);
	}
	else{
		$solo_rating_points = 0;
	}

?>
<div class="dashboard" style="margin:30px 0px -14px 37px">
	<div class="my_bio_info" style="width:1252px">
						<div class="skin_my_bio_info">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tbody>
									<tr>
									<td width="135"><span class="photo">
                                    <?php 
										if(!empty($user_details['image'])){
											$image  = 'assets/user/images/user/'.$user_details['image'];		
										}
										else{
											$image = 'assets/templates/images/soloex_logo.jpg';
										}
									?>
                                        	<img
												src="<?php echo $image; ?>"

												alt="<?php if($user_details['username']){ echo $user_details['username'];} else{ echo 'demo';}?>"
												title="<?php if($user_details['username']){ echo $user_details['username'];} else{ echo 'demo';}?>"
												height="100" width="115"> </span>
										</td>
										<td valign="top">

											<table class="row1" border="0" cellpadding="0"
												cellspacing="0" width="97%">
												<tbody>
													<tr>
														<td><span class="fullname"><?php if($user_details['username']){ echo $user_details['username'];} else{ echo 'demo';}?>
														</span>
														</td>
														<td align="right" width="300"><span class="member_for">Member
																for 1 months 1 weeks </span>
														</td>
														<td align="right" width="160"><a
															href=""
															target="_blank">Profile views:</a> 0</td>
													</tr>
												</tbody>
											</table>
											<?php 
												$this->db->select('SUM(rating_points) as swappoints');
												$this->db->where('user_id',$user_details['id']);
												$this->db->where("rating_type", "SWAP_ACCEPTED");
												$q=$this->db->get('user_rating');
												$row=$q->row();
												$score=$row->swappoints;
												
												$this->db->select('COUNT(rating_points) as likes');
												$this->db->where('user_id',$user_details['id']);
												$this->db->where("rating_type", "PARTNER_RATING");
												$this->db->where("transaction_type", "SWAP_SOLO");
												$this->db->where( "rating", "GOOD");
												$q1=$this->db->get('user_rating');
												$row=$q1->row();
												$likes=$row->likes;
												
												
												$this->db->select('COUNT(rating_points) as dislikes');
												$this->db->where('user_id',$user_details['id']);
												$this->db->where("rating_type", "PARTNER_RATING");
												$this->db->where("transaction_type", "SWAP_SOLO");
												$this->db->where( "rating", "BAD");
												$q1=$this->db->get('user_rating');
												$row=$q1->row();
												$dislikes=$row->dislikes;
											?>
											<table class="row2" border="0" cellpadding="0"
												cellspacing="0">
												<tbody>
													<tr>
														<td width="60"><span class="value row_title">Swaps:</span>
														</td>
														<td width="105"><a href=""
															onclick="xajax_outScoresHistory(56616, 'adswap', 0); return false;"><span
																class="value"><?php echo $score?> points</span> </a>
														</td>
														<td width="20"><img
															src="assets/user/images/i_post_rating.png"
															alt="Rating" class="hover_tooltip_reputation" height="16"
															width="16">
															<div id="tooltip_reputation" class="tooltip_reputation"
																position="bottom center"
																style="display: none; line-height: normal">

																<table class="tooltip_layer_table" cellpadding="0"
																	cellspacing="4">
																	<tbody>
																		<tr>
																			<td>Reputation</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
														<td width="50"><span
															class="label hover_tooltip_reputation">Rating</span>
														</td>
														<td width="50"><span
															class="tpl_global_red_txt value hover_tooltip_reputation"><?php echo $swipe_rating_points;?>%</span>
														</td>
														<td width="18"><img
															src="assets/user/images/success_recent_rate.png"
															alt="Successful ratings"
															class="hover_tooltip_success_swaps" height="15"
															width="14">
															<div id="tooltip_success_swaps"
																class="tooltip_success_swaps" position="bottom center"
																style="display: none; line-height: normal">

																<table class="tooltip_layer_table" cellpadding="0"
																	cellspacing="4">
																	<tbody>
																		<tr>
																			<td>Successful ratings</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
														<td width="90"><span
															class="tpl_global_green_txt value hover_tooltip_success_swaps"><?php echo  $likes?></span>
														</td>
														<td width="18"><img
															src="assets/user/images/fail_recent_rate.png"
															alt="Failed ratings" class="hover_tooltip_fail_swaps"
															height="15" width="14">
															<div id="tooltip_fail_swaps" class="tooltip_fail_swaps"
																position="bottom center"
																style="display: none; line-height: normal">

																<table class="tooltip_layer_table" cellpadding="0"
																	cellspacing="4">
																	<tbody>
																		<tr>
																			<td>Failed ratings</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
														<td width="20"><span
															class="tpl_global_red_txt value hover_tooltip_fail_swaps"><?php echo $dislikes?></span>
														</td>
														<td width="50">&nbsp;</td>

														<td width="115"><span
															class="label hover_tooltip_listsize_uid">List Size:</span>
															
														</td>
														<td width="70"><span
															class="value hover_tooltip_listsize_uid">
<?php
$count = $this->user_model->get_sum_data('autoresponder','list_value',array('user_id'=>$user_details['id']));
echo $count['list_value'];
?>

															</span> 
														</td>

														<td width="290"><span
															class="label hover_tooltip_clicks_uid"><img
															src="assets/user/images/click.png"
															alt="Verified" class="hover_tooltip_listsize_uid"
															height="28" width="54">Average swaps clicks:</span>
															<div id="tooltip_clicks_uid" class="tooltip_clicks_uid"
																position="bottom center"
																style="display: none; line-height: normal">

																<table class="tooltip_layer_table" cellpadding="0"
																	cellspacing="4">
																	<tbody>
																		<tr>
																			<td><strong>Last 0 swaps avg. numbers</strong></td>
																		</tr>
																	</tbody>
																</table>
																<table class="tooltip_layer_table" cellpadding="0"
																	cellspacing="2">
																	<tbody>
																		<tr>
																			<td align="right"><strong>0</strong></td>
																			<td>&nbsp;clicks</td>
																		</tr>
																		<tr>
																			<td align="right"><span class="tpl_global_red_txt"><strong>0%</strong>
																			</span></td>
																			<td>&nbsp;sent vs. received</td>
																		</tr>
																		<tr>
																			<td align="right"><strong>0</strong></td>
																			<td>&nbsp;traffic quality mark</td>
																		</tr>
																	</tbody>
																</table>

															</div>
														</td>
														<td width="110" style="padding-top:16px"><span
															class="value hover_tooltip_clicks_uid">0</span>&nbsp;&nbsp;
														</td>

														<td width="60"><span
															class="label hover_tooltip_relindex_uid1">Reliability</span>
														</td>
														<td width="100"><span class="tpl_global_outScoresHistory">
                                                        <img src="assets/user/images/green.png" alt="Verified" class="hover_tooltip_listsize_uid" height="12" width="13">
																&nbsp;
																 </span>
														</td>
														<?php if ($userSubscribed) { ?>
														<td width="65">
															<input type="button" onclick="window.location.href='user/gotoswap/<?php echo $this->uri->segment(3); ?>'" value="Swap Solo" style="width:78px">
														</td>
														<?php }?>
													</tr>
												</tbody>
											</table>

											<?php 
												$this->db->select('SUM(rating_points) as solopoints');
												$this->db->where('user_id', $user_details['id']);
												$this->db->where("rating_type", "SOLO_ACCEPTED");
												$q=$this->db->get('user_rating');
												$row=$q->row();
												$score=$row->solopoints;
												
												$this->db->select('COUNT(rating_points) as likes');
												$this->db->where('user_id',$user_details['id']);
												$this->db->where("rating_type", "PARTNER_RATING");
												$this->db->where("transaction_type", "BUY_SOLO");
												$this->db->where( "rating", "GOOD");
												$q1=$this->db->get('user_rating');
												$row=$q1->row();
												$sololikes=$row->likes;
												
												
												$this->db->select('COUNT(rating_points) as dislikes');
												$this->db->where('user_id',$user_details['id']);
												$this->db->where("rating_type", "PARTNER_RATING");
												$this->db->where("transaction_type", "BUY_SOLO");
												$this->db->where( "rating", "BAD");
												$q1=$this->db->get('user_rating');
												$row=$q1->row();
												$solodislikes=$row->dislikes;
											?>
											<table border="0" cellpadding="0" cellspacing="0">
												<tbody>
													<tr>
														<td width="60"><span class="value row_title">Solos:</span>
														</td>
														<td width="105"><a href=""
															onclick="xajax_outScoresHistory(56616, 'seller', 0); return false;"><span
																class="value"><?php echo $score; ?> points</span> </a>
														</td>
														<td width="20"><img
															src="assets/user/images/i_post_rating.png"
															alt="Rating" class="hover_tooltip_reputation" height="16"
															width="16">
															<div id="tooltip_reputation" class="tooltip_reputation"
																position="bottom center"
																style="display: none; line-height: normal">

																<table class="tooltip_layer_table" cellpadding="0"
																	cellspacing="4">
																	<tbody>
																		<tr>
																			<td>Reputation</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
														<td width="50"><span
															class="label hover_tooltip_reputation">Rating</span>
														</td>
														<td width="50"><span
															class="tpl_global_red_txt value hover_tooltip_reputation"><?php echo $solo_rating_points;?>%</span>
														</td>
														<td width="18"><img
															src="assets/user/images/success_recent_rate.png"
															alt="Successful ratings"
															class="hover_tooltip_success_swaps" height="15"
															width="14">
															<div id="tooltip_success_swaps"
																class="tooltip_success_swaps" position="bottom center"
																style="display: none; line-height: normal">

																<table class="tooltip_layer_table" cellpadding="0"
																	cellspacing="4">
																	<tbody>
																		<tr>
																			<td>Successful ratings</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
														<td width="90"><span
															class="tpl_global_green_txt value hover_tooltip_success_swaps"><?php echo  $sololikes?></span>
														</td>
														<td width="18"><img
															src="assets/user/images/fail_recent_rate.png"
															alt="Failed ratings" class="hover_tooltip_fail_swaps"
															height="15" width="14">
															<div id="tooltip_fail_swaps" class="tooltip_fail_swaps"
																position="bottom center"
																style="display: none; line-height: normal">

																<table class="tooltip_layer_table" cellpadding="0"
																	cellspacing="4">
																	<tbody>
																		<tr>
																			<td>Failed ratings</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
														<td width="20"><span
															class="tpl_global_red_txt value hover_tooltip_fail_swaps"><?php echo  $solodislikes?></span>
														</td>
														<td width="50">&nbsp;</td>

														<td width="100"><span class="label hover_tooltip_price_uid">Price: </span>
															
														</td>
														<td width="70"><span
															class="value hover_tooltip_price_uid">$<?php echo $user_details['price_minimal_click']?></span>
														</td>

														<td width="290"><span
															class="label hover_tooltip_clicks_solo_uid"><img
															src="assets/user/images/click.png"
															alt="Verified" class="hover_tooltip_listsize_uid"
															height="28" width="54">Maximum clicks Available:</span>
															
														</td>
														<td width="110" style="padding-top:16px"><span
															class="value hover_tooltip_clicks_solo_uid"><?php echo $user_details['maximal_order'];?></span>&nbsp;&nbsp;
														</td>

														<td width="60"><span
															class="label hover_tooltip_relindex_uid2">Reliability</span>
														</td>
														<td width="100"><span class="tpl_global_outScoresHistory">
																                                                        <img src="assets/user/images/green.png" alt="Verified" class="hover_tooltip_listsize_uid" height="12" width="13">
&nbsp;
																 </span>
														</td>
														<?php //if ($userSubscribed) {?>
														<td width="65">
															<span class="label hover_tooltip_relindex_uid1">
																<input type="button" value="Buy Solo" onclick="window.location.href='user/gotobuysolo/<?php echo $this->uri->segment(3); ?>'" style="width:78px">
															</span>
														</td>
														<?php // }?>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
</div>
<?php
}
?>



<div id="chatContainer">

    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>
    
    <div id="chatUsers" class="rounded"></div>
    <div id="chatBottomBar" class="rounded">
    	<div class="tip"></div>
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" class="rounded" maxlength="16" type="hidden" value="<?php echo $login['name'].$login['id'];?>" />
            <input id="email" name="email" class="rounded" type="hidden" value="<?php echo $login['email']; ?>" />
            <input id="proflieImage" name="proflieImage" class="rounded" type="hidden" value="<?php echo $login['image']; ?>" />
             <input id="user_id" name="user_id" class="rounded" type="hidden" value="<?php echo $login['id']; ?>" />
            
            
            <input type="submit" class="blueButton" value="Connect" />
        </form>
        
        <form id="submitForm" method="post" action="">
            <textarea id="chatText" name="chatText" style="width:840px" class="rounded"></textarea>
            <input type="submit" class="blueButton" value="Send" style="vertical-align:top" />
             <input id="user_id" name="user_id" class="rounded" type="hidden" value="<?php echo $login['id']; ?>" />    	
            <?php if(isset($_GET['ut'])) {?>
            <input id="chatText" name="ChatType" type="hidden" class="rounded" maxlength="255"  value="<?php echo $_GET['ut'] ?>" />
            <input id="chatText" name="toConect" type="hidden" class="rounded" maxlength="255" value="<?php echo $_GET['un'] ?>" />  
             
            <strong>Connect To <?php echo $_GET['un'] ?></strong>
            <?php }else{?>
			<strong style="vertical-align:top">Connect To All User</strong>
			<?php } ?>
        </form>
        
   

</div>

<script src="<?php echo base_url(); ?>assets/chat/js/jScrollPane/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/chat/js/jScrollPane/jScrollPane.min.js"></script>
<script src="<?php echo base_url(); ?>assets/chat/js/script.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#chatText").keyup(function(e) {	 
    	var code = e.keyCode || e.which;
      	if(code == 13) { //Enter keycode
			$("#submitForm").trigger("submit");
      	}     
	});		
});
</script>

<div class="clear">&nbsp;</div>

</div>
<!--  end content -->
<div class="clear">&nbsp;</div>
<!--  end content-outer -->
