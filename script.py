from flask import Flask, render_template, request, redirect
import mysql.connector as sqlcon

# Initializing app 
app = Flask(__name__)

db_config = {
    'host': 'localhost', 
    'user': 'testuser', 
    'password': 'password',
    'database': 'testdb'
}


def get_table_data(table_name):
    try:
        connection = sqlcon.connect(**db_config)
        cursor = connection.cursor(dictionary=True)

        query = f"SELECT * FROM {table_name}"
        cursor.execute(query)

        data = cursor.fetchall()

        cursor.close()
        connection.close()

        return data

    except sqlcon.Error as e:
        print(f"Error {e}")
        return []

def get_schema_info(): 
    try:
        connection = sqlcon.connect(**db_config)
        cursor = connection.cursor()

        cursor.execute('SHOW TABLES')

        query_result = cursor.fetchall()
        tables = [table[0] for table in query_result]

        cursor.close()
        connection.close()

        table_data = {table: get_table_data(table) for table in tables}

        return table_data

    except sqlcon.Error as e:
        print(f"Error: {e}") 
        return []

@app.route('/')
def home():
    schema_info = get_schema_info()

    return render_template('index.html', schema_info=schema_info)

# Adding a new route for handling form submission
@app.route('/submit', methods=['POST'])
def submit():
    try:
        connection = sqlcon.connect(**db_config)
        cursor = connection.cursor()

        # Trying to add values to test
        query = "INSERT INTO test (test_id, test_name) VALUES (%s, %s)"
        # To request Id is bad practice, don't do this at home cuna dhe goca :)
        values = (request.form['id'], request.form['name'])

        cursor.execute(query, values)
        connection.commit()

        cursor.close()
        connection.close()

        # Redirect back to the home page after submission
        return redirect('/')

    except sqlcon.Error as e:
        print(f"Error: {e}")
        return "Error occurred during submission"

if __name__ == '__main__':
    app.run(host="localhost", port=6942, debug=True)
