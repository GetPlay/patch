<div id='content'>
<?
/*
 * Project Name: MangPanel for Mangos Server
 * Date: 10.03.2009 version (2.1.0)
 * Author: Kras
 * Copyright: Kras
 * Email: 8408@bk.ru
 */
error_reporting(0); 
echo" <script type='text/javascript'>
function fixcharrepair(realm) {";
    foreach ($characters_db as $i => $value) {

 echo" if (realm == '$value[0]') {
		document.getElementById('antierror_$value[0]').innerHTML = '';
	} ";                              }

echo"}
function charrepair(r,g) {
	fixcharrepair(r);
 document.getElementById('antierror_'+r).innerHTML = HttpRequest('engine/repair.php?realm=' + r + '&guid=' + g);
}function achivements(r,g) { document.getElementById('antierror_'+r).innerHTML = HttpRequest('engine/achievements.php?realm=' + r + '&guid=' + g);}</script> ";

  foreach ($characters_db as $i => $value) {

echo'<div id="antierror_'.$value[0].'"></div>
<h2><font color="#cd5700">Ваши персонажи на реалме '.$i.'</font></h2>
<p>
<table width="100%" align="center" cellpadding="0" cellspacing="0">
<tr width="100%" height="24" class="tr">
<td align="center" width="20%"><b>Имя</b></td>
<td align="center" width="13%"><b>Уровень</b></td>
<td align="center" width="10%"><b>Раса</b></td>
<td align="center" width="10%"><b>Класс</b></td>
<td align="center" width="27%"><b>Время в игре</b></td>

</tr>';
  switchConnection($value[0],"character");
 $result = dbquery ("SELECT *, mid(lpad( hex( CAST(substring_index(substring_index(level,' ',level),' ',-1) as unsigned) ),8,'0'),4,1) as gender, CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`level`, ' ', `level`), ' ', -1) AS UNSIGNED) AS level FROM characters WHERE account =$ac_id order by guid asc")or die("eror") ; 
        if(dbrows($result) != 0){
         while ($data = dbarray($result)) {

        $tot_time = $data['totaltime'];
  $tot_days = (int)($tot_time/86400);
  $tot_time = $tot_time - ($tot_days*86400);
  $total_hours = (int)($tot_time/3600);
  $tot_time = $tot_time - ($total_hours*3600);
  $total_min = (int)($tot_time/60);

echo'<tr height="25">
<td align="center">'.$data[name].'</td>
<td align="center">'.$data[level].'</td>
<td align="center"><img src="img/c_icons/'.$data[race].'-'.$data[gender].'.gif"></td>
<td align="center"><img src="img/c_icons/'.$data['class'].'.gif"></td>
<td align="center">'.$tot_days.' дней '.$total_hours.' час(ов) '.$total_min.' минут</td>
<td align="center"><input type="submit" class="submit" value="Исправить" alt="Исправить" title="Исправить" style="width: 80%;" onclick="charrepair(\''.$value[0].'\',\''.$data[guid].'\');">';
echo '</td></tr>';
           }  }else echo'<tr height="50"><td colspan="6"><center>На реалме '.$i.' у вас пока нет ни одного персонажа.</center></td></tr>';
echo'</table>
</p>
';
                }
?>
