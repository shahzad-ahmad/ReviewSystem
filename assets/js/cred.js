$(document).ready( function() {
    $('#pdw').on('keyup',function(evt){
        ke_pr(evt);
    });
    $('#email').on('keyup',function(evt){
        ke_pr(evt);
    });
    $('#lg_btn').on('click',function(){
 		lg_b_pr();
    });
    $('#email').on('keyup',function(evt){
       ke_pr_fp(evt); 
    });
    $('#se_em_btn').on('click',function(){
        f_p_aj();
    });
    $(".close").on('click',function (){
        if($('.n_ex').is(':visible') ){
            $('.n_ex').hide();
        }
        if($('.suc_ms').is(':visible') ){
            $('.suc_ms').hide();
        }
    });
    function ke_pr_fp(evt){
        evt = evt || window.event;
        var charCode = evt.keyCode || evt.which;
        if(charCode == 13 )
            f_p_aj();
    }
    function f_p_aj(){
        $.ajax({
            type: "POST",
            url: "/reviewSystem/forgot-password-request",
            data: {
                cred:1,
                email:$('#email').val()
            },
            success: function (response) {
                var resp = JSON.parse(response);
                if(resp['tag']){
                    $('#suc_ms_tx').html(resp['message']);
                    $('.n_ex').hide();
                    $('.suc_ms').show();
                }else {
                    $('#n_ex_tx').html(resp['message']);
                    $('.suc_ms').hide();
                    $('.n_ex').show();
                }
            }
        });

    }
    function ke_pr(evt){
        evt = evt || window.event;
        var charCode = evt.keyCode || evt.which;
        if(charCode == 13 )
            lg_b_pr();
    }
    function lg_b_pr(){
        if(!$('#email').val() || !$('#pdw').val()){
            $('.err_lg').show();
            return false;
        }
        $.ajax({
            type: "POST",
            url: "/reviewSystem/login-request",
            data: {
                cred:1,
                    email:$('#email').val(),
                    pdw: $('#pdw').val()
            },
            success: function (response) {
                var resp = JSON.parse(response);
                if(resp['tag']){
                    $('.n_ex').hide();
                    window.location = resp['url'];
                }
                else {
                    $('#n_ex_tx').html(resp['message']);
                    $('.n_ex').show();
                }
            }
        });
    }
});

