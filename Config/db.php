<?php
function connect()
{
    $hname = 'localhost';
    $uname = 'root';
    $pass = '';
    $db = 'asriloka';


    $conn = mysqli_connect($hname, $uname, $pass, $db);

    if (!$conn) {
        die("Cannot Connect to Database" . mysqli_connect_error());
    } else {
        logger("Database Connected 🚀");
    }

    return $conn;
}

function disconnect($con)
{
    mysqli_close($con);
    logger("Database Disconnected 🚀");
}
?>