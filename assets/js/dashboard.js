$(document).ready( function() {
	$('.sho_secr').on('click', function(){
		if($('.secr').hasClass('tkn_no_hd'))
			$('.secr').removeClass('tkn_no_hd');
		else
			$('.secr').addClass('tkn_no_hd');
	})
});