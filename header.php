<?php
session_start();
echo "<!DOCTYPE html>\n<html><head><meta charset='UTF-8'";
require_once 'functions.php';
$userstr = '(Gość)';
if (isset($_SESSION['user']))
{
    $user = $_SESSION['user'];
    $loggin = TRUE;
    $userstr = ($user);
}
else $loggin = FALSE;
echo "<title>$appname$userstr</title><link rel = 'stylesheet'" .
    "href='style.css' type='text/css'>" .
    "</head><body><center><canvas id='logo'>with='624'" .
    "height='96'>$appname</canvas></center>" .
    "<div class ='appname'>$appname$userstr</div>" .
    "<script src='javascript.js'></script>";
if ($loggin)
    echo "<br ><ul class='menu'>" .
        "<li><a href='members.php?view=$user'>Główna</a></li>" .
        "<li><a href='members.php'>Użytkownicy</a></li>" .
        "<li><a href='friends.php'>Znajomi</a></li>" .
        "<li><a href='messages.php'>Wiadomości</a></li>" .
        "<li><a href='profile.php'>Profil</a></li>" .
        "<li><a href='logout.php'>Wyloguj</a></li>";
else
    echo ("<br><ul class = 'menu'>") .
        "<li><a href='index.php'Strona Główna</a></li>" .
        "<li><a href='signup.php'Zarejestruj się</a></li>" .
        "<li><a href='login.php'Zaloguj się</a></li></ul><br>" .
        "<span class = 'info'>$#8658; Musisz być zalogowany, aby " .
        "wyświetlić te stronę. </span><br><br>)";
?>