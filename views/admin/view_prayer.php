<?php
    $_SESSION['Message'] = '';
    if($_POST['delete']){
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
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title"><?php echo$_SESSION['view_theme']; ?></h5>
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
                    <div class="col-md-12 pl-3">
                        <?php echo $_SESSION['view_content']; ?>
                    </div>
                    <div class="col-md-12 pl-3">
                        <form method='POST' action=''>
                            <input type='submit' name='delete' class='btn btn-danger btn-round' value='delete'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>