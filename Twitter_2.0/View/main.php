<?php
session_start();

if ($_SESSION['logIn'] == false) {
    ob_start();
    header('location:../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Twerker - projekt</title>
        <link href="../sources/css/bootstrap.min.css" rel="stylesheet">
        <link href="../sources/css/simple-sidebar.css" rel="stylesheet">
    </head>

    <body>

        <div id="wrapper">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <a class="glyphicon glyphicon-log-out" href="logout.php">Wyloguj</a>
                    <li class="sidebar-brand">
                        <a href="#">
                            Witaj  <?php echo $_SESSION['name']; ?>                        
                        </a>
                    </li>
                    <li>
                        <a href="?page=mainTable">Tablica</a>
                    </li>
                    <li>
                        <a href="?page=otherUsers">Użytkownicy</a>
                    </li>
                    <li>
                        <a href="?page=messages">Wiadomości</a>
                    </li>
                    <li>
                        <a href="?page=userEdit">Edytuj swoje konto</a>
                    </li>

                </ul>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                <form role="form" action="../Controller/newTweet.php" method='POST'>
                    <div class="form-group">
                        <p style="color:#999999;text-align: center;">Napisz, nowy Tweerk:</p>
                        <textarea class="form-control" name="newTweet"rows="5" required maxlength="140"></textarea>
                    </div>
                    <button type="submit" class="form-group-sm">Tweerknij;-)</button>
                </form>

            </div>


            <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <?php include '../Controller/sideBar.php' ?>


    </body>

</html>