<?php
    if($_SESSION['analyseStatus']){
        echo "
            <li>
                <a href='dashboard'>
                    <i class='fa fa-dashboard'></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class='$baptise'>
                <a href='baptise'>
                    <i class='fa fa-tint'></i>
                    <p>Baptise</p>
                </a>
            </li>
            <li class='$attendance_chart'>
                <a href='attendance_chart'>
                    <i class='fa fa-book'></i>
                    <p>H. Attendance</p>
                </a>
            </li>
            <li class='$h_members'>
                <a href='h_members'>
                    <i class='fa fa-users'></i>
                    <p>H. Members</p>
                </a>
            </li>
            <li class='$login'>
                <a href='login'>
                    <i class='fa fa-sign-in'></i>
                    <p>Login</p>
                </a>
            </li>
            <li class='$maritalStatus'>
                <a href='maritalStatus'>
                    <i class='fa fa-heart'></i>
                    <p>Marital Status</p>
                </a>
            </li>
            <li class='$sex'>
                <a href='sex'>
                    <i class='fa fa-life-ring'></i>
                    <p>Sex</p>
                </a>
            </li>
            <li class='$sex_age'>
                <a href='sex_age'>
                    <i class='fa fa-list-ol'></i>
                    <p>S. Age</p>
                </a>
            </li>
            <li class='$month'>
                <a href='month'>
                    <i class='fa fa-calendar'></i>
                    <p>Month</p>
                </a>
            </li>
        ";
    }else{
        echo "
            <li class='$dashboard'>
                <a href='dashboard'>
                    <i class='fa fa-dashboard'></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class='$'>
                <a href='attendance_chart'>
                    <i class='fa fa-pie-chart'></i>
                    <p>Analyse</p>
                </a>
            </li>
            <li class='$all_attendance'>
                <a href='all_attendance'>
                    <i class='fa fa-line-chart'></i>
                    <p>All Attendance</p>
                </a>
            </li>
            <li class='$attendance'>
                <a href='attendance'>
                    <i class='fa fa-bar-chart'></i>
                    <p>Attendance</p>
                </a>
            </li>
            <li class='$complains'>
                <a href='complains'>
                    <i class='fa fa-comments'></i>
                    <p>Complains</p>
                </a>
            </li>
            <li class='$homecells'>
                <a href='homecells'>
                    <i class='fa fa-home'></i>
                    <p>Homecells</p>
                </a>
            </li>
            <li class='$members'>
                <a href='members'>
                    <i class='fa fa-users'></i>
                    <p>Members</p>
                </a>
            </li>
        ";
    }
?>