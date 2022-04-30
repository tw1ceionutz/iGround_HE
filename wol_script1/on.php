<html>
<header>
 <meta http-equiv="refresh" content="2;URL=./index.php">
</header>
<body>
<?php
 include('Net/SSH2.php');
     $ssh = new Net_SSH2('192.168.0.1');
     if (!$ssh->login('ionutz', 'ionut1439')) {
    exit('Login Failed on.php ');
}
$rez =  $ssh->exec('/tool wol interface=bridge  mac=58:20:b1:41:b4:ab');
$output = $rez;
echo $output;
return;
?>
</body>
</html>
