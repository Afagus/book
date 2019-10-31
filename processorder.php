<?php
//создание коротких имен
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$address = $_POST['address'];
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
$date = date('H:i, jS F Y');
?>

<html>
<head>
    <title>Автозапчасти от Вована - Результаты заказа</title>
</head>
<body>
<h1>Автозапчасти от Вована</h1>
<h2>Результата заказа</h2>
<?php
    echo '<p>Заказ обработан в ' . $date .  '</p>';
    $totalqty = $tireqty + $oilqty + $sparkqty;
    echo 'Заказано товаров: ' . $totalqty . '<br />';
    if ($totalqty == 0){
        echo 'Вы ничего не заказали на предыдущей странице! <br />';
    }else{
        if ($tireqty > 0){
            echo $tireqty . ' покрышек <br />';
        }
        if ($oilqty > 0){
            echo $oilqty . ' бутылок масла <br />';
        }
        if ($sparkqty >0){
            echo $sparkqty . ' свечей зажигания <br />';
        }
    }
    define('TIREPRICE', 100);
    define('OILPRICE', 10);
    define('SPARKPRICE', 4);
    $totalamount = $tireqty * TIREPRICE
                + $oilqty * OILPRICE
                + $sparkqty * SPARKPRICE;
    $totalamount = number_format($totalamount, '2', '.', '');
    echo '<p>Итого по заказу: ' . $totalamount . '</p>';
    echo '<p>Адрес доставки: ' . $address .'</p>';
    $outputstring = $date. "\t" . $tireqty . ' покрышек' . "\t" .
                    $oilqty . ' масла' . "\t" .
                    $sparkqty . ' свечей.' . "\t" .
                    '$' . $totalamount . "\t".
                    $address . "\n";

    //открываем файл для дозаписи
/** @var TYPE_NAME $fp */
@ $fp = fopen("$DOCUMENT_ROOT/orders/orders.txt", 'ab');
if (!$fp) {
    echo "<p><strong>В настоящий момент мы не можем обработать ваш заказ, обратитесь позднее</strong></p></body>
</html>";
    exit;
}
flock($fp,LOCK_EX);
fwrite($fp, $outputstring, strlen($outputstring));
flock($fp,LOCK_UN);
fclose($fp);
echo "<p>Заказ записан</p>";
?>
</body>
</html>
