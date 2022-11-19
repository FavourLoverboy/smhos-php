<?php
    $_SESSION['Message'] = '';
    if($_POST['view_theme']){
        extract($_POST);
        $_SESSION['view_theme_id'] = $theme_id;
        echo "<script>  window.location='view_theme_details' </script>";
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Followships</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Theme</th>
                            <th>Verse</th>
                            <th>Homecell</th>
                            <th>Date</th>
                            <th>Attendance</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT theme.id AS theme_id, theme.theme, theme.verse, theme.date, attendance.h_id FROM theme INNER JOIN attendance ON theme.id = attendance.theme_id WHERE attendance.user = :id GROUP BY attendance.theme_id";
                                $tblvalue = array(
                                    ':id' => $_SESSION['myId']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);

                                    $tblquery = "SELECT name FROM homecells WHERE id = :homecell_id";
                                    $tblvalue = array(
                                        ':homecell_id' => $h_id                                    
                                    );
                                    $select12 = $connect->tbl_select($tblquery, $tblvalue);
                                    if($select12){
                                        foreach($select12 as $data){
                                            extract($data);
                                            echo "
                                                <tr>
                                                    <td>$theme</td>
                                                    <td>$verse</td>
                                                    <td>$name</td>
                                                    <td>$date</td>
                                                    <td class='btn btn-success btn-sm'>attended</td>
                                                </tr>
                                            ";
                                        }
                                    }else{
                                        echo "
                                            <tr>
                                                <td>$theme</td>
                                                <td>$verse</td>
                                                <td>no homecell</td>
                                                <td>$date</td>
                                                <td class='btn btn-danger btn-sm'>absent</td>
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