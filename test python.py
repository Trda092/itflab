import mysql.connector

mydb =mysql.connector.connect(
  host="servertest002.mysql.database.azure.com",
  user="Trda@servertest002",
  password="Tadaohm1234",
  database="pythondbs"
)
mycursor = mydb.cursor()
mycursor.execute("SELECT * FROM user")
myresult = mycursor.fetchall()
for i in myresult:
  print(i)
