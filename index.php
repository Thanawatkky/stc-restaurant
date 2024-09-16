<?php 
session_start();
if(!$_SESSION['sess_id']) {
    header("Location: login.php");
}
include 'api/function.php';
    $sql_user = update("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
    $fet_user = $sql_user->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STC Restaurent</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <?php 
        include 'navbar.php';
    ?>
    <div class="container">
        <?php 
            if(isset($_REQUEST['p'])) {
                include($_REQUEST['p'].'.php');
            }else{
                include 'dashboard.php';
            }
        ?>
    </div>
    <script src="js/function.js"></script>
</body>
</html>