function regError(){
    $('.auth-reg_form_wrap').addClass('form_active');
    $('.registration_form').addClass('form_active');
    closeFormByPressing(".registration_form");
    closeFormByClick(".registration_form");
    CloseBtn(".registration_form");
}

function authError(){
    $('.auth-reg_form_wrap').addClass('form_active');
    $('.authorization_form').addClass('form_active');
    closeFormByPressing(".authorization_form");
    closeFormByClick(".authorization_form");
    CloseBtn(".authorization_form");
}

function recoverError(){
    $('.auth-reg_form_wrap').addClass('form_active');
    $('.pass_recovery_form').addClass('form_active');
    closeFormByPressing(".pass_recovery_form");
    closeFormByClick(".pass_recovery_form");
    CloseBtn(".pass_recovery_form");
}
function authFormHandler(){
    $('.auth-reg_form_wrap').addClass('form_active');
    $('.authorization_form').addClass('form_active');
    closeFormByPressing(".registration_form");
    closeFormByPressing(".authorization_form");
    closeFormByPressing('.pass_recovery_form');
    closeFormByClick(".registration_form");
    closeFormByClick(".authorization_form");
    closeFormByClick(".pass_recovery_form");
    CloseBtn(".registration_form");
    CloseBtn(".authorization_form");
    CloseBtn(".pass_recovery_form");
}

function CloseBtn(value) {
    $(value + ' .close').click(function (){
        $('.auth-reg_form_wrap').removeClass('form_active');
        $(value).removeClass('form_active');
        history.pushState(null, '', '/');
    });
}
function closeFormByPressing(value){
    if($(".auth-reg_form_wrap").hasClass("form_active")){
        $('html').keydown(function (e){
            if(e.key === "Escape"){
                $('.auth-reg_form_wrap').removeClass('form_active');
                $(value).removeClass('form_active');
                history.pushState(null, '', '/');
            }
        })
    }
}
function closeFormByClick(value){
    if($(".auth-reg_form_wrap").hasClass("form_active")){
        $('.auth-reg_form_wrap').click(function (){
            $('.auth-reg_form_wrap').removeClass('form_active');
            $(value).removeClass('form_active');
            history.pushState(null, '', '/');
        })
    }
}