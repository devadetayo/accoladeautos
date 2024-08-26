<?php 
    if($_SERVER['SERVER_NAME'] == "LOCALHOST"){
        define('DBUser', 'root');
        define('DBPass', '');
        define('DBName', 'car_parts_inventory');
        define('DBHost', 'localhost');
    }else{
        define('DBUser', 'root');
        define('DBPass', '');
        define('DBName', 'car_parts_inventory');
        define('DBHost', 'localhost');
    }
    
    $db = mysqli_connect(DBHost, DBUser, DBPass, DBName);

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }