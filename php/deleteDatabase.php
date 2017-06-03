<?php
echo "<!DOCTYPE HTML>
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

echo "<div class = \"viewContentsDiv\"><a>Student Database</a><table border = \"1px\">";

$db = mysqli_connect("localhost", "root", "","students");
if (mysqli_connect_errno())
{
    exit(0);
}

$result = mysqli_query($db, "SELECT StudentNo,
                                    StudentName,
                                    GradType,
                                    CourseNo,
                                    Presence,
                                    YearOfCourse,
                                    Email FROM Student");
echo "<tr class = \"boldTable\">
          <td>StudentNo</td>
          <td>StudentName</td>
          <td>GradType</td>
          <td>CourseNo</td>
          <td>Presence</td>
          <td>YearOfCourse</td>
          <td>Email</td>
          <td>Content</td></tr>";

$gray = 0;
while ($row = mysqli_fetch_row($result)) {
    if ($gray % 2 == 0)
    {
        echo "<tr class = \"white\"><td>";
    }
    else
    {
        echo "<tr class = \"gray\"><td>";
    }
    $gray++;
    echo ($row[0]);
    echo "</td><td>";
    echo ($row[1]);
    echo "</td><td>";
    echo ($row[2]);
    echo "</td><td>";
    echo ($row[3]);
    echo "</td><td>";
    echo ($row[4]);
    echo "</td><td>";
    echo ($row[5]);
    echo "</td><td>";
    echo ($row[6]);
    echo "</td><td>";
    echo "<a id = \"edit\" href = \"deleteDatabaseEntry.php?Student=$row[0]\">Delete</a></td></tr>";
}
 ?>
