$('.period-picker span').bind('click', function () {
    // $('.period_info').addClass('animated flipOutX');
    $period = $(this).data('period');
    $('.period-picker span.active-interval').removeClass('active-interval');
    $(this).addClass('active-interval');

    $.ajax({
        type: "POST",
        url: "/admin/default/period",
        data:
        {
            "period": $period
        },
        cache: false,

        success: function (response) {
            if (!response) {
                $.notify({
                    title: '<strong>Ошибка</strong><br>',
                    message: "норм, но ответ пустой"
                }, {
                    type: 'warning'
                });
            }
            else {
                $.notify({
                    title: '<strong>Готово</strong><br>',
                    message: "Результаты отфильтрованы!"
                }, {
                    type: 'success',
                    delay: 100,
                    timer: 500
                });

                $('.period_ajax').html(response);
                $('.period_info').addClass('animated flip');
            }
        },
        error: function (response) {
            $.notify({
                title: '<strong>Ошибка</strong><br>',
                message: "Может тебе стоит прекратить заниматься программированием?"
            }, {
                type: 'danger'
            });
        }
    });
});


// $('.delete-from-main').bind('click', function () {
$(document).on('click', '.delete-from-main', function () {
    // $('.products-on-main .content').html('<i class="fa fa-circle-o-notch fa-spin fa-fw center-block"></i>');
    $product_id = $(this).data('product-id');

    $.ajax({
        type: "POST",
        url: "/admin/default/delete-from-main",
        data:
        {
            "product_id": $product_id
        },
        cache: false,

        success: function (response) {
            if (!response) {
                $.notify({
                    title: '<strong>Ошибка</strong><br>',
                    message: "Пришёл пустой либо ложный ответ"
                }, {
                    type: 'warning',
                    delay: 100,
                    timer: 500
                });
            }
            else {
                $.notify({
                    title: '<strong>Готово</strong><br>',
                    message: "Товар больше не показывается на главной странице!"
                }, {
                    type: 'success',
                    delay: 100,
                    timer: 500
                });
                $('.products-on-main').html(response);
            }
        },
        error: function (response) {
            $.notify({
                title: '<strong>Ошибка</strong><br>',
                message: "Ошибка сервера!"
            }, {
                type: 'danger',
                delay: 100,
                timer: 500
            });
        }
    });
});


$('.update-product').bind('click', function () {
    $product_id = $(this).attr('data-product-id');
    $category_id = $('.category-view').attr('data-id');
    $.ajax({
        type: "POST",
        url: "modal",
        data:
        {
            "product_id": $product_id,
            "category_id": $category_id
        },
        cache: false,
        success: function(data){
            $('#UpdateProduct').find('.modal-body').html(data);
        },
        error: function () {
            $('#UpdateProduct').find('.modal-body').html("<h4>Ошибка</h4>");
        }
    });
});

$('#submit-modal').bind('click', function () {
    $('#modal-form').submit();
});

$('[data-toggle="tooltip"]').tooltip();
