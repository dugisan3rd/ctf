#!/usr/bin/bash

# masscan + nmap

printf "### MASSCAN + NMAP\n"
printf "### Author: @dugisan3rd\n\n"
printf "Usage: MassNmap <ip> <iface>\n"
printf "\n[+] Checking ICMP\n"
if ping -c 1 $1 &> /dev/null
then
	# TCP
	printf "[+] Ping success! Executing MASSCAN (TCP)\n"
	printf "[+] CMD: sudo masscan -p1-65535 --rate 1000 -e $2 $1\n"
	/usr/bin/sudo /usr/bin/masscan -p1-65535 --rate 1000 -e $2 $1 > TCP_masscan_$1
	ports_tcp=$(cat TCP_masscan_$1 | awk -F " " {'print $4'} | awk -F "/" {'print $1'} | sort -nu | tr "\n" "," | sed s/,$//)
	if [ -z $ports_tcp ]
	then
		printf "\nNo TCP port is open!\n"
		/usr/bin/rm TCP_masscan_$1
	else
		printf "\n[+] TCP Ports: $ports_tcp\n\n"
		printf "[+] Executing NMAP (TCP)\n"
		printf "[+] CMD: sudo nmap -sC -sV -A -Pn -p$ports_tcp --version-intensity 9 -e $2 --script=auth,broadcast,brute,default,discovery,dos,exploit,external,fuzzer,intrusive,malware,safe,version,vuln -oA TCP_nmap_$1 $1\n\n"
		sudo /usr/bin/nmap -sC -sV -A -Pn -p$ports_tcp --version-intensity 9 -e $2 --script=auth,broadcast,brute,default,discovery,dos,exploit,external,fuzzer,intrusive,malware,safe,version,vuln -oA TCP_nmap_$1 $1
	fi

	# UDP
	printf "\n[+] Executing MASSCAN (UDP)\n"
	printf "[+] CMD: sudo masscan -pU:1-65535 --rate 1000 -e $2 $1\n"
	sudo /usr/bin/masscan -pU:1-65535 --rate 1000 -e $2 $1 > UDP_masscan_$1
	ports_udp=$(cat UDP_masscan_$1 | awk -F " " {'print $4'} | awk -F "/" {'print $1'} | sort -nu | tr "\n" "," | sed s/,$//)
	if [ -z $ports_udp ]
	then
		printf "\nNo UDP port is open!\n"
		/usr/bin/rm UDP_masscan_$1
	else
		printf "\n[+] UDP Ports: $ports_udp\n\n"
		printf "[+] Executing NMAP (UDP)\n"
		printf "[+] CMD: sudo nmap -sU -sC -sV -A -Pn -p$ports_udp --version-intensity 9 -e $2 --script=auth,broadcast,brute,default,discovery,dos,exploit,external,fuzzer,intrusive,malware,safe,version,vuln -oA UDP_nmap_$1 $1\n\n"
		/usr/bin/sudo /usr/bin/nmap -sU -sC -sV -A -Pn -p$ports_udp --version-intensity 9 -e $2 --script=auth,broadcast,brute,default,discovery,dos,exploit,external,fuzzer,intrusive,malware,safe,version,vuln -oA UDP_nmap_$1 $1
	fi
	printf "\n[+] NMAP completed! Happy hacking :)\n"
else
	printf "\n[+] Ping unsuccessful. Please check your connection/command!\n"
fi
