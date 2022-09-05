# -*- coding: utf-8 -*-
"""
Created on Fri Apr  8 09:31:18 2022

"""
import sys,json
import fruits_description

#try to load the json data sent from php
try:
    data = sys.argv[1]
except:
    print(json.dumps({"error":"no data sent"}))
    sys.exit(1)


result = fruits_description.char(data)

# #send result to stdout
print (json.dumps(result))
