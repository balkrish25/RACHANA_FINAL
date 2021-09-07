<!DOCTYPE html>
<html lang="en">
<?php require("1_metatags.php"); ?>
<body>
<!--Preloader-->
<div class="preloader-it">
<div class="la-anim-1"></div>
</div>
<!--/Preloader-->
<div class="wrapper theme-1-active pimary-color-green">
<!-- Top Menu Items -->
<?php require("2_header.php"); ?>
<!-- /Top Menu Items -->

<!-- Left Sidebar Menu -->
<?php require("3_sidebar.php"); ?>

<!-- Main Content -->
<div class="page-wrapper">
<div class="container-fluid">

<!--                    CHAT START-->

<h3 class=" text-center">Messaging</h3>
<div class="messaging">
<div class="inbox_msg">
<div class="inbox_people">
<div class="headind_srch">
<div class="recent_heading">
<h4>Recent</h4>
</div>       
</div>
<!--            CHAT NAMES-->
<div class="inbox_chat" id="user_details"></div>
<!--            CHAT NAMES END-->
</div>          

<!--START MESSAGE-->
<div class="mesgs">         
<div id="loadConversations">
<p>Select the Customer to Start Conversation...........</p>
</div>    

</div>          

<!--END MESSAGE-->

</div>                  

</div>
<!--                    CHAT END-->

</div>					
<?php require("4_footer.php"); ?>
<!-- /Footer -->

</div>
<!-- /Main Content -->
</div>
<!-- /#wrapper -->

<!-- JavaScript -->
<?php require("5_footer_scripts.php"); ?>
<!-- CHATBOX SCRIPTS -->
<link href="../chat_scripts/chatPopupWide.css" rel="stylesheet"/>
<link href="../chat_scripts/chatbox.css" rel="stylesheet"/>
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
		})
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
        var modal_content = '<div id="user_dialog_'+customer_id+'" class="user_dialog" title="You have chat with '+customer_name+'">';
        modal_content +='<div class="msg_history chat_history" data-touserid="'+customer_id+'" data-tousername="'+customer_name+'" id="chat_history_'+customer_id+'">';
        modal_content += fetch_user_chat_history(customer_id,customer_name);	
        modal_content += '</div>';
        modal_content +='<div class="type_msg">';
        modal_content +='<div class="input_msg_write">';
        modal_content +='<textarea name="chat_message_'+customer_id+'" id="chat_message_'+customer_id+'" class="form-control chat_message" placeholder="Type Message..."></textarea>';             
        modal_content +='<button class="btn btn-success btn-block send_chat" id="'+customer_id+'" type="button">SEND</button>';        
        modal_content += '</div>';		
        modal_content += '</div>';		
		modal_content += '</div>';		
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
                loadButton();
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