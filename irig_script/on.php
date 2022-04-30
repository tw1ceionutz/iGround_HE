<html>
<header>
 <meta http-equiv="refresh" content="2;URL=../iground/irig.php">
</header>
<body>
<?php
$output = shell_exec('snmpset -v 1 -c private  192.168.0.100 iso.3.6.1.4.1.17095.3.4.0 int 0');
#echo $output;
return;
?>
</body>
</html>
