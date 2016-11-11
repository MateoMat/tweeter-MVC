<?php
if ($_SESSION['logIn'] == false) {
    ob_start();
    header('location:../index.php');
}
?>
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><-- Menu --></a>

                <?php
                switch ($_GET['page']) {
                    case "mainTable":
                        include 'case/mainTable.php';
                        break;
                    case "otherUsers":
                        include 'case/otherUsers.php';
                        break;
                    case "messages":
                        include 'case/messages.php';
                        break;
                    case "userEdit":
                        include 'case/userEdit.php';
                        break;
                    default :
                        include 'case/mainTable.php';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!--/#page-content-wrapper -->
</div>
<!--/#wrapper -->
<!--jQuery -->
<script src = "../sources/js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../sources/js/bootstrap.min.js"></script>
<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>