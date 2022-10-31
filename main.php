<?php
    session_start();
    if(!$_SESSION['u_name']){
        header('location: login.php');
    }
?>

<?php include('includes/header.php'); ?>
    <?php include ('includes/topbar.php'); ?>
    <?php include($page); ?>
    <?php include ('includes/bottombar.php'); ?>
<?php include ('includes/footer.php'); ?>