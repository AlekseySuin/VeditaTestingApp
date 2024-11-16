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