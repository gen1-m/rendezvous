# Rendezvous
Rendezvous is an event manager application. 

## Step-by-step guide 
After you have successfully cloned the repo on your machine (assuming you know how to 🤭 ) you can follow the guide to be able to use the python script (also assuming you have python installed in your machine 🤗 ) :

### Step 1

This command creates a virtual environment to install python packages using _pip_ command. 

`python -m venv ./env`

git commit -m "Added test connection script 'py_script.py', requirements.txt and modified .gitignore "

### Step 2

`pip install -r requirements.txt`

### Step 3

Edit the _db_config_ dictionary inside the **_script.py_** to match you local database.

```python
db_config = {
    'host': 'localhost', 
    'user': 'testuser', 
    'password': 'password',
    'database': 'testdb'
}
```

## For contributors!

The actual state of the app is that through the input form in the html page,
you can only input values for a simple table in my database called **test**.
In order to put values for the other tables the function `submit` should be
modified. For now, leave it as it is, especially Xhesi, DON'T TOUCH IT!
