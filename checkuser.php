<?php // Przykład 26-6: checkuser.php
  require_once 'functions.php';

  if (isset($_POST['user']))
  {
    $user   = sanitizeString($_POST['user']);
    $result = queryMysql("SELECT * FROM members WHERE user='$user'");

    if ($result->num_rows)
      echo  "<span class='taken'>&nbsp;&#x2718; " .
            "Taka nazwa już istnieje.</span>";
    else
      echo "<span class='available'>&nbsp;&#x2714; " .
           "Ta nazwa jest dostępna.</span>";
  }
?>
