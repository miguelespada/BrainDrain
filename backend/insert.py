#!/usr/bin/python
# -*- coding: utf-8 -*-

import os
import sqlite3 as lite
import sys
import json
import time




con = lite.connect('test.db')



with con:
    
    cur = con.cursor()    
    cur.execute("INSERT INTO Cars VALUES(10, 'panda', 10000)")
