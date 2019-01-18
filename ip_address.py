#!/usr/bin/env python3

import requests
import subprocess

test = subprocess.Popen(["hostname", "-I"], stdout=subprocess.PIPE)
output = test.communicate()[0]


def setup():
    global output
    output_str = str(output)
    output_ip = output_str.split("'")
    ip_address = output_ip[1].split(' ')
    param = {'ip_address': ip_address[0], 'machine': 'ADC0607B'}
    req = requests.put('http://192.168.1.56/api/ip_address', data=param)


if __name__ == '__main__':     # Program start from here
    try:
        setup()
    except (RuntimeError, TypeError, NameError):
        print(RuntimeError)
        print(TypeError)
        print(NameError)
