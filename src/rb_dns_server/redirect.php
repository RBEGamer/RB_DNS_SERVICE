<?php
include('db_conf.php');
$verbindung = mysql_connect ($db_host,
$db_username, $db_password)or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
mysql_select_db($db_name)or die ("Die Datenbank existiert nicht.");

if(isset($_GET['uuid_auth'])){
if(isset($_GET['uuid_text']) && $_GET['uuid_text'] != "" && isset($_GET['pass_text']) && $_GET['pass_text'] != ""){
$row_counter = 0;
$fetchinfo_dev = mysql_query("SELECT * FROM `ip_lookup` WHERE `uuid`='".$_GET['uuid_text']."' AND `device_pw`='".$_GET['pass_text']."' AND `ignore` = '0'");
while($row_dev = mysql_fetch_array($fetchinfo_dev)) {
$row_counter++;
// . .$row_dev['dest_ip_v4']echo .$row_dev['dest_ip_v4'];

$redirect_string = "location: http:";
$redirect_string = $redirect_string. "/" . "/";
$redirect_string  = $redirect_string.$row_dev['dest_ip_v4'] .":" .$row_dev['dest_ip_port'] ."/";
echo "redirect to :" .$redirect_string ."<br />";
break;
}

if(isset($_GET['direct_redirect'])){
header($redirect_string);
}

echo "please click : <a href='http:" ."/" ."/" .$row_dev['dest_ip_v4'] .":" .$row_dev['dest_ip_port'] ."/'>"."http:" ."/" ."/" .$row_dev['dest_ip_v4'] .":" .$row_dev['dest_ip_port'] ."/</a>" ;
exit();
}else{
echo "missing parameters";
header('Location: ./index.php');
exit();
}


}else{
}
?>

