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
