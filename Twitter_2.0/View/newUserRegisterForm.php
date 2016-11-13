<?php
session_start();

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Tweeter - projekt</title>
        <meta charset="UTF-8">
        <script   src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="   crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="Stylesheet" type="text/css" href="../sources/css/bootstrap.css" />
    </head>
    <body>
        
        <form class="form-horizontal" action="../Controller/saveNewUser.php" method="POST">
            <div class="jumbotron center">
                <h1 style="text-align:left; margin-left: 10px;margin-right:20px; " >&nbsp&nbsp    Fajnie, że jesteś:) Zarejestruj się</h1>

            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Imię:</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="newName" placeholder="Wprowadź imię">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-4">
                    <input type="email" class="form-control" name="newEmail" placeholder="Wprowdadź email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Hasło:</label>
                <div class="col-sm-4"> 
                    <input type="password" class="form-control" name="newPwd" placeholder="Wprowadź hasło">
                </div>
            </div>

            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Rejestruję się</button>
                </div>
            </div>
        </form>



    </body>
</html>