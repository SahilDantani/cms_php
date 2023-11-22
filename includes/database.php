<?php
/**
 * Get the database connection
 * 
 * @return  object connection to mysql server
 */
function getDB(){
    $db_host = "localhost";
    $db_user = "cms_www";
    $db_pass = "/y1Z/uR@B7]e7qwn";
    $db_name = "cms";
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if (mysqli_connect_error()) {
        echo mysqli_connect_error();
        exit;
    }
    return $conn;
}
$db_host = "localhost";
$db_user = "cms_www";
$db_pass = "/y1Z/uR@B7]e7qwn";
$db_name = "cms";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit;
}
