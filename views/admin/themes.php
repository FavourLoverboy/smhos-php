<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <a href="add_theme">
                        <button type="button" class="btn btn-info ml-2">Add Theme</button>
                    </a>
                </div>
            </div>

            <div class="card-header">
                <h4 class="card-title">Themes</h4>
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
                            <th>Added By</th>
                            <th>Attendants</th>
                            <th>Date</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT theme.createdBy, theme.theme, theme.verse, theme.date, COUNT(attendance.user) AS attendance FROM theme INNER JOIN attendance ON theme.id = attendance.theme_id GROUP BY attendance.theme_id ORDER BY theme.id DESC";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        $tblquery = "SELECT last_name, first_name, other_name FROM member WHERE id = :id";
                                        $tblvalue = array(
                                            ':id' => $createdBy
                                        );
                                        $select2 = $connect->tbl_select($tblquery, $tblvalue);

                                        echo "
                                            <tr>
                                                <td>$last_name $first_name</td>
                                                <td>$email</td>
                                                <td>$sex</td>
                                                <td>$number</td>
                                                <td>$marital_status</td>
                                                <td class='text-right'>
                                                    <form method='post' action=''>
                                                        <input type='hidden' name='member_id' value='$id'>
                                                        <input type='submit' class='btn btn-success btn-sm' value='view'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='6'>There is no Theme</td>
                                        </tr>
                                    ";
                                }                              
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);
        $_SESSION['view_member_id'] = $member_id;
        echo "<script>  window.location='view_member' </script>";
    }
?>