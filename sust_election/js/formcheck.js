function display_error(err_msg)
{    
    $('err_box').update(err_msg).setStyle({display: 'block'});
    $('err_box').focus();
}
function display_message(err_msg)
{    
    $('err_box').update(err_msg).setStyle({display: 'block'});
    $('err_box').focus();
}

function check_input(id, err, focus)
{        
    if($(id).getValue()=="")
    {
        $(id+"_err").update(err);        
        if(focus==true) $(id).focus();
        return false;
    }
    else
    {
        $(id+"_err").update('');    
        return true;
    }
}

function check_match(id1,id2,err,focus)
{
    if ($(id1).getValue()!=$(id2).getValue())
    {        
        $(id1+"_err").update(err);        
        if(focus==true) $(id1).focus();
        return false;
    }
    else
    {
        $(id1+"_err").update('');    
        return true;
    }
}

function check_email(id,err,focus)
{
    re=/[^@]+@[^@]+\.[^@\.]+$/;
    if (!$(id).value.match(re))
    {        
        $(id+"_err").update(err);        
        if(focus==true) $(id).focus();
        return false;
    }
    else
    {
        $(id+"_err").update('');    
        return true;
    }    
}

function check_length(id,length,err,focus)
{
    if ($(id).value.length<length)
    {        
        $(id+"_err").update(err);        
        if(focus==true) $(id).focus();
        return false;
    }
    else
    {
        $(id+"_err").update('');    
        return true;
    }
}

function check_exist(id,err,focus)
{
    if(id=="username")
    {
        new Ajax.Request('registration.php',
            {                
                parameters: {username_exist: $(id).getValue()},
                requestHeaders: {Accept: 'application/json'},
                onSuccess: function(transport){                    
                    /*var result = transport.responseText.evalJSON(true);*/            
                    var result = transport.responseText;
                    if(result == "invalid")
                    {
                        $(id+"_err").update(err);        
                        if(focus==true) $(id).focus();
                        return false;                
                    }
                    else
                    {                            
                        $(id+"_err").update('');    
                        return true;
                    }
                },
                onFailure: function(){ alert('An error occurs while submitting form') }
            }
        );
    }
    else if(id=="email")
    {
        new Ajax.Request('registration.php',
            {                
                parameters: {email_exist: $(id).getValue()},
                requestHeaders: {Accept: 'application/json'},
                onSuccess: function(transport){                    
                    /*var result = transport.responseText.evalJSON(true);*/            
                    var result = transport.responseText;
                    if(result == "invalid")
                    {
                        $(id+"_err").update(err);        
                        if(focus==true) $(id).focus();
                        return false;                
                    }
                    else
                    {                            
                        $(id+"_err").update('');    
                        return true;
                    }
                },
                onFailure: function(){ alert('An error occurs while submitting form') }
            }
        );    
    }
}

function check_security_code(id, err, focus)
{
    
    new Ajax.Request('order.php',
        {                
            parameters: {input_code: $(id).getValue(), check_security_code: 'true'},
            requestHeaders: {Accept: 'application/json'},
            onSuccess: function(transport){                    
                var result = transport.responseText.evalJSON(true);                    
                if(result.success == false)
                {
                    $(id+"_err").update(err);
                    $(id).focus();
                    return false;
                }
                else
                    return true;
            },
            onFailure: function(){ alert('An error occurs while submitting form') }
        }
    );
}
function submit_registration_form()
{
    var form = $('registration_frm');
    if(check_input('username', 'Please enter username', true)==true)
    if(check_input('firstname', 'Please enter your firstname', true)==true)
    if(check_input('lastname', 'Please enter your lastname', true)==true)
    if(check_input('email', 'Please enter your email address', true)==true)
    if(check_email('email','Invalid email address. Please provide a valid e-mail address', true)==true)    
    if(check_match('confirm_email','email', 'Email and confirm email is mismatched', true)==true)
    if(check_input('password', 'Please enter your password', true)==true)
    if(check_length('password',6, 'Password should contain at least 6 characters', true)==true)
    if(check_match('confirm_password','password', 'Password & Confirm Password mismatch. Please check again', true)==true)
    if(check_input('phone', 'Please enter your contact number', true)==true)
    {
            new Ajax.Request('registration.php',
            {                
                parameters: form.serialize(),
                requestHeaders: {Accept: 'application/json'},
                onSuccess: function(transport){                    
                    /*var result = transport.responseText.evalJSON(true);*/
                    var result = transport.responseText;
                    //alert(result);
                    if(result=="success")    
                    {
                        $('formbox').setStyle({display: 'none'});
                        display_error("A verification code has been sent to your email address. Please check your inbox and click the link to continue.");                                
                    }
                    else if(result!="success")
                    {
                        display_error(result);                                
                    }
                    else
                        display_error("An error occurs while submitting form");
                },
                onFailure: function(){ alert('An error occurs while submitting form') }
            }
        );
    }
}

function submit_order_form()
{
    var form = $('order_frm');        
    if(check_input('category', 'Please select your project category', true)==true)
    if(check_input('title', 'Please enter your project title', true)==true)
    if(check_input('budget', 'Please select your budget for this project', true)==true)
    //if(check_input('deadline', 'Please enter your deadline time', true)==true)
    if(check_input('requirements', 'Please write your full requirements', true)==true)
    if(check_input('security', 'Please enter the security code same as above image', true)==true)    
    {
        new Ajax.Request('order.php',
            {                
                parameters: form.serialize(),
                requestHeaders: {Accept: 'application/json'},
                onSuccess: function(transport){                    
                    /*var result = transport.responseText.evalJSON(true);*/
                    var result = transport.responseText;
                    if(result == "invalid_code")
                    {
                        $('security_err').update('Invalid security code! Please try again');
                        $('security').focus();                        
                    }
                    else if(result == "login")
                    {
                        document.location.href="login.php?msg=To complete your order, please login first or signup as a new member.";
                    }
                    else
                    {        
                        
                        $('formbox').setStyle({display: 'none'});
                        display_error("Order is submitted successfuly.");                                
                    }
                },
                onFailure: function(){ alert('An error occurs while submitting form') }
            }
        );
    }
}
function submit_order_form1()
{
    var form = $('order_frm');
    if(check_input('category', 'Please select your project category', true)==true)
    if(check_input('title', 'Please enter your project title', true)==true)
    if(check_input('budget', 'Please select your budget for this project', true)==true)
    //if(check_input('deadline', 'Please enter your deadline time', true)==true)
    if(check_input('requirements', 'Please write your full requirements', true)==true)
    if(check_input('security', 'Please enter the security code same as above image', true)==true)
    {
        new Ajax.Request('order.php',
            {
                parameters: form.serialize(),
                requestHeaders: {Accept: 'application/json'},
                onSuccess: function(transport){
                    /*var result = transport.responseText.evalJSON(true);*/
                    var result = transport.responseText;
                    if(result == "invalid_code")
                    {
                        $('security_err').update('Invalid security code! Please try again');
                        $('security').focus();
                    }
                    else if(result == "login")
                    {
                        document.location.href="login.php?msg=To complete your order, please login first or signup as a new member.";
                    }
                    else
                    {

                        $('formbox').setStyle({display: 'none'});
                        display_error("Order is submitted successfuly.");
                    }
                },
                onFailure: function(){ alert('An error occurs while submitting form') }
            }
        );
    }
}
