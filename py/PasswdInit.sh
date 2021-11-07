#!/bin/bash
echo "###password init###"
wait
NEWPASSWD=`python /var/www/html/py/getCpu.py`
wait
echo "pi:$NEWPASSWD" > /var/www/html/py/passwd.log
wait
sudo chpasswd < /var/www/html/py/passwd.log
wait
echo "success" > /var/www/html/py/logs/passwd.log
