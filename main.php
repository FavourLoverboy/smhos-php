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
        include('includes/titles/admin.php');
        if($url[0] != $admin){
            header("location: /smhos-php/$admin/dashboard");
        }
    }elseif($_SESSION['level'] == 'C'){
        include('includes/titles/church.php');
        if($url[0] != $church){
            header("location: /smhos-php/$church/dashboard");
        }
    }elseif($_SESSION['level'] == 'L'){
        include('includes/titles/leader.php');
        if($url[0] != $leader){
            header("location: /smhos-php/$leader/dashboard");
        }
    }else{
        include('includes/titles/member.php');
        if($url[0] != $member){
            header("location: /smhos-php/$member/dashboard");
        }
    }
?>

<?php include('includes/main/header.php'); ?>
    <div class="wrapper">
        <?php include ('includes/navs/sidebar.php'); ?>
        <div class="main-panel">
            <?php include ('includes/navs/topbar.php'); ?>
            <div class="content">
                <?php include($page); ?>
            </div>
            <?php include ('includes/navs/bottombar.php'); ?>
        </div>
    </div>
<?php include ('includes/main/footer.php'); ?>
