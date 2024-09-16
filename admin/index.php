<?php 
    session_start();
    if(!$_SESSION['sess_id'] || $_SESSION['sess_id'] != session_id()) {
        header("Location: ../login.php");
    }
    include '../api/function.php';
    $sql_user = update("SELECT * FROM tb_user WHERE user_id='".$_SESSION['user_id']."' ");
    $fet_user = $sql_user->fetch_object();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STC</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<?php 
             include 'navbar.php';
        ?>
        <main class="grid-layout">
    <?php 
       
        include 'sidebar.php';
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
</main>
    <?php
        include 'footer.php';
    ?>
    <script src="../js/function.js"></script>
</body>
</html>