$('.button_aside').click(function (){
    $('.hidden_nav').addClass('hidden_nav_active');
    $(this).addClass('button_aside_active');
});
$('.exit').click(function (){
    $('.hidden_nav').removeClass('hidden_nav_active');
    $('.button_aside').removeClass('button_aside_active');
});
$('.hidden_nav ul li a').click(function (){
    $('.hidden_nav').removeClass('hidden_nav_active');
    $('.button_aside').removeClass('button_aside_active');
});

/*registation_form*/
$('.log-in').click(function (){
    regForHandler();
});
function regError(){
    $('.auth_form_wrap').addClass('form_active');
    $('.registation_form').addClass('form_active');
    closeFormByPressing(".registation_form");
    closeFormByClick(".registation_form");
    CloseBtn(".registation_form");
}
function regForHandler(){
    $('.auth_form_wrap').addClass('form_active');
    $('.authorization_form').addClass('form_active');
    closeFormByPressing(".registation_form");
    closeFormByPressing(".authorization_form");
    closeFormByClick(".registation_form");
    closeFormByClick(".authorization_form");
    CloseBtn(".registation_form");
    CloseBtn(".authorization_form");
}
$('.activ_aut_form').click(function (){
    $('.authorization_form').removeClass('form_active');
    $('.registation_form').addClass('form_active');
});
function CloseBtn(value) {
    $(value + ' .close').click(function (){
        $('.auth_form_wrap').removeClass('form_active');
        $(value).removeClass('form_active');
        history.pushState(null, '', '/');
    });
}
function closeFormByPressing(value){
    if($(".auth_form_wrap").hasClass("form_active")){
        $('html').keydown(function (e){
            if(e.key === "Escape"){
                $('.auth_form_wrap').removeClass('form_active');
                $(value).removeClass('form_active');
                history.pushState(null, '', '/');
            }
        })
    }
}
function closeFormByClick(value){
    if($(".auth_form_wrap").hasClass("form_active")){
        $('.auth_form_wrap').click(function (){
            $('.auth_form_wrap').removeClass('form_active');
            $(value).removeClass('form_active');
            history.pushState(null, '', '/');
        })
    }
}
