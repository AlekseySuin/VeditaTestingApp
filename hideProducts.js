function hideProduct(productId) {
    $.ajax({
        type: 'post',
        url: 'CProducts.php',
        data: {id: productId, is_hidden:1}
    });
    var p=this.parentNode.parentNode;
         p.parentNode.removeChild(p);
}