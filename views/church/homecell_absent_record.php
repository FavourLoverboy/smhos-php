<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <a href="view_homecell_attendance_details">
                        <button type="button" class="btn btn-info ml-2">Attendance</button>
                    </a>
                </div>
            </div>
            <div class="card-header">
                <h4 class="card-title">
                    <?php
                    
                        $tblquery = "SELECT * FROM theme WHERE id = :id";
                        $tblvalue = array(
                            ':id' => $_SESSION['view_theme_id']
                        );
                        $select = $connect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            echo 'Theme: "' . $theme . '" Absenties';
                        }
                    
                    ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Member</th>
                            <th>Church</th>
                            <th>Time</th>
                        </thead>
                        <tbody>
                            <?php
                                $tblquery = "SELECT members.last_name, members.first_name, members.other_name, members.homecell_id, attendance.c_id, attendance.date FROM members INNER JOIN attendance ON members.id = attendance.user WHERE attendance.h_id = '' AND attendance.theme_id = :theme_id AND members.homecell_id = :homecell_id ORDER BY attendance.id";
                                $tblvalue = array(
                                    ':theme_id' => $_SESSION['view_theme_id'],
                                    ':homecell_id' => $_SESSION['view_homecell_att_id']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        $time = substr($date, 11, 18);;

                                        $tblquery = "SELECT name FROM churches WHERE id = :church";
                                        $tblvalue = array(
                                            ':church' => $c_id
                                        );
                                        $selectChurch = $connect->tbl_select($tblquery, $tblvalue);
                                        foreach($selectChurch as $data){
                                            extract($data);
                                            $_SESSION['church_name'] = $name;

                                            echo "
                                                <tr>
                                                    <td>$last_name $first_name $other_name</td>
                                                    <td>$_SESSION[church_name]</td>
                                                    <td>$time</td>
                                                </tr>
                                            ";
                                        }
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