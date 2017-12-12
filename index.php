<?php // Przykład 26-4: index.php
  require_once 'header.php';

  echo "<br><span class='main'>Witaj w $appname,";

  if ($loggedin) echo " $user, jesteś zalogowany(a).";
  else           echo ' zarejestruj się albo zaloguj, aby przejść dalej.';
?>

    </span><br><br>
  </body>
</html>
