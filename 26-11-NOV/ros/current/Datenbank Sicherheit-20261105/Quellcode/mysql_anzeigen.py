import mysql.connector

try:
    connection = mysql.connector.connect(host="localhost", user="root", passwd="", db="shop")
except:
    print("Keine Verbindung zum Server")
    
sql='''
SELECT * FROM artikel
'''
cursor = connection.cursor()
cursor.execute(sql)
result = cursor.fetchall()
cursor.close()
connection.close()


print('Anzahl Datensätze: ', len(result))
for datensatz in result:
    for feld in datensatz:
       print(feld, end=" ")
    print()
