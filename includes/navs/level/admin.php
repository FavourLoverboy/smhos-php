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
            <li class='$c_homecells'>
                <a href='c_homecells'>
                    <i class='fa fa-home'></i>
                    <p>C. Homecells</p>
                </a>
            </li>
            <li class='$c_members'>
                <a href='c_members'>
                    <i class='fa fa-users'></i>
                    <p>C. Members</p>
                </a>
            </li>
            <li class='$continent_church'>
                <a href='continent_church'>
                    <i class='fa fa-university'></i>
                    <p>Continent .C</p>
                </a>
            </li>
            <li class='$continent'>
                <a href='continent'>
                    <i class='fa fa-globe'></i>
                    <p>Continent .M</p>
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
            <li>
                <a href='attendance_chart'>
                    <i class='fa fa-pie-chart'></i>
                    <p>Analyse</p>
                </a>
            </li>
            <li class='$attendance'>
                <a href='attendance'>
                    <i class='fa fa-bar-chart'></i>
                    <p>Attendance</p>
                </a>
            </li>
            <li class='$churches'>
                <a href='churches'>
                    <i class='fa fa-university'></i>
                    <p>Churches</p>
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
            <li class='$homecell_materials'>
                <a href='homecell_materials'>
                    <i class='fa fa-calendar'></i>
                    <p>Homecell Materials</p>
                </a>
            </li>
            <li class='$leaders'>
                <a href='leaders'>
                    <i class='fa fa-bolt'></i>
                    <p>Leaders</p>
                </a>
            </li>
            <li class='$members'>
                <a href='members'>
                    <i class='fa fa-users'></i>
                    <p>Members</p>
                </a>
            </li>
            <li class='$all_prayers'>
                <a href='all_prayers'>
                    <i class='fa fa-bullhorn'></i>
                    <p>Prayers</p>
                </a>
            </li>
            <li class='$testimonies'>
                <a href='testimonies'>
                    <i class='fa fa-smile-o'></i>
                    <p>Testimonies</p>
                </a>
            </li>
            <li class='$themes'>
                <a href='themes'>
                    <i class='fa fa-book'></i>
                    <p>Homecell Themes</p>
                </a>
            </li>
        ";
    }

?>