<?php
session_start();
if (isset($_SESSION['error'])) {
    if ($_SESSION['error'] == true) {
        $error = "Nieprawidłowy login lub hasło";
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Tweeter projekt</title>
        <meta charset="UTF-8">
        <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="Stylesheet" type="text/css" href="../sources/css/bootstrap.css" />
    </head>
    <body>

        <form class="form-horizontal" action="../Controller/loginVerification.php" method="POST">
            <div class="jumbotron center">
                <h1 style="text-align:left; margin-left: 10px;margin-right:20px; " >&nbsp&nbsp    Witaj w projekcie Tweerker</h1>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="email" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-4"> 
                    <input type="password" class="form-control" name="pwd" placeholder="Enter password">
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Log</button>
                    <a href="newUserRegisterForm.php" class="btn btn-info">Kliknij,aby utworzyć nowe konto</a>
                    <?php echo $error; ?>
                </div>
            </div>
        </form>





    </body>
</html>