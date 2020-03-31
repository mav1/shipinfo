<?php
$hostname = 'localhost';        
$dbname   = 'dbname'; 
$dbusername = 'dbadmin';
$dbpassword = 'dbpassword';

$connection = mysql_connect($hostname, $dbusername, $dbpassword);
if(!$connection) {
	die("database connection failed." . "Mistake");
}
$connection_q = mysql_query("SET names 'utf8'");
if(!$connection_q) {
	die("set names failed." . "Mistake");
}
$db_select = mysql_select_db($dbname, $connection);
if(!$db_select) {
	die("database selection failed." . "Mistake");
}

mysql_query("DELETE FROM `ships`"); 

for ($j = 1; $j < 3; $j++) {
$filename = $j .'.txt'; 
echo $filename;
$content = file_get_contents($filename);
$table = strstr($content, '<tbody role="alert" aria-live="polite" aria-relevant="all">'); 

 $table= str_replace('<tbody role="alert" aria-live="polite" aria-relevant="all">', '', $table); 

 $table = strstr($table, '</tbody></table>', true);
 
 $pieces = explode("</tr>", $table); 


foreach ($pieces as $i => $value) {
   $smallpieces = explode("</td>", $pieces[$i]);

  
    $name=strip_tags($smallpieces[0]);
    $imo=strip_tags($smallpieces[1]); 
    $mmsi=strip_tags($smallpieces[2]);
    $place=strip_tags($smallpieces[3]);
    $port=strip_tags($smallpieces[4]);
    $rvp=strip_tags($smallpieces[5]);
    $year=strip_tags($smallpieces[6]);
    $gt=strip_tags($smallpieces[7]);
    $dwt=strip_tags($smallpieces[8]);
     mysql_query("INSERT INTO ships values ('$name', '$imo', '$mmsi', '$place', '$port', '$rvp', '$year', '$gt', '$dwt') ");
    
}
?>
