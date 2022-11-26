<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="javascript:;">HomeCell Portal</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn-magnify" href="javascript:;">
                        <!-- <i class="nc-icon nc-layout-11"></i> -->
                        <p>
                            <span class="d-lg-none d-md-block">Stats</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                        <p>
                            <span class="d-lg-none d-md-block">Some Actions</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="profile">My Profile</a>
                        <a class="dropdown-item" href="photo">Profile Picture</a>
                        <a class="dropdown-item" href="change_password">Change Password</a>
                        <a class="dropdown-item" href="/smhos-php/logout">Logout</a>
                    </div>
                </li>
                <li class="nav-item">
                    <img src="../uploads/<?php echo $_SESSION['profile']; ?>" alt="Circle Image" width="25px" height="25px" class="avatar border-gray" style="border-radius: 50%;margin-top: 15px;">
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-rotate" href="javascript:;">
                        <!-- <i class="nc-icon nc-settings-gear-65"></i> -->
                        <!-- <p>
                            <span class="d-lg-none d-md-block">Account</span>
                        </p> -->
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->