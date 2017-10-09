# I researched the commands and it seems the ssh and scp commands will
# allow for connecting to a remote computer, invoking a command and 
# copying files to it respectively. It may seem we would need to just
# prepare the computer for the ssh and open the ports so here's the 
# commands I saw on stackoverflow that would accomplish that:
#
# sudo apt-get install openssh-server
# sudo ufw allow 22
#
# also go to /etc/ssh/sshd_config and set
# PasswordAuthentication no
#
# installs the ssh server and the second command opens up port 22 to
# remote connections.
#
# Commands in this script file:
#
# ssh user@remoteHost command
#
# scp sourceFiles user@remoteHost:destinationFolder

scp uploadedFiles/* userPC@10.0.0.1:/home/desktop/uploadedFiles
#copies files across

ssh userPC@10.0.0.1 sh /home/desktop/script.sh
#runs the script on the other pc

# replace details with actual ones