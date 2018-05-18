function add_project()
{
    alert($('project_form'));
    new Ajax.Request($('project_form').action,
        {
            parameters:$('project_form').serialize(),
            requestHeaders:{Accept:'application/json'},
            onSuccess:function(transport)
            {
                var result=transport.responseText;
                //var result=transport.responseText.evalJSON(true);
                if(result=="success")
                {
                    document.location.href="project.php";
                }
                else
                {
                    alert(result);
                }
            },
            onFailure:function(){alert('An error occurs when submitting form');}
        }
    );

}


function open_page(page_url,page_div_id)
{

    $('loading').update('Loading...');
    new Ajax.Request(page_url,
        {
            requestHeaders:{Accept:'application/json'},
            onSuccess:function(transport)
            {
                var result=transport.responseText;
                //var result=transport.responseText.evalJSON(true);
                if(result)
                {
                    $(page_div_id).update(result);
                    $('loading').update('');
                }
                else
                {
                    alert("error");
                }
            },
            onFailure:function(){alert('An error occurs when loading the page');}
        }
    );

}
