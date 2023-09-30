To connect a Python MySQL database with an HTML page and store and display data, you'll need to use a server-side framework like Flask or Django to handle the Python code and integrate it with your HTML page. Here's a step-by-step guide using Flask:

1. Install the necessary libraries:

- Install Flask: `pip install flask`

- Install MySQL Connector: `pip install mysql-connector-python`

2. Set up your MySQL database:

- Install MySQL server on your system if you haven't already.

- Create a new database and a table to store your data.

3. Create a Flask application:

- Create a new Python file, e.g., `app.py` and import the necessary modules:

```python

from flask import Flask, render_template, request

import mysql.connector

```

- Initialize your Flask application and configure the MySQL connection:

```python

app = Flask(__name__)

# Create a MySQL connection

conn = mysql.connector.connect(

host='localhost',

user='your_username',

password='your_password',

database='your_database_name'

)

```

4. Define routes and views:

- Create a route for the home page that displays the HTML form:

```python

@app.route('/')

def home():

return render_template('index.html')

```

- Create a route to handle form submission and store data in the database:

```python

@app.route('/submit', methods=['POST'])

def submit():

# Get form data

name = request.form['name']

email = request.form['email']

# Insert data into the database

cursor = conn.cursor()

query = "INSERT INTO users (name, email) VALUES (%s, %s)"

cursor.execute(query, (name, email))

conn.commit()

cursor.close()

return 'Data submitted successfully!'

```

5. Create the HTML template:

- Create a new folder called `templates` in the same directory as your `http://app.py

` file.

- Inside the `templates` folder, create a new HTML file, e.g., `index.html`, with a form:

```html

<form action="/submit" method="POST">

<input type="text" name="name" placeholder="Name">

<input type="email" name="email" placeholder="Email">

<input type="submit" value="Submit">

</form>

```

6. Run the application:

- Add the following code at the bottom of your `http://app.py

` file:

```python

if __name__ == '__main__':

app.run(debug=True)

```

- Start your application by running `python http://app.py

` in your terminal.

Now, when you access your Flask application in a web browser, you will see a form where you can enter a name and email address. Upon submission, the data will be stored in the MySQL database. You can modify the HTML template and database schema according to your requirements to display and retrieve data in different ways.