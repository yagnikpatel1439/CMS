<?php

$db['DB_HOST'] = "127.0.0.1";
$db['DB_USER'] = "root";
$db['DB_PASS'] = "";
$db['DB_NAME'] = "cms";
$db['DB_PORT'] = "3306";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

if ($connection) {
    echo "Connection Established!";
}


?>