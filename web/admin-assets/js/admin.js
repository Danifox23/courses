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
