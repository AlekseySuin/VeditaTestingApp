<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Товары</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Артикул</th>
            <th>Количество</th>
            <th>Дата создания</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
    <?php
            require_once 'CProducts.php';
            $products = new CProducts('localhost', 'root', '', 'Products');
            $productList = $products->getProducts(10);

            foreach ($productList as $product) {
                echo "<tr id='product-{$product['PRODUCT_ID']}'>
                        <td>{$product['PRODUCT_ID']}</td>
                        <td>{$product['PRODUCT_NAME']}</td>
                        <td>{$product['PRODUCT_PRICE']}</td>
                        <td>{$product['PRODUCT_ARTICLE']}</td>
                        <td>
                        <button class='decrease' data-id={$product['PRODUCT_ID']}>-</button>
                        <span id='quantity-{$product['PRODUCT_ID']}'>{$product['PRODUCT_QUANTITY']}</span>
                        <button class='increase' data-id={$product['PRODUCT_ID']}>+</button>
                        </td>
                        <td>{$product['DATE_CREATE']}</td>
                        <td><button onclick='hideProduct({$product['PRODUCT_ID']})'>Скрыть</button></td>
                    </tr>";
            }
            ?>
    </tbody>
</table>
<script src="hideProducts.js"></script>
</body>
</html>