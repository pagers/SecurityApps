<?php // Przykład 26-10: friends.php
  require_once 'header.php';

  if (!$loggedin) die();

  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else                      $view = $user;

  if ($view == $user)
  {
    $name1 = $name2 = "Twoje ";
    $name3 =          "Ty ";
  }
  else
  {
    $name1 = "<a href='members.php?view=$view'>$view</a>'s";
    $name2 = "$view - jej/jego";
    $name3 = "$view ";
  }

  echo "<div class='main'>";

  // Usuń komentarz z poniższej linii, jeśli chcesz wyświetlić profil użytkownika
  // showProfile($view);

  $followers = array();
  $following = array();

  $result = queryMysql("SELECT * FROM friends WHERE user='$view'");
  $num    = $result->num_rows;

  for ($j = 0 ; $j < $num ; ++$j)
  {
    $row           = $result->fetch_array(MYSQLI_ASSOC);
    $followers[$j] = $row['friend'];
  }

  $result = queryMysql("SELECT * FROM friends WHERE friend='$view'");
  $num    = $result->num_rows;

  for ($j = 0 ; $j < $num ; ++$j)
  {
      $row           = $result->fetch_array(MYSQLI_ASSOC);
      $following[$j] = $row['user'];
  }

  $mutual    = array_intersect($followers, $following);
  $followers = array_diff($followers, $mutual);
  $following = array_diff($following, $mutual);
  $friends   = FALSE;

  if (sizeof($mutual))
  {
    echo "<span class='subhead'>$name2 znajomości</span><ul>";
    foreach($mutual as $friend)
      echo "<li><a href='members.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (sizeof($followers))
  {
    echo "<span class='subhead'>$name2 grono obserwatorów</span><ul>";
    foreach($followers as $friend)
      echo "<li><a href='members.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (sizeof($following))
  {
    echo "<span class='subhead'>$name3 obserwuje(sz)</span><ul>";
    foreach($following as $friend)
      echo "<li><a href='members.php?view=$friend'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (!$friends) echo "<br>Nie masz jeszcze żadnych znajomości.<br><br>";

  echo "<a class='button' href='messages.php?view=$view'>" .
       "$name2 wiadomości</a>";
?>

    </div><br>
  </body>
</html>
