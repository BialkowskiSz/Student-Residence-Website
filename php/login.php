<?php
function printPage($typeMessage, $message)
{
    echo "
    <!DOCTYPE HTML>
<html>
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <link href=\"../css/login.css\" rel=\"stylesheet\" type=\"text/css\">
  <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"../images/favicon.png\" />
  <title>Student Residence</title>
</head>
<body>
  <header>
    <div style=\"margin-top: 20px;\">
      <a href=\"../index.html\">
        <img id=\"mainLogo\"
        src=\"../images/logo.png\"
        alt=\"Main Logo\">
        </img>
      </a>
    </div>
  </header>
  <div class=\"$typeMessage\">
       $message
  </div>
  <div class=\"loginBox\">
    <div class=\"loginBoxDiv\">
          <form action=\"login.php\" method=\"post\">
            <div class=\"loginField\">
              <img id=\"loginImage\"
                   src=\"../images/LoginUser.png\"
                   alt=\"LoginUser\"></img>
              <input type=\"email\"
                     name=\"login_username\"
                     placeholder=\"email\"
                     spellcheck=\"false\"
                     required>

            </div>
            <div class=\"loginField\"
            style=\"margin-top: 1px;\">
                <img id=\"loginImage\"
                     src=\"../images/PasswordUser.png\"
                     alt=\"LoginUser\"
                     width=\"1\">
                 </img>
                <input type=\"password\"
                       name=\"password_username\"
                       placeholder=\"password\"
                       spellcheck=\"false\"
                       required>
            </div>
            <div class=\"loginField\">
                <input type=\"submit\"
                    value=\"login\"
                    onclick=\"show(\'error-message\')\"
                       spellcheck=\"false\">
            </div>
            <a>
                Not a member?
            </a>
            <a id=\"link\" href=\"../register.html\">
                Create an account.
            </a>
          </form>
    </div>
  </div>


<nav class=\"bottom\">
  <a href=\"http://facebook.com\">
    <img
    src=\"../images/facebook.png\"
    alt=\"Student Residence Facebook\">
    </img>
  </a>
  <a href=\"http://twitter.com\">
    <img
    src=\"../images/twitter.png\"
    alt=\"Student Residence Twitter\">
    </img>
  </a>
  <a href=\"http://linkedin.com\">
    <img
    src=\"../images/linkedin.png\"
    alt=\"Student Residence LinkedIn\">
    </img>
  </a>
  <a href=\"https://plus.google.com/\">
    <img
    src=\"../images/google+.png\"
    alt=\"Student Residence Google+\">
    </img>
  </a>
</nav>
</body>
</html>";
      exit(0);
}
$db = mysqli_connect("localhost", "root", "","students");
if (mysqli_connect_errno())
{
    printPage("error-message", "Unable to connect to Database.");
    exit(0);
}

$email_user = mysql_real_escape_string($_POST['login_username']);
$password_user = mysql_real_escape_string($_POST['password_username']);

$result = mysqli_query($db, "SELECT Password FROM Student WHERE Email = '$email_user'");
$row = mysqli_fetch_row($result);
$p = htmlentities($row[0]);

if (password_verify($password_user, $p))
{
    printPage("success-message", "You have been successfully logged in.");
}
else
{
    printPage("error-message", "Invalid email or password. Try again.");
}
