# personality-test-dataset
Set up the environment by first downloading the files, MySQLWorkbench and MAMP. 


Then, start the MAMP server and run the SQL scripts in the following order in MySQLWorkbench: db_big5_create_tables.sql, db_big5_load_tables.sql, db_big5_advanced_features.sql. We have also provided a file called db_big5_script.sql that contains all of the features from the three separate SQL files and it is possible to just run the db_big5_script.sql as an alternative method.


Then, put the frontend folder FivePersonality into the MAMP/htdocs folder. To start the application, go on any Google Chrome and enter the address:
`localhost:8888/FivePersonality/index.html`


If the website cannot be loaded, open up the conn.php file inside the FivePersonality folder and check if the port on line 11 matches the port in the MAMP settings.
