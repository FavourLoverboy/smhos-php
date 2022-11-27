<?php
    if($_POST['view_theme']){
        extract($_POST);
        $_SESSION['view_theme_id'] = $theme_id;
        echo "<script>  window.location='view_church_attendance_details' </script>";
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?php echo $_SESSION['view_church_att_name'] . ' Attendance'; ?></h4>
                <?php 
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: green;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                
                ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Theme</th>
                            <th>Verse</th>
                            <th>Attendants</th>
                            <th>Absenties</th>
                            <th>Members</th>
                            <th>Date</th>
                            <th>View</th>
                        </thead>
                        <tbody>
                            <?php
                                $tblquery = "SELECT theme.id AS theme_id, theme.theme, theme.verse, theme.date, COUNT(attendance.user) AS members FROM theme INNER JOIN attendance ON theme.id = attendance.theme_id WHERE attendance.c_id = :church_id GROUP BY attendance.theme_id";
                                $tblvalue = array(
                                    ':church_id' => $_SESSION['view_church_att_id'] 
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);

                                    $tblquery = "SELECT COUNT(h_id) AS attendance FROM attendance WHERE theme_id = :theme_id AND h_id != '' AND attendance.c_id = :church_id";
                                    $tblvalue = array(
                                        ':theme_id' => $theme_id,
                                        ':church_id' => $_SESSION['view_church_att_id']
                                    );
                                    $select12 = $connect->tbl_select($tblquery, $tblvalue);
                                    foreach($select12 as $data){
                                        extract($data);
                                        $absent = $members - $attendance;
                                        echo "
                                            <tr>
                                                <td>$theme</td>
                                                <td>$verse</td>
                                                <td>$attendance</td>
                                                <td>$absent</td>
                                                <td>$members</td>
                                                <td>$date</td>
                                                <td class='text-right'>
                                                    <form method='post' action=''>
                                                        <input type='hidden' name='theme_id' value='$theme_id'>
                                                        <input type='submit' name='view_theme' class='btn btn-success btn-sm' value='view'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>