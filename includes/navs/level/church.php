<?php
    if($_SESSION['analyseStatus']){
        echo "
            <li>
                <a href='dashboard'>
                    <i class='fa fa-dashboard'></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href='baptise'>
                    <i class='fa fa-tint'></i>
                    <p>Baptise</p>
                </a>
            </li>
            <li>
                <a href='attendance_chart'>
                    <i class='fa fa-book'></i>
                    <p>H. Attendance</p>
                </a>
            </li>
            <li>
                <a href='h_members'>
                    <i class='fa fa-users'></i>
                    <p>H. Members</p>
                </a>
            </li>
            <li>
                <a href='login'>
                    <i class='fa fa-sign-in'></i>
                    <p>Login</p>
                </a>
            </li>
            <li>
                <a href='maritalStatus'>
                    <i class='fa fa-heart'></i>
                    <p>Marital Status</p>
                </a>
            </li>
            <li>
                <a href='sex'>
                    <i class='fa fa-life-ring'></i>
                    <p>Sex</p>
                </a>
            </li>
            <li>
                <a href='sex_age'>
                    <i class='fa fa-list-ol'></i>
                    <p>S. Age</p>
                </a>
            </li>
            <li>
                <a href='month'>
                    <i class='fa fa-calendar'></i>
                    <p>Month</p>
                </a>
            </li>
        ";
    }else{
        echo "
            <li class='active '>
                <a href='dashboard'>
                    <i class='fa fa-dashboard'></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href='attendance_chart'>
                    <i class='fa fa-pie-chart'></i>
                    <p>Analyse</p>
                </a>
            </li>
            <li>
                <a href='all_attendance'>
                    <i class='fa fa-line-chart'></i>
                    <p>All Attendance</p>
                </a>
            </li>
            <li>
                <a href='attendance'>
                    <i class='fa fa-bar-chart'></i>
                    <p>Attendance</p>
                </a>
            </li>
            <li>
                <a href='complains'>
                    <i class='fa fa-comments'></i>
                    <p>Complains</p>
                </a>
            </li>
            <li>
                <a href='homecells'>
                    <i class='fa fa-home'></i>
                    <p>Homecells</p>
                </a>
            </li>
            <li>
                <a href='members'>
                    <i class='fa fa-users'></i>
                    <p>Members</p>
                </a>
            </li>
        ";
    }
?>