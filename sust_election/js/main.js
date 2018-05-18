function popupWindow(url)
{
    window.open(url,'popupWindow','toolbar=no,location=no,fullscreen=yes,directories=no,status=no,menubar=1,scrollbars=no,resizable=1,copyhistory=no,width=1000,height=1000,screenX=200,screenY=100,top=100,left=200')

}


function popupWindow_password(url)
{
    session=document.getElementById('session').value;
	section=document.getElementById('section').value;

	window.open('view_password.php?session='+session+'&section='+section,'popupWindow_password','toolbar=no,location=no,directories=no,status=no,menubar=1,scrollbars=1,resizable=1,copyhistory=no,width=600,height=600,screenX=200,screenY=100,top=100,left=200')

}

function popupWindow_result(url)
{
    window.open(url,'popupWindow_result','toolbar=no,location=no,directories=no,status=no,menubar=1,scrollbars=1,resizable=1,copyhistory=no,width=600,height=600,screenX=200,screenY=100,top=100,left=200')

}

function load_ajax_page(page_name,div)
{
	$.ajax({
	type:"POST",
	url:page_name,
	data:"",
	success: function(msg){
		$("#"+div).html(msg);
	}
	});
}

function count_vote(election_id)
{
	var test = setInterval(function(){
        load_ajax_page("../admin/count_vote.php?election_id="+election_id,"total_vote"+election_id);
    },3000)
}
