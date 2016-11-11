<?php
session_start();

if ($_SESSION['logIn'] == false) {
    ob_start();
    header('location:../../index.php');
}
require_once '../Model/Tweet.php';
require_once '../Model/Database.php';
$conn = Database::createConnection();

$allTweets = Tweet::loadAllTweets($conn); //Tweet();

echo '<br>';
?>
<h2>Tablica Tweerków</h2>
<div class="tab-pane">
    <table class="table-striped" border="1" rules="all">
        <th style="text-align: center;"><h4>Użytkownik</h4></th>
        <th style="text-align: center;"><h4>Tweerk</h4></th>
        <th style="text-align: center;"><h4>Data</h4></th>
        
        <?php foreach ($allTweets as $arr) {
            ?><tr>
                <td><?php echo $arr->getUserName(); ?></td>
                <td><?php echo $arr->getMessage(); ?></td>
                <td><?php echo $arr->getCreationDate(); ?></td>
            </tr>
            <?php } ?>
    </table>
</div>