<?php
function date_function()
{
	date_default_timezone_set('Europe/Istanbul');

$gunler = array(
    'Pazartesi',
    'Salı',
    'Çarşamba',
    'Perşembe',
    'Cuma',
    'Cumartesi',
    'Pazar'
);
 
$aylar = array(
    'Ocak',
    'Şubat',
    'Mart',
    'Nisan',
    'Mayıs',
    'Haziran',
    'Temmuz',
    'Ağustos',
    'Eylül',
    'Ekim',
    'Kasım',
    'Aralık'
);
 
$ay = $aylar[date('m') - 1];
$gun = $gunler[date('N') - 1];
$last_date=date('j ') . $ay . date(' Y ') ;
 
return $last_date;
}

?>