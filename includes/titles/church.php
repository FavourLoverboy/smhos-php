<?php

    // dashboard
    if($url[1] == 'dashboard'){
        $dashboard = 'active';
        $_SESSION['analyseStatus'] = false;
        echo "<title>Dashboard | $_SESSION[page_title]</title>";
    }

    // all attendance
    else if($url[1] == 'all_attendance'){
        $all_attendance = 'active';
        echo "<title>All Attendance | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_homecell_attendance'){
        $all_attendance = 'active';
        echo "<title>Homecell Attendance | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_homecell_attendance_details'){
        $all_attendance = 'active';
        echo "<title>Homecell Attendance Detiils | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'homecell_absent_record'){
        $all_attendance = 'active';
        echo "<title>Homecell Absent Detiils | $_SESSION[page_title]</title>";
    }
    // member attendance
    else if($url[1] == 'view_member_attendance'){
        $all_attendance = 'active';
        echo "<title>Homecell Member Attendance | $_SESSION[page_title]</title>";
    }

    // attendance
    else if($url[1] == 'attendance'){
        $attendance = 'active';
        echo "<title>Attendance | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_theme_details'){
        $attendance = 'active';
        echo "<title>View Attendance Details | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'absent'){
        $attendance = 'active';
        echo "<title>View Absent Details | $_SESSION[page_title]</title>";
    }

    // complains
    else if($url[1] == 'complains'){
        $complains = 'active';
        echo "<title>Complains | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_complains'){
        $complains = 'active';
        echo "<title>View Complains | $_SESSION[page_title]</title>";
    }

    // homecells
    else if($url[1] == 'homecells'){
        $homecells = 'active';
        echo "<title>Homecells | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'add_homecell'){
        $homecells = 'active';
        echo "<title>Add Homecell | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_homecell'){
        $homecells = 'active';
        echo "<title>View Homecell | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'add_homecell_leader'){
        $homecells = 'active';
        echo "<title>Add Homecell Leader | $_SESSION[page_title]</title>";
    }

    // members
    else if($url[1] == 'members'){
        $members = 'active';
        echo "<title>Members | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'add_member'){
        $members = 'active';
        echo "<title>Add Members | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_member'){
        $members = 'active';
        echo "<title>View Members | $_SESSION[page_title]</title>";
    }


    // Chart
    else if($url[1] == 'attendance_chart'){
        $attendance_chart = 'active';
        $_SESSION['analyseStatus'] = true;
        echo "<title>Attendance Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'baptise'){
        $baptise = 'active';
        echo "<title>Baptise Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'h_members'){
        $h_members = 'active';
        echo "<title>Homecell Member Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'login'){
        $login = 'active';
        echo "<title>Member Login Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'maritalStatus'){
        $maritalStatus = 'active';
        echo "<title>Marital Status Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'sex'){
        $sex = 'active';
        echo "<title>Member Sex Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'sex_age'){
        $sex_age = 'active';
        echo "<title>Member Sex Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'month'){
        $month = 'active';
        echo "<title>Member Birth Month Chart | $_SESSION[page_title]</title>";
    }


    // Dropdown
    else if($url[1] == 'profile'){
        echo "<title>My Profile | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'update_profile'){
        echo "<title>Update Profile | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'photo'){
        echo "<title>Profile Picture | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'change_password'){
        echo "<title>Change Password | $_SESSION[page_title]</title>";
    }

?>