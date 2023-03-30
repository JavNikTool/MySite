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


});