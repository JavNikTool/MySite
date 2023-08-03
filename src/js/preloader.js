/* preloader */
if(typeof intervalVar === 'undefined' && typeof counter === 'undefined'){
    let intervalVar = setInterval(preloaderInterval, 500);
    let counter = 0;

    function preloaderInterval() {
        $('.preloaderTitle').text(() => {
            counter++
            counter > 2 ? counter = 0 : counter;
            switch (counter){
                case 0:
                    return "Загрузка.";
                case 1:
                    return "Загрузка.."
                case 2:
                    return "Загрузка..."
            }
        })
    }

    $(window).on("load", function(){
        clearInterval(intervalVar);
        $('body').addClass('loaded_hiding');
        window.setTimeout(function () {
            $('body').addClass('loaded').removeClass('loaded_hiding');
        }, 500);
    });
}


