<?php

    // dashboard
    if($url[1] == 'dashboard'){
        $dashboard = 'active';
        $_SESSION['analyseStatus'] = false;
        echo "<title>Dashboard | $_SESSION[page_title]</title>";
    }

    // all attendance / attendance
    else if($url[1] == 'all_followship'){
        $all_followship = 'active';
        echo "<title>All Followship | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_theme_details'){
        $all_followship = 'active';
        echo "<title>View Attendance Details | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'absent'){
        $all_followship = 'active';
        echo "<title>View Absent Details | $_SESSION[page_title]</title>";
    }

    // complains
    else if($url[1] == 'complain'){
        $complain = 'active';
        echo "<title>Complain | $_SESSION[page_title]</title>";
    }

    // homecells
    else if($url[1] == 'homecell_materials'){
        $homecell_materials = 'active';
        echo "<title>Homecell Materials | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_homecell_material'){
        $homecell_materials = 'active';
        echo "<title>View Homecell Material | $_SESSION[page_title]</title>";
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

    // members
    else if($url[1] == 'members_attendance'){
        $members_attendance = 'active';
        echo "<title>Member Attendance | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_member_attendance'){
        $members_attendance = 'active';
        echo "<title>View Member Attendance | $_SESSION[page_title]</title>";
    }

    // join_request
    else if($url[1] == 'join_request'){
        $join_request = 'active';
        echo "<title>Member Request | $_SESSION[page_title]</title>";
    }

    // sign in
    else if($url[1] == 'attendance'){
        $attendance = 'active';
        echo "<title>Sign In | $_SESSION[page_title]</title>";
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