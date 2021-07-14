<?php
date_default_timezone_set('Europe/Istanbul');


$ay = $aylar[date('m') - 1];
$gun = $gunler[date('N') - 1];
 
echo date('j ') . $ay . date(' Y ') ;
?>