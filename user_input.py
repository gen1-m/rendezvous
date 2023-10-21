from flask import Flask, render_template, request, redirect, url_for, flash
import mysql.connector

app = Flask(__name__)

# Your existing database configuration
db_config = {
    'host': 'localhost',
    'user': 'Group-19',#'group3'
    'password': '0W83lT',
    'database': 'Group-19',
}

# Define a function to establish a database connection
def get_db_connection():
    try:
        connection = mysql.connector.connect(**db_config)
        return connection
    except mysql.connector.Error as err:
        print(f"Error connecting to the database: {err}")
        return None

@app.route('/', methods=['GET', 'POST'])
def home():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['password']

        connection = get_db_connection()
        if connection:
            try:
                cursor = connection.cursor()
                insert_query = "INSERT INTO users (username, user_password) VALUES (%s, %s)"
                cursor.execute(insert_query, (username, password))
                connection.commit()
                flash('User added successfully', 'success')
            except mysql.connector.Error as err:
                flash(f'Error: {err}', 'danger')
            finally:
                cursor.close()
                connection.close()

    return render_template('log_in.html')

@app.route('/accepted')
def accepted():
    return render_template('accepted.html')

if __name__ == '__main__':
    app.secret_key = 'your_secret_key'  # Set a secret key for flash messages
    app.run(host='10.72.1.14', port=8080, debug=True)
