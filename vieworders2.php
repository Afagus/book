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
//Считывание всего файла
//Каждый заказ становится элементом массива

$orders = file("$DOCUMENT_ROOT/orders/orders.txt");

//Подсчет количества заказов хранящихся в массиве
$number_of_orders = count($orders);
if ($number_of_orders == 0) {
    echo '<p><strong>Нет необработанных заказов. Загляните позже. </strong></p>';
}

echo "<table border = \"1\" >\n";
echo "<tr>" .
    "<th bgcolor = \"#CCCCFF\">Дата заказа</th>".
    "<th bgcolor = \"#CCCCFF\">Покрышки</th>".
    "<th bgcolor = \"#CCCCFF\">Масло</th>".
    "<th bgcolor = \"#CCCCFF\">Свечи</th>".
    "<th bgcolor = \"#CCCCFF\">Всего</th>".
    "<th bgcolor = \"#CCCCFF\">Адрес</th>".
    "<tr>";

for ($i=0; $i<$number_of_orders; $i++){
    //Разбиение строк
    $line = explode("\t", $orders[$i]);

    //Сохранение только количества заказанных товаров
    $line[1] = intval($line[1]);
    $line[2] = intval($line[2]);
    $line[3] = intval($line[3]);

    //Вывод заказов

    echo "<tr>" .
        "<td>" . $line[0] . "</td>".
        "<td align=\"right>\">" . $line[1] . "</td>".
        "<td align=\"right>\">" . $line[2] . "</td>".
        "<td align=\"right>\">" . $line[3] . "</td>".
        "<td align=\"right>\">" . $line[4] . "</td>".
        "<td>" . $line[5] . "</td>";
    "</tr>";
}
echo "</table>";
?>
</body>
</html>
