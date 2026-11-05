import mysql.connector

try:
    connection = mysql.connector.connect \
        (host = "localhost", user = "root", passwd = "")
except:
    print("Keine Verbindung zum Server")
    
cursor = connection.cursor()

cursor.execute("USE shop")
connection.commit()                    

sql='''
INSERT INTO artikel VALUES(NULL,"Keyboard",122,209);
'''
try:
    cursor.execute(sql)
    connection.commit()   
except:
    print("Fehler")

cursor.close()
connection.close()
