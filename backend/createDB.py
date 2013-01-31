#!/usr/bin/python
# -*- coding: utf-8 -*-
import sqlite3 as lite
import sys

con = lite.connect('brains.db')

with con:
    
    cur = con.cursor()   
    cur.execute("DROP TABLE IF EXISTS Brains") 
    cur.execute("""
    	CREATE TABLE Brains(
    		Id INTEGER PRIMARY KEY AUTOINCREMENT, 
    		IP TEXT,
    		src TEXT,
    		latSrc INT,
    		lonSrc INT,
    		dst TEXT,
    		latDst INT,
    		lonDst INT,
    		year INT,
    		month INT,
    		prof TEXT,
    		msg TEXT,
    		time INT
    		)
    	""")