<?php // Przykład 26-7: login.php
  require_once 'header.php';
  echo "<div class='main'><h3>Wprowadź swoje dane, by się zalogować.</h3>";
  $error = $user = $pass = "";

  if (isset($_POST['user']))
  {
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user == "" || $pass == "")
        $error = "Nie wszystkie pola zostały wypełnione.<br><br>";
    else
    {
      $result = queryMySQL("SELECT user,pass FROM members
        WHERE user='$user' AND pass='$pass'");

      if ($result->num_rows == 0)
      {
        $error = "<span class='error'>Błędna nazwa lub hasło.</span><br><br>";
      }
      else
      {
        $_SESSION['user'] = $user;
        $_SESSION['pass'] = $pass;
        die("Jesteś zalogowany. Aby kontynuować, <a href='members.php?view=$user'>" .
            "kliknij tutaj</a>.<br><br>");
      }
    }
  }

  echo <<<_END
    <form method='post' action='login.php'>$error
    <span class='fieldname'>Nazwa</span><input type='text'
      maxlength='16' name='user' value='$user'><br>
    <span class='fieldname'>Hasło</span><input type='password'
      maxlength='16' name='pass' value='$pass'>
_END;
?>

    <br>
    <span class='fieldname'>&nbsp;</span>
    <input type='submit' value='Logowanie'>
    </form><br></div>
  </body>
</html>
