<?php
function printPage($typeMessage, $message)
{
    echo "
    <!DOCTYPE HTML>
    <html>
    <head>
      <meta charset=\"UTF-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
      <link href=\"../css/register.css\" rel=\"stylesheet\" type=\"text/css\">
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
}

$db = mysqli_connect("localhost", "root", "","students");
if (mysqli_connect_errno())
{
  printPage("error-message", "Unable to connect to Database.");
  echo "<script>setTimeout(\"location.href = \'../index.html\';\", 3000);</script>";
  exit(0);
}
$StudentNo = $_GET['Student'];

$result = mysqli_query($db, "DELETE FROM Student
                             WHERE StudentNo = \"$StudentNo\"");
if (!$result)
{
  printPage("error-message", "Database error. Please check entries");
  echo "<script>setTimeout(\"location.href = \'../index.html\';\", 3000);</script>";
  exit(0);
}
printPage("success-message", "Successfully deleted entry from Database.");
echo "<script>setTimeout(\"location.href = \'../index.html\';\", 3000);</script>";
?>
