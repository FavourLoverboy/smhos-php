<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Testimonies</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Date</th>
                            <th>Name</th>
                            <th>picture</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Sex</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT members.last_name, members.first_name, members.other_name, members.email, members.number, members.sex, members.profile, testimonies.date FROM members INNER JOIN testimonies ON members.id = testimonies.user ORDER BY testimonies.id DESC";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <tr>
                                                <td>$date</td>
                                                <td>$last_name $first_name</td>
                                                <td>
                                                    <div class='avatar'>
                                                        <img src='../uploads/$profile' alt='Circle Image' class='avatar border-gray'>
                                                    </div>
                                                </td>
                                                <td>$email</td>
                                                <td>$number</td>
                                                <td>$sex</td>
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
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);
        $_SESSION['view_member_id'] = $member_id;
        echo "<script>  window.location='view_member' </script>";
    }
?>