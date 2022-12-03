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
            <li class='$all_followship'>
                <a href='all_followship'>
                    <i class='fa fa-bar-chart'></i>
                    <p>Attendance</p>
                </a>
            </li>
            <li class='$complain'>
                <a href='complain'>
                    <i class='fa fa-comments'></i>
                    <p>Complain</p>
                </a>
            </li>
            <li class='$homecell_materials'>
                <a href='homecell_materials'>
                    <i class='fa fa-calendar'></i>
                    <p>Homecell Materials</p>
                </a>
            </li>
            <li class='$members'>
                <a href='members'>
                    <i class='fa fa-users'></i>
                    <p>Members</p>
                </a>
            </li>
            <li class='$members_attendance'>
                <a href='members_attendance'>
                    <i class='fa fa-line-chart'></i>
                    <p>M. Attendance</p>
                </a>
            </li>
            <li class='$join_request'>
                <a href='join_request'>
                    <i class='fa fa-question-circle'></i>
                    <p>Member Request</p>
                </a>
            </li>
        ";
            
        if(date('l') == 'Tuesday'){
            echo "
                <li class='$attendance'>
                    <a href='attendance'>
                        <i class='fa fa-sign-in'></i>
                        <p>Sign In</p>
                    </a>
                </li>
            ";
        }
    }
?>