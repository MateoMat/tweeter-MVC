<?php
include_once '../Model/User.php';
require_once '../Model/Database.php';

$conn = Database::createConnection();

$allUsers = User::loadAllUsers($conn);

?>

<h2>Zobacz innych użytkowników</h2>
<div class="tab-pane">
    <table class="table-striped" border="1" rules="all">
        <th style="text-align: center; width:200px;"><h4>Użytkownik</h4></th>
        <th style="text-align: center; width:200px;"><h4>E-mail</h4></th>
        

        <?php foreach ($allUsers as $arr) {
            ?><tr>
                <td><?php echo $arr->getUserName(); ?></td>
                <td style="text-align: center; width:200px;"><?php echo $arr->getEmail(); ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
