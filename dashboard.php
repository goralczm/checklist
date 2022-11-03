<?php 
    include("system/system_functions.php");
    if (!isset($_SESSION["isLogged"]))
    {
        setPopupInfo("Please login to access dashboard!", "warning");
        redirect("index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Checklist Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/default.css">
    </head>
    <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <?php
            include("system/navbar.php");

            include("system/db_connect.php");

            include("system/popup.php");

            $sqlQuery = "SELECT * FROM tasks WHERE UserID = {$_SESSION["UserID"]}";
            $output = mysqli_query($db, $sqlQuery);

            if (mysqli_num_rows($output) > 0)
            {
                print("<form action='system/add_record.php' method='post'>");
                while ($outputData = mysqli_fetch_assoc($output))
                {
                    print("<input type='checkbox' name='{$outputData["TaskName"]}'>");
                    print("<label for='{$outputData["TaskName"]}'>{$outputData["TaskName"]}</label><br>");
                }
                print("<input type='submit' value='Zapisz'>");
                print("</form>");
            }
        ?>
    </body>
</html>