rez=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.2.1.1.3.0 | cut -d " " -f 4 | tr "(" " " | tr ")" " ")
#snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.2.1.1.3.0 | cut -d " " -f 4 | cut -d "(" -f1) | tr "(" " " | tr ")" " "
echo $rez
min=$(($rez/6000));
echo $min;
if (($min<15)); then
        echo "Placa a fost restartata"
	rez1=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.1.0 | cut -d " " -f 4)
	echo $rez1
	rez2=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.2.0 | cut -d " " -f 4)
	echo $rez2
	rez3=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.3.0 | cut -d " " -f 4)
	echo $rez3
	rez4=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.4.0 | cut -d " " -f 4)
	echo $rez4
	rez5=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.5.0 | cut -d " " -f 4)
	echo $rez5
	if (("$rez1" == "0")); then
		echo "Trebuie sa opresc 1"
		rezc=$(snmpset -v 1 -c private  192.168.0.100 iso.3.6.1.4.1.17095.3.1.0 int 1)
	fi
	
	if (("$rez2" == "0")); then
		rezc=$(snmpset -v 1 -c private  192.168.0.100 iso.3.6.1.4.1.17095.3.2.0 int 1)
	fi
	
	if (("$rez4" == "0")); then
		rezc=$(snmpset -v 1 -c private  192.168.0.100 iso.3.6.1.4.1.17095.3.4.0 int 1)
	fi
	if (("$rez5" == "0")); then
		rezc=$(snmpset -v 1 -c private  192.168.0.100 iso.3.6.1.4.1.17095.3.5.0 int 1)
	fi
else
	echo "Placa nu a fost restartata"
	rez1=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.1.0 | cut -d " " -f 4)
	echo $rez1
	rez2=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.2.0 | cut -d " " -f 4)
	echo $rez2
	rez3=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.3.0 | cut -d " " -f 4)
	echo $rez3
	rez4=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.4.0 | cut -d " " -f 4)
	echo $rez4
	rez5=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.5.0 | cut -d " " -f 4)
	echo $rez5
fi
#rez=$(snmpget -v 1 -c public  192.168.0.100 iso.3.6.1.4.1.17095.3.4.0 | cut -d " " -f 4)
#echo $rez
