<?php
$sql="";
$result="";
$row="";
$sql=$conn->prepare("SELECT * FROM admin ORDER BY ad_id ASC LIMIT 1");
$sql->execute();
$result=$sql->get_result();
$row=$result->fetch_assoc();
?>

<div id="loadButton"></div>
<div class="modal fade  come-from-modal right" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title" id="myModalLabel">Chat Your Query</h5>
            </div>
            <div>                
               <?php                
                    if(!isset($_SESSION['customer']))
                    {                        
                    ?>
                    <div style="padding:20px;">
                    <p>Please Login to Chat with Our Service Person.</p>  
                    <form method="post" action="customer_login_register.php">
                    <?php 
                    include_once('5_current_page_url.php');
                    ?>
                    <input type="hidden" name="product_details_url" id="product_details_url" value="<?php echo $current_link;?>">
                    <input type="submit" class="btn btn-sm btn-success btn-rounded btn-block" value="Login"><br><br><hr>
                    </form>    
                    </div>    
                    <?php 
                    }
                    else
                    {
                    ?>
                    <div class="top_chat_load">
                        <div class="bottom_chat_load">
                            <div id="user_model_details"></div> 
                        </div>
                    </div>            
                    <div class="modal-footer">
                    <div class="from-group">
                        <textarea name="chat_message_<?php echo $row["ad_id"];?>" id="chat_message_<?php echo $row["ad_id"];?>" class="form-control chat_message"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary btn-block send_chat" id="<?php echo $row["ad_id"];?>">SEND</button>
                    </div>
                    <?php
                    } 
                    ?>
            </div>            
            <center><h5><b>Powered By <span style="color:#f8951f">INNOVICS IT</span></b></h5></center>
        </div>
    </div>
</div>



<!-- CHATBOX SCRIPTS -->
<!--
<script src="chat_scripts/jquery-1.12.4.js"></script>
<link href="chat_scripts/bootstrap.min.css" rel="stylesheet"/>
<script src="chat_scripts/bootstrap.min.js"></script>
-->
<link href="chat_scripts/chatbox.css" rel="stylesheet"/>
<link href="chat_scripts/emojionearea.min.css" rel="stylesheet"/>
<script src="chat_scripts/emojionearea.min.js"></script>
<link href="chat_scripts/custom.css" rel="stylesheet"/>
<!-- CHATBOX SCRIPTS -->



<script type="text/javascript">
$(document).ready(function(){
    loadButton();
    setInterval(function(){		 
    loadButton();        
    update_chat_history_data();            
	},2000);
    var login_status=document.getElementById("login_status").value;   
 	function loadButton()
	{
        if(login_status=="TRUE"){
		  $.ajax({
			url:"chat_load_button.php",
			method:"POST",
			success:function(data){
				$('#loadButton').html(data);                   
                var chat_notification=document.getElementById('notification').value;         
                if(chat_notification==1){                                    
                 document.getElementById("myModalLabel").innerHTML="You Got New Message";   
                }
                else
                {
                document.getElementById("myModalLabel").innerHTML="Chat Your Query";    
                }
			}
		});
        }
        else
        {
            var output="";
            output='<button type="button" class="bottom_right start_chat" data-toggle="modal" data-target="#myModal"><i class="fa fa-bell" style="font-size:35px;"></i>';       
            output+='</button>';
            $('#loadButton').html(output);                 
        }    
	}
    
    function update_chat_history_data()
	{
        if(login_status=="TRUE"){
		$('.chat_history').each(function(){
			var admin_id = $(this).data('touserid');                        
            var admin_name = $(this).data('tousername');               
			fetch_user_chat_history(admin_id,admin_name);
            
		});
        }
	}
	$(document).on('click', '.start_chat', function(){
        var customer_id = $(this).attr('id');
        $.ajax({
			url:"chat_assign_admin.php",
			method:"POST",
            data:{customer_id:customer_id},
            dataType: "json",
			success:function(data)
            {                           
                var admin_id =data.id;
                var admin_name =data.name;
                make_chat_dialog_box(admin_id, admin_name);
                $('#chat_message_'+admin_id).emojioneArea({
                    pickerPosition:"top",
                    toneStyle: "bullet",
                    search:false,
                    recentEmojis: false,
                    tones: false,
                    placeholder: "Type something here"
                    });	
                loadButton();                
			}
		});
        
	});
    
    
       function make_chat_dialog_box(admin_id, admin_name)
	   {        
        modal_content ='<div class="modal-body chat_history" data-touserid="'+admin_id+'" data-tousername="'+admin_name+'" id="chat_history_'+admin_id+'">'          
		modal_content += fetch_user_chat_history(admin_id,admin_name);
        modal_content += '</div>';          
		$('#user_model_details').html(modal_content);                 
        $(".modal-body").animate({ scrollTop: $(document).height() }, "slow");
        return false;   
	   }

    
    function fetch_user_chat_history(admin_id,admin_name)
	{        
		$.ajax({
			url:"chat_fetch_user_chat_history.php",
			method:"POST",
			data:{admin_id:admin_id,admin_name:admin_name},
			success:function(data){
				$('#chat_history_'+admin_id).html(data);
			}
		});
	}
    
    	$(document).on('click', '.send_chat', function(){
		var admin_id = $(this).attr('id');
		var chat_message = $.trim($('#chat_message_'+admin_id).val());
		if(chat_message != '')
		{
			$.ajax({
				url:"chat_insert_conversation.php",
				method:"POST",
				data:{admin_id:admin_id, chat_message:chat_message},
				success:function(data)
				{
					//$('#chat_message_'+admin_id).val('');
                        $('#chat_message_'+admin_id).emojioneArea({
                        pickerPosition:"top",
                        toneStyle: "bullet",
                        search:false,
                        recentEmojis: false,
                        tones: false,
                        placeholder: "Type something here"
                    });	
					var element = $('#chat_message_'+admin_id).emojioneArea();
					element[0].emojioneArea.setText('');
					$('#chat_history_'+admin_id).html(data);
                    var objDiv = document.getElementById('chat_history_'+admin_id);                     
                    objDiv.scrollTop = objDiv.scrollHeight;                       
				}
			})
		}
		else
		{
			alert('Type something');
		}
	});

});    

</script>

