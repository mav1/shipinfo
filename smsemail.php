                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   <?php

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

mysql_query("Select name, port FROM ships where port LIKE place%");
$res = mysql_query($sql);
				while ( $row = mysql_fetch_assoc($res) )
{
$body=file_get_contents("http://sms.ru/sms/send?api_id=" . $api . "&to=PUT_YOUR_NUMBER_HERE&text=".urlencode(iconv("windows-1251","utf-8","�����" . $row['name']. "������� � ����". $row['port']))); 
require_once('class.phpmailer.php'); 
$body='�����' . $row['name']. '������� � ����' . $row['port'];
$mail = new PHPMailer();
$mail->CharSet = "utf-8"; 
$body = $mess6.$mess.$mess7;
$body = eregi_replace("[\]",'',$body);
$mail->SetFrom('admin@shipinfo.site', '�����' . $row['name'].  '������� � ����' ); 
$mail->Subject = "����� ������ � ����";
$mail->MsgHTML($body); 
$mail->AddAddress($address, "admin@shipinfo.site"); 
}
?>
