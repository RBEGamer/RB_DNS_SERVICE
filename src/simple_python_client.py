#!/bin/bash
import urllib2
import time

gen_uuid = "YOUR UUID HERE"
device_name = "A device name or leave it blank"
password = "YOUR PASSWORD"
port = "80" # DEFAULT REDIRECT PORT
device_type = "RPI" # RPI ARD ESP EMBEDDED 

print("UUID : " + gen_uuid)
print("PW : " + password)

update_url = "http://109.230.230.209/rb_dns_server/update.php?uuid=" +gen_uuid + "&pass=" + password + "&port=" + port+ "&type=" + device_type + "&device_name=" + device_name
while true:
    #print(update_url)
    content = urllib2.urlopen(update_url).read()
    print content
    time.sleep(60)
