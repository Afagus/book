<?php
//создание короткого имени
$DOCUMENT_ROOT = $_SERVER["DOCUMENT_ROOT"];
?>

<html>
<head>
    <title>Автозапчасти - Заказы клиентов</title>
</head>
<body>
<h1>Автозапчасти от Вована</h1>
<h2>Заказы клиентов</h2>
<?php
$orders = file("$DOCUMENT_ROOT/orders/orders.txt");

$number_of_orders = count($orders);
if ($number_of_orders == 0) {
    echo '<p><strong>Нет необработанных заказов. Загляните позже</strong></p>';
}
for ($i = 0; $i < $number_of_orders; $i++) {
    echo $orders[$i].'<br />';
}
?>
</body>
</html>
