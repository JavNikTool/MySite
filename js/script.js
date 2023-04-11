$(document).ready(function(){

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
        $('.registation_form_wrap').addClass('form_active');
        $('.registation_form').addClass('form_active');
        closeRegFormByPressing(".registation_form");
        closeRegFormByPressing(".authorization_form");
        closeRegFormByClick(".registation_form");
        closeRegFormByClick(".authorization_form");
        CloseBtn(".registation_form");
        CloseBtn(".authorization_form");
    });
    $('.activ_aut_form').click(function (){
        $('.registation_form').removeClass('form_active');
        $('.authorization_form').addClass('form_active');
    });
    function CloseBtn(value) {
        $(value + ' .close').click(function (){
            $('.registation_form_wrap').removeClass('form_active');
            $(value).removeClass('form_active');
        });
    }
    function closeRegFormByPressing(value){
        if($(".registation_form_wrap").hasClass("form_active")){
            $('html').keydown(function (e){
                if(e.key === "Escape"){
                    $('.registation_form_wrap').removeClass('form_active');
                    $(value).removeClass('form_active');
                }
            })
        }
    }
    function closeRegFormByClick(value){
        if($(".registation_form_wrap").hasClass("form_active")){
            $('.registation_form_wrap').click(() => {
                $('.registation_form_wrap').removeClass('form_active');
                $(value).removeClass('form_active');
            })
        }
    }

});

/* preloader */
$(window).on('load',() => {
    $('body').addClass('loaded_hiding');
    window.setTimeout(() => {
        $('body').addClass('loaded').removeClass('loaded_hiding');
    }, 500);
});


/*
$("a").click(function(event){
    event.preventDefault();
    linkLocation = this.href;
    $("body").fadeOut(500, redirectPage);
});
function redirectPage() {
    window.location = linkLocation;
}*/
