<?php // Przykład 26-12: logout.php
  require_once 'header.php';

  if (isset($_SESSION['user']))
  {
    destroySession();
    echo "<div class='main'>Zostałeś wylogowany. " .
         "<a href='index.php'>Kliknij tutaj</a>, aby odświeżyć stronę.";
  }
  else echo "<div class='main'><br>" .
            "Nie możesz się wylogować, ponieważ nie jesteś zalogowany.";
?>

    <br><br></div>
  </body>
</html>
