var jq = jQuery.noConflict(true);

var windowFocus = true;
var username;
var from_username;
var chatHeartbeatCount = 0;
var minChatHeartbeat = 2000;
var maxChatHeartbeat = 33000;
var chatHeartbeatTime = minChatHeartbeat;
var originalTitle;
var blinkOrder = 0;

var chatboxFocus = new Array();
var newMessages = new Array();
var newMessagesWin = new Array();
var chatBoxes = new Array();
var chat_with = false;
jq(document).ready(function(){
	originalTitle = document.title;
	startChatSession();

	jq([window, document]).blur(function(){
		windowFocus = false;
	}).focus(function(){
		windowFocus = true;
		document.title = originalTitle;
	});
});

function restructureChatBoxes() {
	align = 0;
	for (x in chatBoxes) {
		chatboxtitle = chatBoxes[x];

		if (jq("#chatbox_"+chatboxtitle).css('display') != 'none') {
			if (align == 0) {
				jq("#chatbox_"+chatboxtitle).css('right', '20px');
				jq("#chatbox_"+chatboxtitle).css('z-index', '2');
			} else {
				width = (align)*(225+7)+20;
				jq("#chatbox_"+chatboxtitle).css('right', width+'px');
				jq("#chatbox_"+chatboxtitle).css('z-index', '2');
			}
			align++;
		}
	}
}

function getTitle( title ){
	try{
		return title.replace('-', ' ');

	}catch(ex){
		return title;		
	}
}

function chatWith(chatuser, chatuserName) {
	chat_with = true;
	createChatBox(chatuser, chatuserName);
	jq("#chatbox_"+chatuser+" .chatboxtextarea").focus();

}

function createSmileyBox(chatboxtitle){
	//textString = '<td><a onclick="insert_smiley1(\':)\',\''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="smile" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/smile.gif"></a></td><td><a onclick="insert_smiley1(\':rofl:\',\''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="rofl" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/rofl.gif"></a></td>';
	textString = '<div class="dropup smiley-icon"><button type="button" class="btn btn-primary dropdown-toggle smiley-btn" data-toggle="dropdown"><img src="assets/plugins/new_chat/img/menu.png" width="30" height="30"></button>'+
		'<div class="dropdown-menu smiley-menu">'+
		'<table cellspacing="0" cellpadding="4" border="0" class="smiley-table"><tbody>'+
		'<tr><td><a onclick="insert_smiley1(\':-)\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="grin" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/grin.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':lol:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="LOL" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/lol.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':)\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="smile" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/smile.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\';-)\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="wink" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/wink.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':rofl:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="rofl" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/rofl.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':wow:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="surprised" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/surprise.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':blank:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="blank stare" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/blank.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':angel:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="angel" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/angel.gif"></a></td></tr>'+
		'<tr><td><a onclick="insert_smiley1(\':blush:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="blush" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/blush.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':crying:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="crying" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/crying.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':dull:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="dull" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/dull.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':envy:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="envy" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/envy.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':giggle:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="giggle" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/giggle.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':happy:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="happy" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/happy.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':hi:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="hi" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/hi.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':mmm:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="mmm" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/mmm.gif"></a></td></tr>'+
		'<tr><td><a onclick="insert_smiley1(\':party:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="party" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/party.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':sleepy:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="sleepy" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/sleepy.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':yawn:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="yawn" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/yawn.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':worried:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="worried" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/worried.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':angry:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="angry" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/angry.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':zip:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="zipper" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/zip.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':kiss:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="kiss" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/kiss.gif"></a></td>'+
		'<td><a onclick="insert_smiley1(\':coolhmm:\', \''+chatboxtitle+'\')" href="javascript:void(0);"><img width="19" height="19" style="border:0;" alt="cool hmm" src="http://localhost/lawfirmsmanagement/assets/plugins/new_chat/img/smileys/shade_hmm.gif"></a></td>'+
		'</tr></tbody></table></div></div>';
	return textString;
}

function createChatBox(chatboxtitle,chatuserName, minimizeChatBox) {
	if (jq("#chatbox_"+chatboxtitle).length > 0) {
		if (jq("#chatbox_"+chatboxtitle).css('display') == 'none') {
			jq("#chatbox_"+chatboxtitle).css('display','block');
			restructureChatBoxes();
		}
		jq("#chatbox_"+chatboxtitle+" .chatboxtextarea").focus();
		return;
	}
//	chatBox = createSmileyBox(chatboxtitle);
	chatBox = '';
	jq(" <div />" ).attr("id","chatbox_"+chatboxtitle)
	.addClass("chatbox")
	.html('<div class="chatboxhead"><div class="chatboxtitle">'+getTitle( chatuserName )+'</div><div class="chatboxoptions"><a href="javascript:void(0)" onclick="javascript:toggleChatBoxGrowth(\''+chatboxtitle+'\')">-</a> <a href="javascript:void(0)" onclick="javascript:closeChatBox(\''+chatboxtitle+'\')">X</a></div><br clear="all"/></div><div class="chatboxcontent"></div><div class="chatboxinput"><textarea class="chatboxtextarea" onkeydown="javascript:return checkChatBoxInputKey(event,this,\''+chatboxtitle+'\',\''+chatuserName+'\');" id="textarea_'+chatboxtitle+'"></textarea>'+chatBox+'</div>')
	.appendTo(jq( "body" ));
			   
	jq("#chatbox_"+chatboxtitle).css('bottom', '0px');
	
	chatBoxeslength = 0;

	for (x in chatBoxes) {
		if (jq("#chatbox_"+chatBoxes[x]).css('display') != 'none') {
			chatBoxeslength++;
		}
	}

	if (chatBoxeslength == 0) {
		jq("#chatbox_"+chatboxtitle).css('right', '20px');
		jq("#chatbox_"+chatboxtitle).css('z-index', '2');
	} else {
		width = (chatBoxeslength)*(225+7)+20;
		jq("#chatbox_"+chatboxtitle).css('right', width+'px');
		jq("#chatbox_"+chatboxtitle).css('z-index', '2');
	}
	
	chatBoxes.push(chatboxtitle);

	if (minimizeChatBox == 1) {
		minimizedChatBoxes = new Array();

		if (jq.cookie('chatbox_minimized')) {
			minimizedChatBoxes = jq.cookie('chatbox_minimized').split(/\|/);
		}
		minimize = 0;
		for (j=0;j<minimizedChatBoxes.length;j++) {
			if (minimizedChatBoxes[j] == chatboxtitle) {
				minimize = 1;
			}
		}

		if (minimize == 1) {
			jq('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','none');
			jq('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','none');
		}
	}

	chatboxFocus[chatboxtitle] = false;

	jq("#chatbox_"+chatboxtitle+" .chatboxtextarea").blur(function(){
		chatboxFocus[chatboxtitle] = false;
		jq("#chatbox_"+chatboxtitle+" .chatboxtextarea").removeClass('chatboxtextareaselected');
	}).focus(function(){
		chatboxFocus[chatboxtitle] = true;
		newMessages[chatboxtitle] = false;
		jq('#chatbox_'+chatboxtitle+' .chatboxhead').removeClass('chatboxblink');
		jq("#chatbox_"+chatboxtitle+" .chatboxtextarea").addClass('chatboxtextareaselected');
	});

	jq("#chatbox_"+chatboxtitle).click(function() {
		if (jq('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display') != 'none') {
			jq("#chatbox_"+chatboxtitle+" .chatboxtextarea").focus();
		}
	});

	jq("#chatbox_"+chatboxtitle).show();
	itemsfound = 0;
	//call
	jq.ajax({
	  url: "chat?action=chathistory",
	  cache: false,
	  data: 'to='+chatboxtitle,
	  dataType: "json",
	  success: function(data) {

		jq.each(data.items, function(i,item){
			if (item)	{ // fix strange ie bug
				if (item.s == 1) {
					item.f = from_username;
				}
				if (item.s == 2) {
					jq("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxinfo">'+item.m+'</span></div>');
				} else {
					jq("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+ getTitle( item.fname )+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+item.m+'</span></div>');
				}

				jq("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop(jq("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
				itemsfound += 1;
			}
		});
	
	}});

}


function chatHeartbeat(){
	var itemsfound = 0;
	
	if (windowFocus == false) {
 
		var blinkNumber = 0;
		var titleChanged = 0;
		for (x in newMessagesWin) {
			if (newMessagesWin[x] == true) {
				++blinkNumber;
				if (blinkNumber >= blinkOrder) {
					//document.title = x+' says...';
					document.title = ' New message...';
					titleChanged = 1;
					break;	
				}
			}
		}
		
		if (titleChanged == 0) {
			document.title = originalTitle;
			blinkOrder = 0;
		} else {
			++blinkOrder;
		}

	} else {
		for (x in newMessagesWin) {
			newMessagesWin[x] = false;
		}
	}

	for (x in newMessages) {
		if (newMessages[x] == true) {
			if (chatboxFocus[x] == false) {
				//FIXME: add toggle all or none policy, otherwise it looks funny
				jq('#chatbox_'+x+' .chatboxhead').toggleClass('chatboxblink');
			}
		}
	}
	
	jq.ajax({
	  url: "chat?action=chatheartbeat",
	  cache: false,
	  dataType: "json",
	  success: function(data) {

		jq.each(data.items, function(i,item){
			if (item)	{ // fix strange ie bug
				chatboxtitle = item.f;
				chatuserName = item.fname;

				if (jq("#chatbox_"+chatboxtitle).length <= 0) {
					createChatBox(chatboxtitle, chatuserName);
				}
				if (jq("#chatbox_"+chatboxtitle).css('display') == 'none') {
					jq("#chatbox_"+chatboxtitle).css('display','block');
					restructureChatBoxes();
				}
				
				if (item.s == 1) {
					item.f = from_username;
				}
				if (item.s == 2) {
					jq("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxinfo">'+item.m+'</span></div>');
				} else {
					newMessages[chatboxtitle] = true;
					newMessagesWin[chatboxtitle] = true;
					jq("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+ getTitle( item.fname )+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+item.m+'</span></div>');
				}

				jq("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop(jq("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
				itemsfound += 1;
			}
		});
		chatHeartbeatCount++;

		if (itemsfound > 0) {
			chatHeartbeatTime = minChatHeartbeat;
			chatHeartbeatCount = 1;
		} else if (chatHeartbeatCount >= 10) {
			chatHeartbeatTime *= 2;
			chatHeartbeatCount = 1;
			if (chatHeartbeatTime > maxChatHeartbeat) {
				chatHeartbeatTime = maxChatHeartbeat;
			}
		}
		
		setTimeout('chatHeartbeat()',chatHeartbeatTime);
	}});
}

function closeChatBox(chatboxtitle) {
	jq('#chatbox_'+chatboxtitle).css('display','none');
	restructureChatBoxes();

	jq.post("chat?action=closechat", { chatbox: chatboxtitle,csrf_test_name:csrfTokenValue} , function(data){	
	});

}

function toggleChatBoxGrowth(chatboxtitle) {
	if (jq('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display') == 'none') {  
		
		var minimizedChatBoxes = new Array();
		
		if (jq.cookie('chatbox_minimized')) {
			minimizedChatBoxes = jq.cookie('chatbox_minimized').split(/\|/);
		}

		var newCookie = '';

		for (i=0;i<minimizedChatBoxes.length;i++) {
			if (minimizedChatBoxes[i] != chatboxtitle) {
				newCookie += chatboxtitle+'|';
			}
		}

		newCookie = newCookie.slice(0, -1)


		jq.cookie('chatbox_minimized', newCookie);
		jq('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','block');
		jq('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','block');
		jq("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop(jq("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
	} else {
		
		var newCookie = chatboxtitle;

		if (jq.cookie('chatbox_minimized')) {
			newCookie += '|'+jq.cookie('chatbox_minimized');
		}


		jq.cookie('chatbox_minimized',newCookie);
		jq('#chatbox_'+chatboxtitle+' .chatboxcontent').css('display','none');
		jq('#chatbox_'+chatboxtitle+' .chatboxinput').css('display','none');
	}
	
}

function checkChatBoxInputKey(event,chatboxtextarea,chatboxtitle, boxUserName) {
	 
	if(event.keyCode == 13 && event.shiftKey == 0)  {
		message = jq(chatboxtextarea).val();
		message = message.replace(/^\s+|\s+$/g,"");

		jq(chatboxtextarea).val('');
		jq(chatboxtextarea).focus();
		jq(chatboxtextarea).css('height','44px');
		if (message != '') {
			jq.post("chat?action=sendchat", {to: chatboxtitle, to_name: boxUserName, message: message,csrf_test_name:csrfTokenValue} , function(data){
				message = message.replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\"/g,"&quot;");
				jq("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+getTitle(from_username)+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+message+'</span></div>');
				jq("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop(jq("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
			});
		}
		chatHeartbeatTime = minChatHeartbeat;
		chatHeartbeatCount = 1;

		return false;
	}

	var adjustedHeight = chatboxtextarea.clientHeight;
	var maxHeight = 94;

	if (maxHeight > adjustedHeight) {
		adjustedHeight = Math.max(chatboxtextarea.scrollHeight, adjustedHeight);
		if (maxHeight)
			adjustedHeight = Math.min(maxHeight, adjustedHeight);
		if (adjustedHeight > chatboxtextarea.clientHeight)
			jq(chatboxtextarea).css('height',adjustedHeight+8 +'px');
	} else {
		jq(chatboxtextarea).css('overflow','auto');
	}
	 
}

function startChatSession(){  
	jq.ajax({
	  url: "chat?action=startchatsession",
	  cache: false,
	  dataType: "json",
	  success: function(data) {
 
		username = data.username;
		from_username = data.from_username;
		jq.each(data.items, function(i,item){
			if (item)	{ // fix strange ie bug

				chatboxtitle = item.f;
				chatuserName = item.fname;
				if (jq("#chatbox_"+chatboxtitle).length <= 0) {
					createChatBox(chatboxtitle,chatuserName ,1);
				}
				
				if (item.s == 1) {
					item.f = from_username;
					item.fname = from_username;
				}

				if (item.s == 2) {
					jq("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxinfo">'+item.m+'</span></div>');
				} else {
					jq("#chatbox_"+chatboxtitle+" .chatboxcontent").append('<div class="chatboxmessage"><span class="chatboxmessagefrom">'+getTitle(item.fname)+':&nbsp;&nbsp;</span><span class="chatboxmessagecontent">'+item.m+'</span></div>');
				}
			}
		});
		
		for (i=0;i<chatBoxes.length;i++) {
			chatboxtitle = chatBoxes[i];
			jq("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop(jq("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);
			setTimeout('jq("#chatbox_"+chatboxtitle+" .chatboxcontent").scrollTop(jq("#chatbox_"+chatboxtitle+" .chatboxcontent")[0].scrollHeight);', 100); // yet another strange ie bug
		}
	setTimeout('chatHeartbeat()',chatHeartbeatTime);
		
	}});
}


jq.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie

        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};




function insert_smiley1(smiley, field_id) {
	$('#textarea_'+field_id).val($('#textarea_'+field_id).val()+" "+smiley+" ");
}

