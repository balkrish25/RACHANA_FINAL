<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
<?php
include_once("1_metatags.php");  
?>
<style>
.incoming_msg_img {
    display: inline-block;
    width: 40px;
    height: 40px;
    border-radius: 50%;        
    line-height: 40px;
    text-align: center;    
    background-color: gray;
    color: white;    
} 
.card {
    height: 567px;
 }
</style> 
<link rel="stylesheet" type="text/css" href="vendors/app-assets/fonts/simple-line-icons/style.min.css"> 
<link rel="stylesheet" type="text/css" href="vendors/app-assets/css/pages/app-chat.css">
</head>
<!--<body class="vertical-layout vertical-menu 2-columns chat-application fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">-->
<body class="vertical-layout vertical-menu content-left-sidebar chat-application  fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="content-left-sidebar"> 

<?php include_once("2_topnav.php");?>
<?php include_once("3_sidebar.php");?>

<!-- BEGIN: Content-->
<div class="app-content content">
<div class="sidebar-left sidebar-fixed">
<div class="sidebar">
<div class="sidebar-content card">
<div class="card-body chat-fixed-search">
<fieldset class="form-group position-relative has-icon-left m-0">
<h5>CHAT MESSENGER</h5>
</fieldset>
</div>
<div id="users-list" class="list-group position-relative"> 
<div class="users-list-padding media-list">
<div id="user_details">
<!-- LOAD CHAT NAMES-->
</div> 
</div>
</div>
</div>
</div>
</div>
 
<div class="content-right">
<div class="content-wrapper">
<div class="content-header row">
</div>
<div class="content-body">
<div class="content-overlay"></div>
<div id="loadConversations"> 
<!-- Load Messages-->
 <center><p>Select the Customer to Start Conversation...........</p></center>
</div>  
</div>
</div>
</div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
<?php include_once("4_footer.php");?>
<?php include_once("4_footer_name.php");?>
<!-- BEGIN: Vendor JS-->
<script src="vendors/app-assets/js/scripts/pages/app-chat.js"></script>
<link href="../chat_scripts/emojionearea.min.css" rel="stylesheet"/>
<script src="../chat_scripts/emojionearea.min.js"></script>
<!-- CHATBOX SCRIPTS --> 
    
<script type="text/javascript">
$(document).ready(function(){
    fetch_user();
    setInterval(function(){		
    fetch_user();    
    update_chat_history_data();        
	}, 3000);
        
	function fetch_user()
	{
		$.ajax({
			url:"chat_fetch_user.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
//                var chat_notification=document.getElementById('notification').value;                
//                if(chat_notification==1){
//                    playSound('sharp');
//                }
			}
		});
	}
    
    $(document).on('click', '.start_chat', function(){
		var customer_id = $(this).data('customerid');
		var customer_name = $(this).data('customername');    
        $.ajax({
			url:"chat_update_notification.php",
			method:"POST",
            data:{customer_id:customer_id},
			success:function(data){
			        make_chat_dialog_box(customer_id, customer_name);
                    $('#user_dialog_'+customer_id).show();	
			}
		});

    });
    
    function make_chat_dialog_box(customer_id, customer_name)
	{
     
        var modal_content='<section class="chat-app-window" id="user_dialog_'+customer_id+'">';
        modal_content +='<div class="sidebar-toggle d-block d-lg-none"><i class="ft-menu font-large-1"></i></div>';
        modal_content +='<div class="badge badge-secondary mb-1">Chat History</div>'
        modal_content +='<div class="chats">';
        modal_content +='<div class="chats msg_history chat_history" data-touserid="'+customer_id+'" data-tousername="'+customer_name+'" id="chat_history_'+customer_id+'">';
        modal_content += fetch_user_chat_history(customer_id,customer_name);	
        modal_content +='</div>';
        modal_content +='</div>';
        modal_content +='</section>';    
     
        modal_content +='<section class="chat-app-form">';
        modal_content +='<form class="chat-app-input d-flex">';
        modal_content +='<fieldset class="form-group position-relative has-icon-left col-10 m-0">';
        modal_content +='<input name="chat_message_'+customer_id+'" id="chat_message_'+customer_id+'" class="form-control chat_message" placeholder="Type Message...">';
        modal_content +='</fieldset>';
        modal_content +='<fieldset class="form-group position-relative has-icon-left col-2 m-0">';
        modal_content +='<button type="button" class="btn btn-primary send_chat" id="'+customer_id+'"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>';
        modal_content +='</fieldset>';
        modal_content +='</form>';
        modal_content +='</section>';
     
		$('#loadConversations').html(modal_content);
        $('#chat_message_'+customer_id).emojioneArea({
                    pickerPosition:"top",
                    toneStyle: "bullet",
                    search:false,
                    recentEmojis: false,
                    tones: false,
                    placeholder: "Type something here"
        });
        $(".msg_history").animate({ scrollTop: $(document).height() }, "slow");
        return false;   
	}
    
    function fetch_user_chat_history(customer_id,customer_name)
	{
		$.ajax({
			url:"chat_fetch_user_chat_history.php",
			method:"POST",
			data:{customer_id:customer_id,customer_name:customer_name},
			success:function(data){
				$('#chat_history_'+customer_id).html(data);
			}
		})
	}
    
    function update_chat_history_data()
	{
		$('.chat_history').each(function(){
			var customer_id = $(this).data('touserid');            
            var customer_name = $(this).data('tousername');            
			fetch_user_chat_history(customer_id,customer_name);
            
		});
	}
    
        $(document).on('click', '.send_chat', function(){
		var customer_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+customer_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"chat_insert_conversation.php",
				method:"POST",
				data:{customer_id:customer_id, chat_message:chat_message},
				success:function(data)
				{
                    $('#chat_history_'+customer_id).html(data);
                    $('#chat_message_'+customer_id).val('');
                    var objDiv = document.getElementById('chat_history_'+customer_id); 
                    objDiv.scrollTop = objDiv.scrollHeight;
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});
    
        $(document).on('click', '.close_chat', function(){
        var customer_id = $(this).attr('id');            
        $.ajax({
			url:"chat_delete_records.php",
			method:"POST",
            data:{customer_id:customer_id},
            dataType: "json",
			success:function(data)
            {                          
                fetch_user();
			}
		});
        
	});
    
    function playSound(filename){          
    var mp3Source = '<source src="../assets/' + filename + '.mp3" type="audio/mpeg">';
    var oggSource = '<source src="../assets/' + filename + '.ogg" type="audio/ogg">';
    var embedSource = '<embed hidden="true" autostart="true" loop="false" src="../assets/' + filename +'.mp3">';
    document.getElementById("sound").innerHTML='<audio autoplay="autoplay">' + mp3Source + oggSource + embedSource + '</audio>';
    }
    
});
    
</script>               
 
</body>
</html>