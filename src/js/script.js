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

/*reg_auth form*/
$('.log-in').click(function (){
    authFormHandler();
});

$('.activ_reg_form').click(function (){
    $('.authorization_form').removeClass('form_active');
    $('.registration_form').addClass('form_active');
});

$('.pass_recovery_activ').click(function () {
    $('.authorization_form').removeClass('form_active');
    $('.pass_recovery_form').addClass('form_active');
});