$(document).ready( function() {
    $('#pdw').on('keyup',function(evt){
        ke_pr(evt);
    });
    $('#un').on('keyup',function(evt){
        ke_pr(evt);
    });
    $('#lg_btn').on('click',function(){
 		lg_b_pr();
    });
    function ke_pr(evt){
        evt = evt || window.event;
        var charCode = evt.keyCode || evt.which;
        if(charCode == 13 )
            lg_b_pr();
    }
    function lg_b_pr(){
        if(!$('#un').val() || !$('#pdw').val()){
            $('.err_lg').show();
            return false;
        }
        $.ajax({
            type: "POST",
        url: "/reviewSystem/login",
        data: {
            cred:1,
                un:$('#un').val(),
                pdw: $('#pdw').val()
        },
        success: function (response) {
            var resp = JSON.parse(response);
            if(resp['tag']){
                $('.err_lg').hide();
                window.location = resp['url'];
            }
            else 
                $('.err_lg').show();
            }
        });
    }
});

