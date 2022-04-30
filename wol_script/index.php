<?php
$page = $_SERVER['PHP_SELF'];
$sec = "3";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="2;./index.php">
    </head>
    <body>
    <?php
    include('Net/SSH2.php');
     $ssh = new Net_SSH2('192.168.0.1');
     if (!$ssh->login('ionutz', 'ionut1439')) {
        exit('Login Failed index.php');
     }
     $rez =  $ssh->exec('/ip arp print');
     file_put_contents('/wol_script/arp.txt',$rez);
     $out1 = shell_exec('cat /wol_script/arp.txt | grep -i "58:20:b1:41:b4:ab" | cut -d " " -f3');
     # $match = preg_grep('58', $rez );
     echo "<pre>$rez</pre>";
     echo "<pre>Match: $out1</pre>";
     $output = $out1;
     echo "Status calculator UZ. Refresh din nou la fiecare 3 secunde";
        echo "<pre>Output: $output</pre>";
        echo strlen($output);
        $test = " DC ";
        if (strlen($output) <= 2) {
        $link = "<br><a href=on.php?view=1><img src=\"off.png\" alt=\"Valva Inchisa\" /></a> - (<b>"."</b>)";
        echo "Inchis:".$link;
        }
        if (strlen($output) >  2) {
            $link = "<br><a href=off.php?view=1><img src=\"on.png\" alt=\"Valva Deschisa\" /></a> - (<b>"."</b>)";
            echo "Deschis:".$link;
        }
        #phpinfo(INFO_ENVIRONMENT|INFO_VARIABLES);
    ?>
    </body>
</html>
