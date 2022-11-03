<?php
    include("system_functions.php");
    include("db_connect.php");

    $today = date("Y-m-d");
    $tasksDone = count($_POST);

    $sqlQuery = "SELECT * FROM records WHERE Date = '{$today}' AND UserID = {$_SESSION["UserID"]}";
    $output = mysqli_query($db, $sqlQuery);

    if (mysqli_num_rows($output) > 0)
    {
        $sqlQuery = "UPDATE records SET TasksDone = {$tasksDone} WHERE UserID = {$_SESSION["UserID"]}";
        $output = mysqli_query($db, $sqlQuery);

        setPopupInfo("Updated tasks done for today!", "success");
        redirect("../dashboard.php");
    }

    $sqlQuery = "INSERT INTO records VALUES (null, {$_SESSION["UserID"]}, '{$today}', {$tasksDone})";
    $output = mysqli_query($db, $sqlQuery);

    setPopupInfo("Added tasks done for today! Great job!", "success");
    redirect("../dashboard.php");
?>