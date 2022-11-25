<?php
    $_SESSION['Message'] = '';
    if($_POST['post']){
        extract($_POST);

        $tblquery = "UPDATE testimonies SET postBy = :postBy, status = :status WHERE id = :id";
        $tblvalue = array(
            ':postBy' => $_SESSION['myId'],
            ':status' => '1',
            ':id' => $_SESSION['view_tes_id']
        );
        $update = $connect->tbl_update($tblquery, $tblvalue);
        if($update){
            $_SESSION['Message'] = "Testimony has been post";
        }
    }

    if($_POST['unpost']){
        extract($_POST);

        $tblquery = "UPDATE testimonies SET postBy = :postBy, status = :status WHERE id = :id";
        $tblvalue = array(
            ':postBy' => $_SESSION['myId'],
            ':status' => '0',
            ':id' => $_SESSION['view_tes_id']
        );
        $update = $connect->tbl_update($tblquery, $tblvalue);
        if($update){
            $_SESSION['Message'] = "Testimony has been unposted";
        }
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title"><?php echo $_SESSION['view_name']; ?></h5>
                <?php
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: green;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 pl-3">
                        <div>
                            <img src="<?php echo '../uploads/' . $_SESSION['view_profile']; ?>" class="avatar border-gray" style="height:200px; width: 200px;"/>
                        </div>
                    </div>
                    <div class="col-md-12 pl-3">
                        <?php echo $_SESSION['view_content']; ?>
                    </div>
                    <div class="col-md-12 pl-3">
                        <?php 

                            if($_SESSION['view_status'] == '1'){
                                echo "
                                    <form method='POST' action=''>
                                        <input type='submit' name='unpost' class='btn btn-danger btn-round' value='unpost'>
                                    </form>
                                ";
                            }else{
                                echo "
                                    <form method='POST' action=''>
                                        <input type='submit' name='post' class='btn btn-primary btn-round' value='post'>
                                    </form>
                                ";
                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>