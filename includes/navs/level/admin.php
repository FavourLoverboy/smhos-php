<?php

    if($_SESSION['analyseStatus']){
        echo "
            <li>
                <a href='dashboard'>
                    <i class='fa fa-backward'></i>
                    <p>Back</p>
                </a>
            </li>
            <li>
                <a href='attendance_chart'>
                    <i class='fa fa-book'></i>
                    <p>H. Attendance</p>
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
        ";
    }else{
        echo "
            <li class='active'>
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
                <a href='attendance'>
                    <i class='fa fa-bar-chart'></i>
                    <p>Attendance</p>
                </a>
            </li>
            <li>
                <a href='churches'>
                    <i class='fa fa-university'></i>
                    <p>Churches</p>
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
                <a href='homecell_materials'>
                    <i class='fa fa-calendar'></i>
                    <p>Homecell Materials</p>
                </a>
            </li>
            <li>
                <a href='leaders'>
                    <i class='fa fa-bolt'></i>
                    <p>Leaders</p>
                </a>
            </li>
            <li>
                <a href='members'>
                    <i class='fa fa-users'></i>
                    <p>Members</p>
                </a>
            </li>
            <li>
                <a href='all_prayers'>
                    <i class='fa fa-bullhorn'></i>
                    <p>Prayers</p>
                </a>
            </li>
            <li>
                <a href='testimonies'>
                    <i class='fa fa-smile-o'></i>
                    <p>Testimonies</p>
                </a>
            </li>
            <li>
                <a href='themes'>
                    <i class='fa fa-book'></i>
                    <p>Homecell Themes</p>
                </a>
            </li>
        ";
    }

?>