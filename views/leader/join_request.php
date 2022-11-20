<?php
    $_SESSION['Message'] = '';
    if($_POST['accept']){
        extract($_POST);

        $tblquery = "UPDATE changehomecell SET status = :status WHERE user = :id AND homecell = :homecell";
        $tblvalue = array(
            ':status' => '1',
            ':id' => $member_id,
            ':homecell' => $_SESSION['homecell_id']
        );
        $update = $connect->tbl_update($tblquery, $tblvalue);
        if($update){
            $_SESSION['Message'] = 'Request has been accepted';

            $tblquery = "UPDATE members SET homecell_id = :homecell_id WHERE id = :id";
            $tblvalue = array(
                ':homecell_id' => $_SESSION['homecell_id'],
                ':id' => $member_id
            );
            $update = $connect->tbl_update($tblquery, $tblvalue);
        }
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Members Request</h4>
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
                            <th>Name</th>
                            <th>Church</th>
                            <th>Email</th>
                            <th>Sex</th>
                            <th>Number</th>
                            <th>Marital Status</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT members.id, members.last_name, members.first_name, members.other_name, members.email, members.sex, members.number, members.marital_status, members.church_id FROM members INNER JOIN changehomecell ON members.id = changehomecell.user WHERE changehomecell.homecell = :h_id  AND changehomecell.status = :status";
                                $tblvalue = array(
                                    'h_id' => $_SESSION['homecell_id'],
                                    'status' => '0'
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);

                                        $tblquery = "SELECT name FROM churches WHERE id = :id";
                                        $tblvalue = array(
                                            'id' => $church_id
                                        );
                                        $selectChurch = $connect->tbl_select($tblquery, $tblvalue);
                                        foreach($selectChurch as $data){
                                            extract($data);

                                            echo "
                                                <tr>
                                                    <td>$last_name $first_name</td>
                                                    <td>$name</td>
                                                    <td>$email</td>
                                                    <td>$sex</td>
                                                    <td>$number</td>
                                                    <td>$marital_status</td>
                                                    <td class='text-right'>
                                                        <form method='post' action=''>
                                                            <input type='hidden' name='member_id' value='$id'>
                                                            <input type='submit' name='accept' class='btn btn-success btn-sm' value='accept'>
                                                        </form>
                                                    </td>
                                                </tr>
                                            ";
                                        }
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='6'>There is no new Request</td>
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