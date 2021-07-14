// JavaScript Document
function ojidanieNG()
{
var EndDayDatabases = document.getElementById('ny_date').getAttribute('data-value');


var today = new Date();
 
var EndDay = new Date(EndDayDatabases);

var timeLeft = (EndDay.getTime() - today.getTime());
 
var e_daysLeft = timeLeft / 86400000;

var daysLeft = Math.floor(e_daysLeft);
var e_month=daysLeft/30;

var month=Math.floor(e_month);
daysLeft=daysLeft-(month*30);
e_daysLeft=e_daysLeft-(month*30);
var e_hrsLeft = (e_daysLeft - daysLeft)*24;
var hrsLeft = Math.floor(e_hrsLeft);
 
var e_minsLeft = (e_hrsLeft - hrsLeft)*60;
var minsLeft = Math.floor(e_minsLeft);
 
var seksLeft = Math.floor((e_minsLeft - minsLeft)*60);
 
if (EndDay.getTime() > today.getTime() )
document.getElementById("ny_date").innerHTML = '<font color=red>Kalan Süre</font>: '+month+' Ay '+daysLeft+' Gün, '+hrsLeft+' Saat, '+minsLeft+' dakika, '+seksLeft+' Saniye'
else
document.getElementById("ny_date").innerHTML = '<font color=red>Kanpanya Süresi Doldu</font>!!!'
}
setInterval("ojidanieNG()", 50);
setInterval("ojidanieNG()", 50)