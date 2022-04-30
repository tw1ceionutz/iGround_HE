<?php
$page = $_SERVER['PHP_SELF'];
$sec = "3";
?>
<html>
    <head>
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    </head>
    <body>
    <?php
        echo "Status irigatie se verifica din nou la fiecare 3 secunde";
        $output = shell_exec('snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.4.0 | cut -d " " -f 4');
        echo "<pre>$output</pre>";
	if ($output == 1) {
	$link = "<br><a href=on.php?view=1><img src=\"valva_inc.png\" alt=\"Valva Inchisa\" /></a> - (<b>"."</b>)";
	echo "Inchis:".$link;
	}
	if ($output == 0) {
        $link = "<br><a href=off.php?view=1><img src=\"valva_desc.png\" alt=\"Valva Deschisa\" /></a> - (<b>"."</b>)";
        echo "Deschis:".$link;
	}
    ?>
    </body>
</html>
