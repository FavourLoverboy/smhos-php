<?php
    $_SESSION['Message'] = '';
    if($_POST['assign']){
        extract($_POST);
        
        $tblquery = "SELECT * FROM members WHERE email = :email AND church_id = :church_id";
        $tblvalue = array(
            ':email' => htmlspecialchars($email),
            ':church_id' => $_SESSION['view_church_id']
        );
        $select = $connect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                $tblquery = "SELECT * FROM tbl_leaders WHERE user_id = :user_id AND lead_id = :lead_id AND type = :type AND status = :status";
                $tblvalue = array(
                    ':user_id' =>  $id,
                    ':lead_id' => $_SESSION['view_church_id'],
                    ':type' => 'C',
                    ':status' => '1'
                );
                $select1 = $connect->tbl_select($tblquery, $tblvalue);
                if(!$select1){
                    $tblquery1 = "INSERT INTO tbl_leaders VALUES(:id, :user_id, :lead_id, :type, :reason, :date, :status)";
                    $tblvalue1 = array(
                        ':id' =>  NULL,
                        ':user_id' =>  $id,
                        ':lead_id' => $_SESSION['view_church_id'],
                        ':type' => 'C',
                        ':reason' => '',
                        ':date' => date("Y-m-d h:i"),
                        ':status' => '1'
                    );
                    $insert = $connect->tbl_insert($tblquery1, $tblvalue1);
                    if($insert){
                        $_SESSION['Message'] = 'Member has been assign';
                    }
                }else{
                    $_SESSION['Message'] = 'Member is already a Church Leader';
                }
            }
            
        }else{
            $_SESSION['Message'] = 'Email don\'t exits';
        }
    }

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Assign Church Leader</h5>
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

                                <input list="members" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                                <datalist id="members">
                                    <?php
                                
                                        $tblquery = "SELECT * FROM members WHERE email != '' AND church_id = :church_id";
                                        $tblvalue = array(
                                            ':church_id' => $_SESSION['view_church_id']
                                        );
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
                            <input type="submit" class="btn btn-primary btn-round" name="assign" value="Assign">
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
                <h4 class="card-title">Church Leaders</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Remove</th>
                                <th class="text-right">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $tblquery = "SELECT members.id, members.last_name, members.first_name, members.other_name, members.email, tbl_leaders.date FROM members INNER JOIN tbl_leaders ON members.id = tbl_leaders.user_id WHERE tbl_leaders.lead_id = :lead_id AND tbl_leaders.type = :type AND tbl_leaders.status = :status";
                                $tblvalue = array(
                                    ':lead_id' => $_SESSION['view_church_id'],
                                    ':type' => 'C',
                                    ':status' => '1'
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <tr>
                                                <td>$last_name $first_name $other_name</td>
                                                <td>$email</td>
                                                <td>$date</td>
                                                <td>
                                                    <form action='' method='post'>
                                                        <input type='hidden' name='id' value='$id'>
                                                        <input type='hidden' name='church_id' value='$church_id'>
                                                        <input type='hidden' name='email' value='$email'>
                                                        <a class='btn btn-danger btn-sm' onclick='popupBox()'>remove</a>

                                                        <div class='popup-main'>
                                                            <div class='main-box'>
                                                                <div class='head bg-danger'>
                                                                    <h3 class='ml-2 text-white'>Remove <i class='nc-icon nc-alert-circle-i'></i></h3>
                                                                    <div class='close' onclick='popupBox()'>
                                                                        <i class='nc-icon nc-simple-remove'></i>
                                                                    </div>
                                                                </div>
                                                                <div class='bottom p-3'>
                                                                    <div class='row'>
                                                                        <div class='col-md-12'>
                                                                            <div class='form-group'>
                                                                                <label class='mt-1'>Reason</label>
                                                                                <textarea class='form-control textarea' name='reason'></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class='row mb-2'>
                                                                        <div class='update ml-auto mr-auto'>
                                                                            <button class='btn btn-danger btn-sm'>remove</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class='text-right'>
                                                    <a href='/<%= page %>/view/<%= leader.id %>' class='btn btn-success btn-sm'>view</a>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='5'>There is no Leader for this church</td>
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