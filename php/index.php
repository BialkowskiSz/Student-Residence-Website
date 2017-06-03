<?php
function printPage($cookies)
{
    echo "<!DOCTYPE HTML>
<html>
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <link href=\"../css/index.css\" rel=\"stylesheet\" type=\"text/css\">
  <link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"../images/favicon.png\" />
  <title>Student Residence</title>
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js\"></script>
  <script>
        $(document).ready(function(){
            $(\"#cookiesClose\").click(function(){
                $(\"div#cookiesBar\").slideUp();
            });
        });
  </script>
</head>
<body>
  <header>
    <div id=\"cookiesBar\"
         style = \"display: $cookies;\">
        <a id=\"cookiesBarSub\">
          Student Residence uses cookies.
          By continuing to browse this site
          you are agreeing to our use of cookies.
        </a>
            <img id=\"cookiesClose\"
            src=\"../images/x.png\"
            alt=\"Close cookies notification\"
            style=\"height:25px;
                   position: relative;
                   top: 8px;
                   left: 20px;\">
            </img>
    </div>
    <div style=\"margin-top: 20px;\">
      <a href=\"index.php\">
        <img id=\"mainLogo\"
        src=\"../images/logo.png\"
        alt=\"Main Logo\">
        </img>
      </a>
        <nav>
            <ul>
                <li>
                  <div id=\"mainMenuBox\">
                    <a href=\"../login.html\">Login</a>
                  </div>
                </li>
                <li>
                  <div id=\"mainMenuBox\">
                    <a href=\"../register.html\">Register</a>
                  </div>
                </li>
                <li>
                  <div id=\"mainMenuBox\">
                    <a href=\"#\">Database &#9662;</a>
                    <ul class=\"dropdown\">
                        <li style=\"box-shadow: none;\">
                          <a href=\"viewDatabase.php\">View contents</a>
                        </li>
                        <li>
                          <a href=\"editDatabase.php\">
                            Edit content
                          </a>
                        </li>
                        <li>
                          <a href=\"deleteDatabase.php\">
                            Delete content
                          </a>
                        </li>
                    </ul>
                  </div>
                </li>
            </ul>
        </nav>
    </div>
  </header>

  <div class=\"firstStudent\">
    <img
    src=\"../images/student1.jpg\"
    alt=\"Happy Student 1\">
    </img>
  </div>
  <div class=\"firstStudentRight\">
    <div class=\"firstStudentRightText\">
      <a>
        I wanted to thank Student Residence for this amazing year.
        The apartment was nice, and most of my
        flatmates through the year became great friends
        ! My Dublin experience would have been very
         different without you.
       </a>
     </div>
       <a style=\"font-family: Edwardian Script ITC;
       font-size: 50px;
       line-height: 100px;\">
       -Rebecca Moris
       </a>
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
if (isset($_COOKIE['curr_Student_Residence']))
{
    printPage("none");
}
else
{
    setrawcookie("curr_Student_Residence", $_SERVER['REMOTE_ADDR'], time() + 60);
    printPage("block");
}

?>
