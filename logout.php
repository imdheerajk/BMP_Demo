
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION["usertype"]);
        unset($_SESSION["name"]);
        unset($_SESSION['login']);
        session_destroy();
//        echo "logout";
        header("Location:index.php ");
        ?>
    </body>
</html>

