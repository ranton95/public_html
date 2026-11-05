import mysql.connector
try:
    connection = mysql.connector.connect \
        (host = "localhost", user = "root", passwd = "")
except:
    print("Keine Verbindung zum Server")

cursor = connection.cursor()


cursor.execute("USE shop")
connection.commit()

try:
   
    name = input("Name: ")
    geb = input("Gebdatum: ")
    pw = input("Passwort: ")
       
    cursor.execute("INSERT INTO kunden VALUES(NULL,%s,%s,%s);",[name,geb,pw])
    
    connection.commit()

except:
    print("Fehler beim Erstellen")

cursor.close()
connection.close()
