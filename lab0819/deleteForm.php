<?php
    if(!isset($_GET["id"])) {
        die("id not found!");
    }
    $id = $_GET["id"];
    if(! is_numeric($id)) {
        die("id not a number!");
    }

    $link = mysqli_connect("localhost", "root", "root", "labDB0819", 8889);
    mysqli_query($link, "set names utf-8");
    $sqlCommand = <<<mySqlCommand
    DELETE FROM employees WHERE employeeId = $id;
    mySqlCommand;
    // echo $sqlCommand;
    mysqli_query($link, $sqlCommand);
    mysqli_close($link);
    header("Location: index.php");
?>