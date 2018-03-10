<?php
{
    //information required to log into the database
    //DEFINE ('DB_USER', 'phpmyersd2');
    //DEFINE ('DB_PASSWORD', '1294231');
    //DEFINE ('DB_HOST', 'mca.matc.edu');
    //DEFINE ('DB_NAME', 'phpmyersd2');
    
    //Use localhost for testing
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "todo");
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    //if you can't connect to the database, then DIE!
    if($conn->connect_errno)
    {
        echo("<br/>Failed to connect to MySQL:(" . $conn->connect_errno . ")" . $conn->connect_error);
        die('<br/>Program Terminated');
    }
}
?>