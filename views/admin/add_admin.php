<?php
    // Add
    $_SESSION['Message'] = '';
    if($_POST['add']){
        extract($_POST);
        $erremail = $email;
        
        $tblquery = "SELECT * FROM members WHERE email = :email";
        $tblvalue = array(
            ':email' => htmlspecialchars($email)
        );
        $select = $connect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                $_SESSION['user_idid'] = $id;
                $tblquery = "SELECT * FROM tbl_leaders WHERE user_id = :user_id AND type = :type AND status = :status";
                $tblvalue = array(
                    ':user_id' =>  $_SESSION['user_idid'],
                    ':type' => 'H',
                    ':status' => '1'
                );
                $select1 = $connect->tbl_select($tblquery, $tblvalue);
                if(!$select1){

                    $tblquery = "SELECT * FROM tbl_leaders WHERE user_id = :user_id AND type = :type AND status = :status";
                    $tblvalue = array(
                        ':user_id' =>  $_SESSION['user_idid'],
                        ':type' => 'C',
                        ':status' => '1'
                    );
                    $select120 = $connect->tbl_select($tblquery, $tblvalue);
                    if(!$select120){
                        $tblquery = "SELECT * FROM tbl_leaders WHERE user_id = :user_id AND type = :type AND status = :status";
                        $tblvalue = array(
                            ':user_id' =>  $_SESSION['user_idid'],
                            ':type' => 'A',
                            ':status' => '1'
                        );
                        $select130 = $connect->tbl_select($tblquery, $tblvalue);
                        if(!$select130){
                            $tblquery1 = "INSERT INTO tbl_leaders VALUES(:id, :assignBy, :user_id, :lead_id, :type, :reason, :date, :status)";
                            $tblvalue1 = array(
                                ':id' =>  NULL,
                                ':assignBy' =>  $_SESSION['myId'],
                                ':user_id' =>  $_SESSION['user_idid'],
                                ':lead_id' => '0',
                                ':type' => 'A',
                                ':reason' => '',
                                ':date' => date("Y-m-d h:i"),
                                ':status' => '1'
                            );
                            $insert = $connect->tbl_insert($tblquery1, $tblvalue1);
                            if($insert){
                                $tblquery1 = "INSERT INTO tbl_login VALUES(:id, :assignBy, :user_id, :email, :password, :church_id, :homecell_id, :level, :status, :date)";
                                $tblvalue1 = array(
                                    ':id' =>  NULL,
                                    ':assignBy' =>  $_SESSION['myId'],
                                    ':user_id' =>  $_SESSION['user_idid'],
                                    ':email' => htmlspecialchars($email),
                                    ':password' => htmlspecialchars($password),
                                    ':church_id' => htmlspecialchars($church_id),
                                    ':homecell_id' => htmlspecialchars($homecell_id),
                                    ':level' => 'A',
                                    ':status' => '1',
                                    ':date' => date("Y-m-d h:i")
                                );
                                $insert20 = $connect->tbl_insert($tblquery1, $tblvalue1);
                                $_SESSION['Message'] = 'Member has been made admin';
                                $erremail = '';
                            }
                        }else{
                            $_SESSION['Message'] = 'Member is already an Admin';
                        }
                    }else{
                        $_SESSION['Message'] = 'Member is already a Church Leader';
                    }
                }else{
                    $_SESSION['Message'] = 'Member is already a Homecell Leader';
                }
            }   
        }else{
            $_SESSION['Message'] = 'Email don\'t exits';
        }
    }

    if($_POST['remove']){
        extract($_POST);
        $tblquery = "UPDATE tbl_leaders SET reason = :reason, status = '0' WHERE user_id = :user_id AND type = 'A'";
        $tblvalue = array(
            ':reason' => htmlspecialchars($reason),
            ':user_id' => htmlspecialchars($id),
        );
        $update = $connect->tbl_update($tblquery, $tblvalue);
        if($update){
            extract($_POST);
            $tblquery = "DELETE FROM tbl_login WHERE email = :email AND level = 'A'";
            $tblvalue = array(
                ':email' => htmlspecialchars($email)
            );
            $delete = $connect->tbl_delete($tblquery, $tblvalue);
            if($delete){
                $_SESSION['Message'] = 'Member has been remove as Admin';
            }
        }

    }

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Add Admin</h5>
                <?php 
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: blue;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                
                ?>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                
                                <label>Members</label>

                                <input list="members" class="form-control" name="email" placeholder="Choose Email" value="<?php echo $erremail; ?>" required>
                                <datalist id="members">
                                    <?php
                                
                                        $tblquery = "SELECT * FROM members WHERE email != '' AND number != ''";
                                        $tblvalue = array();
                                        $select = $connect->tbl_select($tblquery, $tblvalue);
                                        foreach($select as $data){
                                            extract($data);
                                            echo "
                                                <option value='$email'>
                                            ";
                                        }
                                    
                                    ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <input type="submit" class="btn btn-primary btn-round" name="add" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Admin</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Name</th>
                            <th>email</th>
                            <th>Church</th>
                            <th>Homecell</th>
                            <th>Remove</th>
                            <th class='text-right'>View</th>
                        </thead>
                        <tbody>
                            <?php
                            
                                $tblquery = "SELECT members.id AS m_id, members.last_name, members.first_name, members.other_name, members.email, members.church_id AS c_id, members.homecell_id AS h_id FROM members INNER JOIN tbl_login ON members.id = tbl_login.user_id WHERE level = 'A'";
                                $tblvalue = array();
                                $select =$connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        
                                        $tblquery = "SELECT name AS c_name FROM churches WHERE id = $c_id";
                                        $tblvalue = array();
                                        $select1 =$connect->tbl_select($tblquery, $tblvalue);
                                        if($select1){
                                            foreach($select1 as $data){
                                                extract($data);
                                                
                                                $tblquery = "SELECT name AS h_name FROM homecells WHERE id = $h_id";
                                                $tblvalue = array();
                                                $select1 =$connect->tbl_select($tblquery, $tblvalue);
                                                if($select1){
                                                    foreach($select1 as $data){
                                                        extract($data);
                                                        ?>
                                                        <?php
                                                            echo "
                                                                <tr>
                                                                    <td>$last_name $first_name $other_name</td>
                                                                    <td>$email</td>
                                                                    <td>$c_name</td>
                                                                    <td>$h_name</td>
                                                                    <td>
                                                                        <form action='' method='post'>
                                                                            <input type='hidden' name='id' value='$m_id'>
                                                                            <input type='hidden' name='email' value='$email'>
                                                                            <a class='btn btn-danger btn-sm' onclick='popupBox()'>remove</a>

                                                                            <div class='popup-main'>
                                                                                <div class='main-box'>
                                                                                    <div class='head bg-danger'>
                                                                                        <h3 class='ml-2 text-white'>Remove <i class='fa fa-exclamation' aria-hidden='true'></i></h3>
                                                                                        <div class='close' onclick='popupBox()'>
                                                                                            <i class='fa fa-times' aria-hidden='true'></i>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class='bottom p-3'>
                                                                                        <div class='row'>
                                                                                            <div class='col-md-12'>
                                                                                                <div class='form-group'>
                                                                                                    <label class='mt-1'>Reason</label>
                                                                                                    <textarea class='form-control textarea' name='reason' required></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class='row mb-2'>
                                                                                            <div class='update ml-auto mr-auto'>
                                                                                                <input type='submit' name='remove' class='btn btn-danger btn-sm' value='remove'>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </td>
                                                                    <td>
                                                                        <form action='' method='POST'>
                                                                            <input type='hidden' name='member_id' value='$m_id'>
                                                                            <input type='submit' name='view' class='btn btn-info' value='view'>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            ";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='6'>There is no Admin</td>
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

    if($_POST['view']){
        extract($_POST);
        $_SESSION['view_member_id'] = $member_id;
        echo "<script>  window.location='view_member' </script>";
    }

?>