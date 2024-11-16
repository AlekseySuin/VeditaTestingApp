function hideProduct(productId) {
    $.ajax({
        type: 'post',
        url: 'CProducts.php',
        data: {id: productId, is_hidden:1}
    });
    
    deleteRow(productId);
};

function deleteRow(productId) {
    element = "product-" +productId;
    el = document.getElementById(element);
    if (el) {
        el.remove();
    } else {
        console.error(`Элемент с id product-${productId} не найден.`);
    }
};

$('.increase').click(function () {
    var productId = $(this).data('id');
    var quantitySpan = $('#quantity-' + productId);
    var newQuantity = parseInt(quantitySpan.text()) + 1;
    quantitySpan.text(newQuantity);

    $.post('CProducts.php', {product_id: productId, quantity: newQuantity});
});

$('.decrease').click(function () {
    var productId = $(this).data('id');
    var quantitySpan = $('#quantity-' + productId);
    var newQuantity = Math.max(0, parseInt(quantitySpan.text()) - 1);
    quantitySpan.text(newQuantity);

    $.post('CProducts.php', {product_id: productId, quantity: newQuantity});
});