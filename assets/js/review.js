
$(document).ready( function() {
	$('.sb_rv').on('click',function(){
		var ud = document.URL.split('?')[1];
		var st =  $('input[name=rating]:checked').val(); 
		var tl = $('.ttl').val();
		var cm = $('.comment-textarea').val();
		$('.msg_div').hide();
		$.ajax({
            type: "POST",
            url: "/reviewSystem/submit-review?"+ud,
            data: {
                sub_rev:1,
                st : st,
                tl : tl,
                cm : cm
            },
            success: function (response) {
            	var resp = JSON.parse(response);
            	if(!resp['tag'])
            		var cls_msg =' alert-danger ';
            	else 
            		var cls_msg =' alert-success ';
            	$('#mes').html(resp['message']);
                $('.msg_div').removeClass('alert-danger');
                $('.msg_div').removeClass('alert-success');
            	$('.msg_div').addClass(cls_msg);
            	$('.msg_div').show();
            }
        });

		
	});
});