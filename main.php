<?php
    session_start();
    if(!$_SESSION['myId']){
        header('location: /smhos-php/');
    }

    $admin = 'admin';
    $church = 'church';
    $leader = 'leader';
    $member = 'member';

    if($_SESSION['level'] == 'A'){
        if($url[0] != $admin){
            header("location: /smhos-php/$admin/dashboard");
        }
    }elseif($_SESSION['level'] == 'C'){
        if($url[0] != $church){
            header("location: /smhos-php/$church/dashboard");
        }
    }elseif($_SESSION['level'] == 'L'){
        if($url[0] != $leader){
            header("location: /smhos-php/$leader/dashboard");
        }
    }else{
        if($url[0] != $member){
            header("location: /smhos-php/$member/dashboard");
        }
    }


?>

<?php include('includes/main/header.php'); ?>
    <?php include($page); ?>
<?php include ('includes/main/footer.php'); ?>