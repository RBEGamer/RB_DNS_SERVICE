<?php
// Function to get the client IP address

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


//echo get_client_ip();



include('db_conf.php');
$verbindung = mysql_connect ($db_host,
$db_username, $db_password)or die ("keine Verbindung möglich. Benutzername oder Passwort sind falsch");
mysql_select_db($db_name)or die ("Die Datenbank existiert nicht.");


if(isset($_GET['uuid']) && isset($_GET['type']) && isset($_GET['pass']) && isset($_GET['device_name']) && isset($_GET['port'])){

if($_GET['uuid'] == "00000000-0000-0000-0000-000000000000"){
echo "change_uuid";
exit();
}
if(!isset($_GET['debug']) && $_GET['uuid'] == "00000000-1234-1234-1234-000000000000"){
echo "change_uuid";
exit();
}


//echo "param_ok";
//count rows
$client_ip = get_client_ip();
$row_counter = 0;
 $fetchinfo_dev = mysql_query("SELECT * FROM `ip_lookup` WHERE `uuid`='".$_GET['uuid']."'");
while($row_dev = mysql_fetch_array($fetchinfo_dev)) {
$row_counter++;
}
//echo "uuidc" .$row_counter ."<br>";


//if == 1 update
if($row_counter == 0){
$update_data = mysql_query("INSERT INTO `ip_lookup` (`id`, `uuid`, `dest_ip_v4`, `dest_ip_port`, `device_type`, `device_name`, `device_pw`, `last_update`, `creation_date`, `params`, `localip`) VALUES (NULL, '".$_GET['uuid']."', '".$client_ip."', '".$_GET['port']."', '".$_GET['type']."', '".$_GET['device_name']."', '".$_GET['pass']."', CURRENT_TIMESTAMP, '0000-00-00 00:00:00.000000', '".$_GET['tl']."', '".$_GET['localip']."');");
$insert_log = mysql_query("INSERT INTO `log` (`id`, `message`, `ip`, `time`) VALUES (NULL, 'register device ip', '" .$client_ip ."', CURRENT_TIMESTAMP);");
echo "insert_ok";
//insert
}else if($row_counter == 1){

//CHECK PW
$pw_check = mysql_query("SELECT* FROM `ip_lookup` WHERE `device_pw`='".$_GET['pass']."' AND `uuid`='".$_GET['uuid']."' AND `ip` != '".$client_ip."'");

if(mysql_fetch_array($pw_check) != false){
$insert_data = mysql_query("UPDATE `ip_lookup` SET `dest_ip_v4`='".$client_ip."',`dest_ip_port`='".$_GET['port']."',`device_name`='".$_GET['device_name']."',`device_pw`='".$_GET['pass']."', `localip`='".$_GET['localip']."' WHERE `uuid`='".$_GET['uuid']."' AND `device_pw`='".$_GET['pass']."'");
$update_log = mysql_query("INSERT INTO `log` (`id`, `message`, `ip`, `time`) VALUES (NULL, 'update device ip', '".$client_ip."', CURRENT_TIMESTAMP);");
echo "update_ok";
}else{
echo "password_wrong";
}

}else{
echo "change_uuid";
}



}else{
echo "missing_or_empty_params";
}
?>
