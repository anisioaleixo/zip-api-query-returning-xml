<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_SCHEMA', 'db_ceps');


$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA) or die("Not conection database!");
