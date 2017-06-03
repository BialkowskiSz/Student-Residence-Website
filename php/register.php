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
    printPage("error-message", "Connection to database unavailable.");
    exit(0);
}

$email_user = mysql_real_escape_string($_POST['email_user']);
$password_user = password_hash(mysql_real_escape_string($_POST['password_user']), PASSWORD_DEFAULT);
$StudentNo_user = mysql_real_escape_string($_POST['StudentNo_user']);
$StudentName_user = mysql_real_escape_string($_POST['StudentName_user']);
$GradType_user = mysql_real_escape_string($_POST['GradType_user']);
$CourseNo_user = strtoupper(mysql_real_escape_string($_POST['CourseNo_user']));
$YearOfCourse_user = mysql_real_escape_string($_POST['YearOfCourse_user']);


if (strlen($email_user) > 30)
{
    printPage("error-message", "Email is too long. Please try again.");
    echo "<script>setTimeout(\"location.href = \'../register.html\';\", 3000);</script>";
    exit(0);
}
else if (strlen($StudentNo_user) > 20)
{
    printPage("error-message", "Student Number is too long. Please try again.");
    echo "<script>setTimeout(\"location.href = \'../register.html\';\", 3000);</script>";
    exit(0);
}
else if (strlen($StudentName_user) > 40)
{
    printPage("error-message", "Student Name is too long. Please try again.");
    echo "<script>setTimeout(\"location.href = \'../register.html\';\", 3000);</script>";
    exit(0);
}
else if (strlen($CourseNo_user) > 10)
{
    printPage("error-message", "Course number is too big. Please try again.");
    echo "<script>setTimeout(\"location.href = \'../register.html\';\", 3000);</script>";
    exit(0);
}
else if ($YearOfCourse_user >= 9 || $YearOfCourse_user < 1)
{
    printPage("error-message", "Year Of Course isn't between 1-10. Please try again.");
    echo "<script>setTimeout(\"location.href = \'../register.html\';\", 3000);</script>";
    exit(0);
}

$GradType_user = strtolower($GradType_user);
if ($GradType_user == 'undergraduate' || $GradType_user == 'under')
{
    $GradType_user = 'under';
}
else if ($GradType_user == 'postgraduate' || $GradType_user == 'post')
{
    $GradType_user = 'post';
}
else
{
    printPage("error-message", "Graduate type invalid. Please try again.");
    echo "<script>setTimeout(\"location.href = \'../register.html\';\", 3000);</script>";
    exit(0);
}

if (!strstr(strtolower($email_user), strtolower($StudentNo_user)))
{
    printPage("error-message", "Please use you Student Email. Please try again.");
    echo "<script>setTimeout(\"location.href = \'../register.html\';\", 3000);</script>";
    exit(0);
}

$sql = "INSERT INTO Student VALUES ('$StudentNo_user',
                                    '$StudentName_user',
                                    '$GradType_user',
                                    '$CourseNo_user',
                                    100,
                                    $YearOfCourse_user,
                                    '$email_user',
                                    '$password_user');";

$result = mysqli_query($db, $sql);
if (!$result)
{
    printPage("error-message", "User already exists. Please try again.");
    echo "<script>setTimeout(\"location.href = \'../register.html\';\", 3000);</script>";
    exit(0);
}
printPage("success-message", "You have been successfully registered.");
echo "<script>setTimeout(\"location.href = \'../index.html\';\", 3000);</script>";
?>
