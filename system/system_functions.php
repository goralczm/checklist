<?php
    session_start();

    function setPopupInfo($message, $type)
    {
        $_SESSION["popupMessage"] = $message;
        $_SESSION["popupType"] = $type;
    }
    function redirect($link)
    {
        header("Location: "."{$link}");
        exit();
    }
    function loginUser($userId, $userLogin)
    {
        $_SESSION["isLogged"] = '1';
        $_SESSION["UserID"] = $userId;
        $_SESSION["UserLogin"] = $userLogin;
    }
    function logoutUser()
    {
        unset($_SESSION['isLogged']);
        unset($_SESSION['UserID']);
        unset($_SESSION['UserLogin']);
    }
    function test($varToPrint)
    {
        print($varToPrint);
        exit();
    }
?>