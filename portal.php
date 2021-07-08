<?php
$app = $_GET['app'];
$hostid = $_GET['hostid'];
$conn = new mysqli('localhost', 'youruser', 'yourpass', 'zabbix');
$result = $conn->query("select ip from interface where hostid=$hostid limit 1");
$row = $result->fetch_assoc();
$ipaddress = $row['ip'];
if ($app == 'winbox')
        header("Location: winbox:$ipaddress");
?>
