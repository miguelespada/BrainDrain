#!/usr/bin/python
# -*- coding: utf-8 -*-

import os
import sqlite3 as lite
import sys
import json
import time




con = lite.connect('test.db')

with con:
    
    while True:
        t0 = time.time()       
        cur = con.cursor() 
        cur.execute("SELECT * FROM Cars")
        rows = cur.fetchall()
        f = open("tmp.json", 'w')
        f.write(json.dumps(rows))
        f.close()

        # Atomic renaming of the file
        os.rename("tmp.json", "db.json") 
        print len(rows), " Rows : ", time.time() - t0
        time.sleep(10)