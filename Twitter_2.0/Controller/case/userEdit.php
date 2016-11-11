<?php
require '../Model/Database.php';
require '../Model/User.php';
$conn = Database::createConnection();
$user = User::loadUserbyId($conn, $_SESSION['id']);
?>


<h2>Poniżej możesz edytować swoje dane</h2>
<div>

    
    <form action='../Controller/changeUserData.php' method="POST">
        Imię:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder='<?php echo $user->getUserName(); ?>' name="name"><br><br>
        E-mail: <input type="text" placeholder='<?php echo $user->getEmail(); ?>' name="email">
        <br><br>Jeżeli chcesz zmienić hasło, wpisz poniżej nowe:<br>
        <input type="password"  name="pwd"><br><br>
        <input type="submit" value="Zmień">
        

    </form>
</div>


