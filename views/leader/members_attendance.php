<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Members</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Number</th>
                            <th>Marital Status</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT * FROM members WHERE homecell_id = :h_id ORDER BY last_name";
                                $tblvalue = array(
                                    'h_id' => $_SESSION['homecell_id']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <tr>
                                                <td>$last_name $first_name $other_name</td>
                                                <td>$email</td>
                                                <td>$sex</td>
                                                <td>$number</td>
                                                <td>$marital_status</td>
                                                <td class='text-right'>
                                                    <form method='post' action=''>
                                                        <input type='hidden' name='member_id' value='$id'>
                                                        <input type='hidden' name='member_name' value='$last_name $first_name $other_name'>
                                                        <input type='submit' name='view_member' class='btn btn-primary' value='view'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='6'>There is no Member</td>
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
    if($_POST['view_member']){
        extract($_POST);
        $_SESSION['view_member_att_id'] = $member_id;
        $_SESSION['view_member_att_name'] = $member_name;
        echo "<script>  window.location='view_member_attendance' </script>";
    }
?>