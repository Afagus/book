<?php
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
?>

<html>
<head>
    <title>Автозапчасти от Вована - Результаты заказа</title>
</head>
<body>
<h1>Автозапчасти от Вована</h1>
<h2>Результата заказа</h2>
<?php
    echo "<p>Заказ обработан в " .  date('H:i, jS F Y') .  '</p>';
    echo 'Заказано: <br />';
    echo $tireqty . ' покрышек <br />';
    echo $oilqty . ' бутылок масла <br />';
    echo $sparkqty . ' свечей зажигания <br />';
?>
</body>
</html>
