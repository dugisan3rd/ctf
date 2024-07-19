# Introduction

**Platform**: Hack The Box
**Category**: boot2root
**OS**: Linux
**Difficulty**: Easy
**URL**: https://app.hackthebox.com/machines/PermX

# Writeup
## Enumeration
### 80-tcp-http
1. Found subdomain lms.permx.htb.
2. Subdomain is running [Chamilo LMS](https://chamilo.org/en/).

## Exploitation
### CVE-2023-4220: Chamilo LMS <= 1.11.24 - Remote Code Execution
1. Chamilo LMS vulnerable to insecure file upload, [CVE-2023-4220](https://pentest-tools.com/vulnerabilities-exploits/chamilo-lms-11124-remote-code-execution_22949).

## Privilege Escalation
### www-data -> mtz
#### Password Reuse
1. Once in reverse shell, enumerate Chamilo LMS `configuration.php` which hardcoded database password.
2. Reuse the password for user `mtz`.

### mtz -> root
#### Wildcard Injection
1. List of sudo command shows `mtz` can run `/opt/acl.sh` with root privilege.
2. The `/opt/acl.sh` script is vulnerable to [wildcard injection](https://www.hackingarticles.in/exploiting-wildcard-for-privilege-escalation/) attack.
3. Symbolic link `/etc/sudoers` inside mtz home directory.
    ```
    ln -fs /etc/sudoers /home/mtz/sudoers
    ```
4. Execute the script.
    ```
    sudo /opt/acl.sh mtz rwx /home/mtz/sudoers
    ```
5. Edit the sudoers.
    ```

    ```
6. Escalate to root by triggering the new added sudo command.
    ```
    sudo su
    ```