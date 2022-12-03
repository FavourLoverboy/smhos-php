<?php

    // dashboard
    if($url[1] == 'dashboard'){
        $dashboard = 'active';
        $_SESSION['analyseStatus'] = false;
        echo "<title>Dashboard | $_SESSION[page_title]</title>";
    }

    // changechurch
    else if($url[1] == 'changechurch'){
        $changechurch = 'active';
        echo "<title>Change Church | $_SESSION[page_title]</title>";
    }

    // changehomecell
    else if($url[1] == 'changehomecell'){
        $changehomecell = 'active';
        echo "<title>Change Homecell | $_SESSION[page_title]</title>";
    }

    // complains
    else if($url[1] == 'complain'){
        $complain = 'active';
        echo "<title>Complain | $_SESSION[page_title]</title>";
    }

    // followship
    else if($url[1] == 'followship'){
        $followship = 'active';
        echo "<title>Followships | $_SESSION[page_title]</title>";
    }

    // prayers
    else if($url[1] == 'prayers'){
        $prayers = 'active';
        echo "<title>Prayers | $_SESSION[page_title]</title>";
    }
    else if($url[1] == 'view_prayer'){
        $prayers = 'active';
        echo "<title>View Prayer | $_SESSION[page_title]</title>";
    }

    // send_testimony
    else if($url[1] == 'send_testimony'){
        $send_testimony = 'active';
        echo "<title>Send Testimony | $_SESSION[page_title]</title>";
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