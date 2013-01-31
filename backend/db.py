#!/usr/bin/python
# -*- coding: utf-8 -*-

import os
import sqlite3 as lite
import sys
import json
import time


lastModification = os.path.getmtime("db.json")
lastUpdate = int(time.time() - lastModification)

if lastUpdate < 60: 
    print "Last JSON update", lastUpdate, "secs ago: do nothing"
    exit()

print "Updating JSON..."

con = lite.connect('test.db')

with con:
    t0 = time.time()       
    cur = con.cursor() 
    cur.execute("SELECT * FROM Cars")
    rows = cur.fetchall()
    f = open("tmp.json", 'w')
    f.write(json.dumps(rows))
    f.close()

    # Atomic renaming of the file
    os.rename("tmp.json", "db.json") 
    print "JSON updated:", len(rows), "rows added in %4.2f" %((time.time() - t0)*1000), " ms"