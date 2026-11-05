import mysql.connector, bcrypt
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
    passwort = input("Passwort: ")
    
    passwort = passwort.encode('utf-8')

    cursor.execute("SELECT Passwort FROM kunden WHERE Name = %s;", (name,))

    test = (cursor.fetchone()[0]).encode('utf-8')
    print(test)
    if bcrypt.checkpw(passwort,test):
        print("OK")
    else:
        print("Nicht OK")
except:
    print("Fehler beim Erstellen")

cursor.close()
connection.close()
