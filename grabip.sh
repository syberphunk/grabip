#!/bin/bash
php /home/<user>/grabip/grabip.php > /home/<user>/grabip/ip.html
#upload html page using private key?
#scp -Cv -i /home/<user>/grabip/server_priv.key /home/<user>/grabip/ip.html <remote user>:/home/website/public_html
scp -C /home/<user>/grabip/ip.html <remote user>:/home/website/public_html

#alternative way of grabbing ip?
#dig +short myip.opendns.com @resolver1.opendns.com
