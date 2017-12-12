<?php // Przykład 26-2: header.php
  session_start();

  echo "<!DOCTYPE html>\n<html><head><meta charset='utf-8'>";

  require_once 'functions.php';

  $userstr = ' (Gość)';

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = " ($user)";
  }
  else $loggedin = FALSE;

  echo "<title>$appname$userstr</title><link rel='stylesheet' " .
       "href='styles.css' type='text/css'>"                     .
       "</head><body><center><canvas id='logo' width='624' "    .
       "height='96'>$appname</canvas></center>"             .
       "<div class='appname'>$appname$userstr</div>"            .
       "<script src='javascript.js'></script>";

  if ($loggedin)
  {
    echo "<br ><ul class='menu'>" .
         "<li><a href='members.php?view=$user'>Główna</a></li>" .
         "<li><a href='members.php'>Użytkownicy</a></li>"         .
         "<li><a href='friends.php'>Znajomi</a></li>"         .
         "<li><a href='messages.php'>Wiadomości</a></li>"       .
         "<li><a href='profile.php'>Profil</a></li>"    .
         "<li><a href='logout.php'>Wyloguj</a></li></ul><br>";
  }
  else
  {
    echo ("<br><ul class='menu'>" .
          "<li><a href='index.php'>Strona główna</a></li>"                .
          "<li><a href='signup.php'>Zarejestruj się</a></li>"            .
          "<li><a href='login.php'>Zaloguj się</a></li></ul><br>"     .
          "<span class='info'>&#8658; Musisz być zalogowany, aby " .
          "wyświetlić tę stronę.</span><br><br>");
  }
?>
