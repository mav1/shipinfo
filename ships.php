<?php
				$hostname = 'localhost';
$dbname   = 'dbname';
$dbusername = 'dbusername';
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
				
				$sql = "SELECT * FROM ships";
				$res = mysql_query($sql);
				
				echo '<p>Список судов</p>
				<p></p>
				<table cellspacing="0" border="1"><tr>
    <th>Имя</th>
    <th>imo</th>
    <th>mmsi</th>
    <th>Местонахождение</th>
    <th>Назначение</th>
    <th>rvpi</th>
    <th>Год</th>
    <th>Валовой тоннаж</th>
    <th>Грузоподъемность</th>
    </tr>';
				
				
				while ( $row = mysql_fetch_assoc($res) )
    
    
    {
?>
<TR CLASS="data"><TD><?php if (!empty($row['name'])) { echo $row['name']; } else { echo '-';} ?></TD><TD><?php if 

(!empty($row['imo'])) { echo $row['imo']; } else { echo '-';} ?></TD>
<TD><?php if 

(!empty($row['mmsi'])) { echo $row['mmsi']; } else { echo '-';} ?></TD>

<TD><?php if 

(!empty($row['place'])) { echo $row['place']; } else { echo '-';} ?></TD>

<TD><?php if 

(!empty($row['port'])) { echo '<a target="_blank" href="http://maps.google.com/?q=' . $row['port'] . '">' . $row['port'] . '</a>'; } else { echo '-';} ?></TD>

<TD><?php if 

(!empty($row['rvp'])) { echo $row['rvpi']; } else { echo '-';} ?></TD>

<TD><?php if 

(!empty($row['year'])) { echo $row['year']; } else { echo '-';} ?></TD>

<TD><?php if 

(!empty($row['gt'])) { echo $row['gt']; } else { echo '-';} ?></TD>

<TD><?php if 

(!empty($row['dwt'])) { echo $row['dwt']; } else { echo '-';} ?></TD>

</TR>
<?php
}
echo '</table>';
?>
				