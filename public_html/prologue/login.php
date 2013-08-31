<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();

    $username = $_POST['username'];
    $passwort = $_POST['password'];

    $hostname = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);

    // Benutzername und Passwort werden überprüft
    if ($username == 'user' && $passwort == 'pass') {
        $_SESSION['angemeldet'] = true;

        // Weiterleitung zur geschützten Startseite
        if ($_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1') {
            if (php_sapi_name() == 'cgi') {
                header('Status: 303 See Other');
            } else {
                header('HTTP/1.1 303 See Other');
            }
        }

        header('Location: http://' . $hostname . ($path == '/' ? '' : $path) . '/index.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Yelerol.de Login</title>
        <link rel="stylesheet" href="./css/login-normalize.css">
        <link rel="stylesheet" href="./css/login-style.css">
        <link rel="shortcut icon" href="favicon.ico">
    </head>
    <body>
        <section class="loginform cf">
            <form action="login.php" method="post" accept-charset="utf-8">
                <ul>  
                    <li>
                        <label for="username">Benutzer:</label>
                        <input type="text" name="username" id="username" value="" placeholder="benutzer" required/>
                    </li>
                    <li>
                        <label for="password">Passwort:</label>
                        <input type="password" name="password" id="password" value="" placeholder="passwort" required/>
                    </li>
                    <li>
                        <input type="submit" value="Sign in"/>
                    </li>
                    
                    <li>
                        <label><br />&copy; 2013 Yelerol. All rights reserved. | Image: <a href="http://subtlepatterns.com/dark-denim-2/">Subtle Patterns</a></label>
                    </li>
                </ul>
            </form>
        </section>
    </body>
</html>