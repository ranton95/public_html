import mysql.connector

try:
    db = mysql.connector.connect(host="localhost", user="root", password="", database="shop")
except:
    print("keine Datenbankverbindung")

user_name = input("Username: ")
user_password = input("Passwort: ")

abfrage = f"Select * from kunden where Name='{user_name}' and Passwort='{user_password}'"
statement = db.cursor(dictionary=True, buffered=True)
statement.execute(abfrage)

daten = statement.fetchone()

if statement.rowcount > 0:
    print(f"Hallo {daten['Name']}\n")
    print("Neue Artikel eingeben:\n")
    import eintrag
else:
    print("Zugriff verweigert")
