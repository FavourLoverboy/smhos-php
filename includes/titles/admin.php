<?php

    // dashboard
    if($url[1] == 'dashboard'){
        $dashboard = 'active';
        $_SESSION['analyseStatus'] = false;
        echo "<title>Dashboard | $_SESSION[page_title]</title>";
    }

    // attendance
    else if($url[1] == 'attendance'){
        $attendance = 'active';
        echo "<title>Attendance | $_SESSION[page_title]</title>";
    }
    // church attendance
    else if($url[1] == 'view_church_attendance'){
        $attendance = 'active';
        echo "<title>Church Attendance | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_church_attendance_details'){
        $attendance = 'active';
        echo "<title>Church Attendance Details | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'church_absent_record'){
        $attendance = 'active';
        echo "<title>Church Absent Details | $_SESSION[page_title]</title>";
    }
    // homecell attendance
    else if($url[1] == 'view_homecell_attendance'){
        $attendance = 'active';
        echo "<title>Homecell Attendance | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_homecell_attendance_details'){
        $attendance = 'active';
        echo "<title>Homecell Attendance Details | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'homecell_absent_record'){
        $attendance = 'active';
        echo "<title>Homecell Absent Details | $_SESSION[page_title]</title>";
    }
    // member attendance
    else if($url[1] == 'view_member_attendance'){
        $attendance = 'active';
        echo "<title>Member Attendance Record | $_SESSION[page_title]</title>";
    }

    // churches
    else if($url[1] == 'churches'){
        $churches = 'active';
        echo "<title>All Churches | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'add_church'){
        $churches = 'active';
        echo "<title>Add Church | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_church'){
        $churches = 'active';
        echo "<title>View Church | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'add_church_leader'){
        $churches = 'active';
        echo "<title>Add Church Leader | $_SESSION[page_title]</title>";
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

    // homecell materials
    else if($url[1] == 'homecell_materials'){
        $homecell_materials = 'active';
        echo "<title>Homecell Materials | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'add_homecell_material'){
        $homecell_materials = 'active';
        echo "<title>Add Homecell Materials | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_homecell_material'){
        $homecell_materials = 'active';
        echo "<title>View Homecell Materials | $_SESSION[page_title]</title>";
    }

    // leaders
    else if($url[1] == 'leaders'){
        $leaders = 'active';
        echo "<title>All Leaders | $_SESSION[page_title]</title>";
    }

    // members
    else if($url[1] == 'members'){
        $members = 'active';
        echo "<title>All Members | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'add_member'){
        $members = 'active';
        echo "<title>Add Members | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_member'){
        $members = 'active';
        echo "<title>View Members | $_SESSION[page_title]</title>";
    }

    // all_prayers
    else if($url[1] == 'all_prayers'){
        $all_prayers = 'active';
        echo "<title>All Prayers | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'prayers'){
        $all_prayers = 'active';
        echo "<title>Add Prayer | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_prayer'){
        $all_prayers = 'active';
        echo "<title>View Prayer | $_SESSION[page_title]</title>";
    }

    // testimonies
    else if($url[1] == 'testimonies'){
        $testimonies = 'active';
        echo "<title>Testimonies | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_testimony'){
        $testimonies = 'active';
        echo "<title>View Testimonies | $_SESSION[page_title]</title>";
    }

    // themes
    else if($url[1] == 'themes'){
        $themes = 'active';
        echo "<title>Themes | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'add_theme'){
        $themes = 'active';
        echo "<title>Add Theme | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_theme_details'){
        $themes = 'active';
        echo "<title>View Theme Attendance | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'absent'){
        $themes = 'active';
        echo "<title>View Theme Absent | $_SESSION[page_title]</title>";
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
    else if($url[1] == 'c_homecells'){
        $c_homecells = 'active';
        echo "<title>Church Homecell Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'c_members'){
        $c_members = 'active';
        echo "<title>Church Member Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'continent_church'){
        $continent_church = 'active';
        echo "<title>Continent Church Chart | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'continent'){
        $continent = 'active';
        echo "<title>Continent Member Chart | $_SESSION[page_title]</title>";
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