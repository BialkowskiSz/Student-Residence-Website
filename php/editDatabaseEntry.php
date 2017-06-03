<?php
$db = mysqli_connect("localhost", "root", "","students");
if (mysqli_connect_errno())
{
    exit(0);
}
$StudentNo = $_GET['Student'];

$result = mysqli_query($db, "SELECT StudentNo,
                                    StudentName,
                                    GradType,
                                    CourseNo,
                                    Presence,
                                    YearOfCourse,
                                    Email FROM Student
                                    WHERE StudentNo = \"$StudentNo\"");

$row = mysqli_fetch_row($result);

echo "<!DOCTYPE HTML>
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

  <div class=\"loginBox\">
    <div class=\"loginBoxDiv\">
          <form action=\"editDatabaseEntryInsert.php\" method=\"post\">
            <div class=\"loginField\">
              <input type=\"email\"
                     name=\"email_user\"
                     value = \"$row[6]\"
                     placeholder=\"email\"
                     spellcheck=\"false\"
                     required>
            </div>
            <div class=\"loginField\"
            style=\"margin-top: 1px;\">
                <input type=\"password\"
                       name=\"password_user\"
                       placeholder=\"password\"
                       spellcheck=\"false\"
                       required>
            </div>
            <div class=\"loginField\">
                <input type=\"text\"
                       name=\"StudentNo_user\"
                       value = \"$row[0]\"
                       placeholder=\"Student Number\"
                       spellcheck=\"false\"
                       readonly>
            </div>
            <div class=\"loginField\">
                <input type=\"text\"
                       name=\"StudentName_user\"
                       value = \"$row[1]\"
                       placeholder=\"Student Name\"
                       spellcheck=\"false\"
                       required>
            </div>
            <div class=\"loginField\">
                <input type=\"text\"
                       name=\"GradType_user\"
                       value = \"$row[2]\"
                       placeholder=\"Graduate type\">
            </div>
            <div class=\"loginField\">
                <input type=\"text\"
                       name=\"CourseNo_user\"
                       value = \"$row[3]\"
                       placeholder=\"Course number\"
                       spellcheck=\"false\">
            </div>
            <div class=\"loginField\">
                <input type=\"number\"
                       name=\"YearOfCourse_user\"
                       value = \"$row[5]\"
                       placeholder=\"Year of course\"
                       spellcheck=\"false\">
            </div>
            <div class=\"loginField\">
                <input type=\"submit\"
                    value=\"update\"
                       spellcheck=\"false\">
            </div>
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
 ?>
