su -c 'ssh ionut@iiac.go.ro "/ip arp print" ' ionut | grep "D4:5D:64:20:52:64" | cut -d " " -f3
