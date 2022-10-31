<?php
    session_start();
    if(!$_SESSION['myId']){
        header('location: /smhos-php/login.php');
    }
?>

<?php include('includes/main/header.php'); ?>
    <?php include($page); ?>
<?php include ('includes/main/footer.php'); ?>