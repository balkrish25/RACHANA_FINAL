function vehicleno(txtid,erorr,lblname)
{
    var vehicleno=document.getElementById(txtid).value;    
    if(vehicleno.length == 0)
    {
        var lblname1='';
        lblname1='<p class="text-danger">'+lblname+' is Required </p>';       
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(vehicleno.match(/^[A-Z]{2}[0-9]{1,2}(?:[A-Z])?(?:[A-Z]*)?[0-9]{4}$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p class="text-danger">Enter Vehicle Number in Capital Letters Only (Ex.KA12EH5215) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    } 
}
function phonepe(txtid,erorr,lblname)
{
    var number=document.getElementById(txtid).value;

    if(number.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(number.match(/^[A-Z][0-9]{22}$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid,Should be 23 Digits Starting with Uppercase Alphabet</p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}

function paytm(txtid,erorr,lblname)
{
    var number=document.getElementById(txtid).value;

    if(number.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(number.match(/^\d{18}$/i))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid,Should be 18 Digits Number </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}

function alphabets(txtid,erorr,lblname)
{
    var name=document.getElementById(txtid).value;

    if(name.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(name.match(/^[a-z A-Z&,. ]{3,}$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only letters with minimum 3 letters) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}
 
function alphanumeric(txtid,erorr,lblname)
{
    var name=document.getElementById(txtid).value;

    if(name.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(name.match(/^[a-z A-Z 0-9]{3,}$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only letters with minimum 3 letters) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
} 


function amountval(txtid,erorr,lblname)
{
    var number=document.getElementById(txtid).value;

    if(number.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(number.match(/^\d+(\.\d{1,4})?$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only numbers) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}

function numbers(txtid,erorr,lblname)
{
    var number=document.getElementById(txtid).value;

    if(number.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(number.match(/^\d+$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only numbers) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}

function phoneno(txtid,erorr,lblname)
{
    var number=document.getElementById(txtid).value;

    if(number.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(number.match(/^[6-9]\d{9}$/i))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (10 numbers start with 6,7,8 or 9) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    } 
}


function emailid(txtid,erorr,lblname)
{
    var email=document.getElementById(txtid).value;

    if(email.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (Ex. example@gmail.com) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    } 
}

function pasword(txtid,erorr,lblname)
{
    var passwordd=document.getElementById(txtid).value;

    if(passwordd.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(passwordd.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,}$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;" style="text-align:justify;">'+lblname+' is Invalid (Password Must Contain Minimum Eight Characters, at least One Uppercase Letter, One Lowercase Letter, One Number and One Special Character.) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}

function ckeditor_val(txtid, erorr, lblname) 
{
    var lblname1 = "";
    if(CKEDITOR.instances[txtid].getData()== "")
    {
        document.getElementById("cke_"+txtid).style.borderColor = "#ff3a00";
        lblname1 = '<p style="color:#ff3a00;">' + lblname + " is Required </p>";
        document.getElementById(erorr).innerHTML = lblname1;
        return 0;
    }
    else
    {
        document.getElementById("cke_"+txtid).style.borderColor = "";
        document.getElementById(erorr).innerHTML = lblname1;
        return 1;
    }
  
}

function fieldrequired(txtid,erorr,lblname)
{
    var txtarea=document.getElementById(txtid).value;

    if(txtarea.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(txtarea.match(/^[a-z A-Z0-9,.#@/-]{1,}$/))
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    }
    else
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (Special Characters not Allowed) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }  
}


function imagename(txtid,erorr,lblname)
{
    var image=document.getElementById(txtid).value;
    var extension = image.split('.').pop().toLowerCase();
    if(image.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only gif, png, jpg and jpeg) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }
    else
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    } 
}

function videoname(txtid,erorr,lblname)
{
    var video=document.getElementById(txtid).value;
    var extension = video.split('.').pop().toLowerCase();
    if(video.length == 0)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Required </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }

    if(jQuery.inArray(extension, ['mp4']) == -1)
    {
        var lblname1='';
        lblname1='<p style="color:#ff3a00;">'+lblname+' is Invalid (only mp4) </p>';
        ValidatePrompt(lblname1,txtid,erorr);
        return 0;
    }
    else
    {
        RemovePrompt(txtid, erorr);
        return 1; 
    } 
}

function SetDate(txtid)
{
    var value='';
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    var amOrPm = (date.getHours() < 12) ? "AM" : "PM";

    var hour = (date.getHours() <=12) ? date.getHours() : date.getHours() - 12;

    var minutes=date.getMinutes();

    if (hour < 10) hour = "0" + hour;
    if (minutes < 10) minutes = "0" + minutes;

    //var time = hour + ":" + date.getMinutes() + ":" + date.getSeconds()+ ' ' + amOrPm;
    var time = hour + ":" + minutes + ' ' + amOrPm;

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = day + "-" + month + "-" +year ;

    value=today+' '+time;

    display_date(txtid,value)
    //document.getElementById(date_value).value = today+' '+time;
    return 1;
}

function SetDate1()
{
    var value='';
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    var amOrPm = (date.getHours() < 12) ? "AM" : "PM";

    var hour = (date.getHours() <=12) ? date.getHours() : date.getHours() - 12;

    var minutes=date.getMinutes();

    if (hour < 10) hour = "0" + hour;
    if (minutes < 10) minutes = "0" + minutes;

    //var time = hour + ":" + date.getMinutes() + ":" + date.getSeconds()+ ' ' + amOrPm;
    var time = hour + ":" + minutes + ' ' + amOrPm;

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = day + "-" + month + "-" +year ;

    value=today+' '+time;

    //display_date(txtid,value)
    //document.getElementById(date_value).value = today+' '+time;
    return value;
}

function display_date(txtid, value)
{
    document.getElementById(txtid).value=value;  
}

function RemovePrompt(txtid, erorr)
{
    document.getElementById(erorr).innerHTML='';
    document.getElementById(txtid).style.borderColor='';   
}

function ValidatePrompt(message2, txtid, erorr)
{
    document.getElementById(erorr).innerHTML=message2;
    document.getElementById(txtid).style.borderColor="#ff3a00"; 
}

function addcolor(txtid)
{
    document.getElementById(txtid).style.borderColor="#ff3a00"; 
    return 0;
}

function removecolor(txtid)
{
    document.getElementById(txtid).style.borderColor=''; 
    return 1;
}
 
function formatIntAmount(amount){
    amount=amount.toString();
    var lastThree = amount.substring(amount.length-3);
    var otherNumbers = amount.substring(0,amount.length-3);
    if(otherNumbers != '')
      lastThree = ',' + lastThree;
    var result = otherNumbers.replace(/\B(?=(\d{2})+(?!\d))/g, ",") + lastThree;
    return result;
}