<html>
<head>

</head>



<body>
<h1> Welcome to the RBDNS Service </h1>
<br><br>



<h2> Device Access </h2>
To access please enter your device uuid and the password
<br />
<form id='device_access_form' name='device_access_form' action='redirect.php' method='GET'>

<label for="uuid_text">DEVICE UUID</label>
<input type='text' placeholder='00000000-0000-0000-0000-000000000000' size='32' name='uuid_text' id='uuid_text' />
<br />

<label for="pass_text">PASSWORD</label>
<input type='text' placeholder='' size='16' name='pass_text' id='pass_text' />

<br />
<input type='submit' value='REDIRECT TO DEVICE' />
</form>



<br />
<h2>STATISTICS</h2>
<table>
<?php
include('db_conf.php');
$verbindung = mysql_connect ($db_host, $db_username, $db_password)or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
mysql_select_db($db_name)or die ("Die Datenbank existiert nicht.");
$row_counter = 0;
 $fetchinfo_dev = mysql_query("SELECT * FROM `ip_lookup` WHERE 1");
while($row_dev = mysql_fetch_array($fetchinfo_dev)) {
$row_counter++;
}
echo "<tr><td>REGISTERED DEVICES</td><td>" . $row_counter ."</td></tr>";
?>
</table>
<br />


<h2>INFORMATION</h2>
For further information please visit my github repo at <a href='https://github.com/RBEGamer/RB_DNS_SERVICE'>github.com/RBEGamer</a>

<br><br><br>
<h3><a href='../impressum.html'>Impressum</a><h3>

</body>

</html>
