<?php 
    $_SESSION['Message'] = '';

    if($_POST){
        extract($_POST);
        $oldEncryptPassword = $connect->epass($op);
        $newEncryptPassword = $connect->epass($np);

        if($_SESSION['password'] != $oldEncryptPassword){
            $_SESSION['Message'] = 'You Current password is not correct';
        }else if($np != $cp){
            $_SESSION['Message'] = 'Password do not match';
        }else{
            $tblquery = "UPDATE members SET password = :password WHERE id = :id";
            $tblvalue = array(
                ':password' => htmlspecialchars($newEncryptPassword),
                ':id' => $_SESSION['myId']
            );
            $update = $connect->tbl_update($tblquery, $tblvalue);
            if($update){
                $tblquery = "UPDATE tbl_login SET password = :password WHERE user_id = :id";
                $tblvalue = array(
                    ':password' => htmlspecialchars($newEncryptPassword),
                    ':id' => $_SESSION['myId']
                );
                $update = $connect->tbl_update($tblquery, $tblvalue);
                
                $_SESSION['Message'] = '';
                echo "<script>  window.location='/smhos-php/logout' </script>";
            }
        }
    }

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Change Password</h5>
                <?php 
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: red;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                
                ?>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12 pl-3">
                            <div class="form-group">
                                <label for="op">Current Password</label>
                                <input type="password" class="form-control" id="op" name="op" placeholder="enter current password" required>
                            </div>
                        </div>
                        <div class="col-md-12 pl-3">
                            <div class="form-group">
                                <label for="np">New Password</label>
                                <input type="password" class="form-control" id="np" name="np" placeholder="enter new password" required>
                            </div>
                        </div>
                        <div class="col-md-12 pl-3">
                            <div class="form-group">
                                <label for="cp">Confirm Password</label>
                                <input type="password" class="form-control" id="cp" name="cp" placeholder="enter confirm password" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-success btn-round">Proceed</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>