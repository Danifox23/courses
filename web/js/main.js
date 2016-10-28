//---------------------------Корзина-----------------------

$('.clear-cart').bind('click', function (e) {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (response) {
            if (!response) {
                $.notify({
                    title: '<strong>Ошибка</strong><br>',
                    message: "Может тебе стоит прекратить заниматься программированием?"
                }, {
                    type: 'warning'
                });
            }
            else {
                $.notify({
                    title: '<strong>Корзина очищена</strong><br>',
                    message: "Ну что такое? Всё же нормально было..."
                }, {
                    type: 'warning'
                });
                $('.ajax-cart').html('<h3>Корзина пуста</h3>')
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

$(document).on('click', '.delete-item', function (e) {
   e.preventDefault();
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete-item',
        type: 'GET',
        data: {
            id: id
        },
        success: function (response) {
            if (!response) {
                $.notify({
                    title: '<strong>Ошибка</strong><br>',
                    message: "Может тебе стоит прекратить заниматься программированием?"
                }, {
                    type: 'warning'
                });
            }
            else {
                $.notify({
                    title: '<strong>Успешно</strong><br>',
                    message: "Выбранная позиция удалена"
                }, {
                    type: 'success'
                });

                $('.ajax-cart').html(response);
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

$('.add-to-cart').on('click', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var quantity = $('.product-quantity-input').val();

    $.ajax({
        url: '/cart/add',
        data: {
            id: id,
            quantity: quantity
        },
        type: 'GET',
        success: function (response) {
            if (!response) {
                $.notify({
                    title: '<strong>Ошибка</strong><br>',
                    message: "Может тебе стоит прекратить заниматься программированием?"
                }, {
                    type: 'warning'
                });
            }
            else
            {
                $.notify({
                    title: '<strong>Поздравляем</strong><br>',
                    message: "Товар успешно добавлен в корзину!"
                }, {
                    type: 'success',
                    delay: 100
                });
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

$(document).on('click', '.cart_quantity_up', function(e) {
    e.preventDefault();

    var position_id = $(this).data('position-id');

    $.ajax({
        type: "POST",
        url: "/cart/quantity-up",
        data:
        {
            "position_id": position_id
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
                    message: "Количество увеличено!"
                }, {
                    type: 'success',
                    delay: 100,
                    timer: 500
                });
                $('.ajax-cart').html(response);
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

$(document).on('click', '.cart_quantity_down', function(e) {
    e.preventDefault();

    var position_id = $(this).data('position-id');

    $.ajax({
        type: "POST",
        url: "/cart/quantity-down",
        data:
        {
            "position_id": position_id
        },
        cache: false,

        success: function (response) {
            if (!response) {
                $.notify({
                    title: '<strong>Ошибка</strong><br>',
                    message: "Нет, это так не работает!"
                }, {
                    type: 'warning'
                });
            }
            else {
                $.notify({
                    title: '<strong>Готово</strong><br>',
                    message: "Колличество уменьшено!"
                }, {
                    type: 'success',
                    delay: 100,
                    timer: 500
                });
                $('.ajax-cart').html(response);
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


//---------------------------/Корзина-----------------------

/*price range*/

$('#sl2').slider();

var RGBChange = function () {
    $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
};

/*scroll to top*/

$(document).ready(function () {
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            scrollDistance: 300, // Distance from top/bottom before showing element (px)
            scrollFrom: 'top', // 'top' or 'bottom'
            scrollSpeed: 300, // Speed back to top (ms)
            easingType: 'linear', // Scroll to top easing (see http://easings.net/)
            animation: 'fade', // Fade, slide, none
            animationSpeed: 200, // Animation in speed (ms)
            scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
            //scrollTarget: false, // Set a custom target element for scrolling to the top
            scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
            scrollTitle: false, // Set a custom <a> title if required.
            scrollImg: false, // Set true to use image
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
            zIndex: 2147483647 // Z-Index for the overlay
        });
    });
});
