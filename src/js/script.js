$('.button_aside').click(function () {
    $('.hidden_nav').addClass('hidden_nav_active');
    $(this).addClass('button_aside_active');
});
$('.exit').click(function () {
    $('.hidden_nav').removeClass('hidden_nav_active');
    $('.button_aside').removeClass('button_aside_active');
});
$('.hidden_nav ul li a').click(function () {
    $('.hidden_nav').removeClass('hidden_nav_active');
    $('.button_aside').removeClass('button_aside_active');
});

/*reg_auth form*/
$('.log-in').click(function () {
    authFormHandler();
});

$('.log-in_blog').click(function () {
    authFormHandler();
});

$('.activ_reg_form').click(function (e) {
    e.preventDefault();
    $('.authorization_form').removeClass('form_active');
    $('.registration_form').addClass('form_active');
});

$('.pass_recovery_activ').click(function (e) {
    e.preventDefault();
    $('.authorization_form').removeClass('form_active');
    $('.pass_recovery_form').addClass('form_active');
});


// скрипты комментариев в блоге

// кнопка редактирования коммента
$('[data-btn-edit="yes"]').click(function (e) {
    e.preventDefault();


    let current = $(e.target);
    let indexBtn = current.index('[data-btn-edit="yes"]');

    $('[data-comment="yes"]').each((index, value) => {

        if (index == indexBtn) {
            if (!tinyMCE.get(`${value.id}`)) {
                this.innerHTML = "<i class=\"fa-solid fa-pen\"></i> сохранить";
                value.setAttribute("data-tinymce", 'yes')
                tinymce.init({
                    selector: '[data-tinymce="yes"]',
                    height: 250,
                    language: 'ru',
                    highlight_on_focus: true,
                    menubar: 'format',
                    plugins: 'code image link autoresize',
                    toolbar: 'styles | bold italic fontfamily fontsize forecolor | aligncenter alignjustify alignright alignleft alignnone | link image'
                })
            } else {

                this.innerHTML = "<i class=\"fa-solid fa-pen\"></i> редактировать";
                $('[data-comment="yes"]').each((index, value) => {
                    if (index == indexBtn) {
                        tinymce.remove('[data-comment="yes"]');
                        delete value.dataset.tinymce;
                        let data = {data: value.innerHTML, id: value.dataset.elementId};
                        $.ajax({
                            method: "POST",
                            url: "/blog/element_update",
                            dataType: "json",
                            data: data,
                        })
                    }
                })
            }
        }
    })

})

// кнопка удаления коммента

$('[data-btn-delete="yes"]').click(function (e) {
    e.preventDefault();
    let current = $(e.target);
    let indexBtn = current.index('[data-btn-delete="yes"]');

    $('[data-comment="yes"]').each((index, value) => {
        if (index == indexBtn) {
            let data = {id: value.dataset.elementId};
            $.ajax({
                method: "POST",
                url: "/blog/element_delete",
                dataType: "json",
                data: data,
                success: function (request) {

                }
            })
            value.closest('.comment_wrap').remove();
        }
    })
})
