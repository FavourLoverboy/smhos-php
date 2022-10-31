<?php
    session_start();
    if(!$_SESSION['username']){
        header('location: login');
    }
?>

<?php include('includes/main/header.php'); ?>
    <?php include($page); ?>
<?php include ('includes/main/footer.php'); ?>