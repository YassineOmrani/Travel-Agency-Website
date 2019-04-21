<?php
    //  Database Credentials
    define('DB_HOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','projectdb');
    
    //  Establish a connection to database
    $con = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
    
    function row_count($result){
        
        return mysqli_num_rows($result);
    }
    function escape($string){
        global $con;
        return mysqli_real_escape_string($con,$string);
    }
    function query($query){
        //  Grabing the connection to data base and global because it's inside a function
        global $con;
        return mysqli_query($con, $query);
    }
    function fetch_data($result){
        global $con;
        return mysqli_fetch_array($result);
    }
    function confirm($result){
        global $con;
        if (!$result){
            die("Query failed!!" . mysqli_error($con));
        }
    }
    
?>