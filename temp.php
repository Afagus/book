<?php
$a = ['first'=>1,'second' => 'red', 'big'=>'own', 5=>'men'];
$b = [4=>5, 'list'=>6, 6=>7, 7=>8];

$c = $a + $b;
ksort($a);

echo '<pre>';
print_r($a);
echo '</pre>';