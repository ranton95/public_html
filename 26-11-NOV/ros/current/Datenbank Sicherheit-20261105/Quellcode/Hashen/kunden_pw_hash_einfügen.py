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
    geb = input("Geburtsdatum: ")
    passwort = input("Passwort: ")
    
    passwort = passwort.encode('utf-8')

    hashed_pswd = bcrypt.hashpw(passwort, bcrypt.gensalt())
    #print(hashed_pswd)
    
    cursor.execute("INSERT INTO kunden VALUES (NULL,%s,%s,%s);",[name,geb,hashed_pswd])
    connection.commit()
except:
    print("Fehler beim Erstellen")


cursor.close()
connection.close()
