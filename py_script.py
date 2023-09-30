import mysql.connector as sqlcon

try:
    connection = sqlcon.connect(host='localhost', 
                                database='testdb', 
                                user='testuser', 
                                password='password')

    sql_select_query = "select * from test"
    cursor = connection.cursor()
    cursor.execute(sql_select_query)

    records = cursor.fetchall()
    print("Total number of rows in table: ", cursor.rowcount)

    print("\nPrinting each row")
    for row in records:
        print("Id = ", row[0], )
        print("Name = ", row[1], )
        # print("Price = ", row[2], )
        # print("Purchase date = ", row[3], "\n")

except sqlcon.Error as e: 
    print("Error reading data from MySQL table", e)
finally:
    if connection.is_connected():
        connection.close()
        cursor.close()
        print("MySQL connection is closed!")

    # if connection.is_connected():
    #     db_Info = connection.get_server_info()
    #     print("Connected to MySQL Server version ", db_Info)
    #     cursor = connection.cursor()
    #     cursor.execute("select database();")
    #     record = cursor.fetchone()
    #     print("You're connected to database: ", record)

# except sqlcon.Error as e:
#     print("Error while connecting to MySQL", e)
# finally:
#     if connection.is_connected():
#         cursor.close()
#         connection.close()
#         print("MySQL connection is closed")
