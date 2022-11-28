<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="dashboard" class="simple-text logo-normal">
            <!-- SMHOS -->
            <div class="logo-image-big">
                <img src="../assets/logo.png">
            </div>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <?php
                if($_SESSION['level'] == 'A'){
                    include('level/admin.php');
                }else if($_SESSION['level'] == 'C'){
                    include('level/church.php');
                }else if($_SESSION['level'] == 'L'){
                    include('level/leader.php');
                }else{
                    include('level/member.php');
                }
            ?>      
        </ul>
    </div>
</div>