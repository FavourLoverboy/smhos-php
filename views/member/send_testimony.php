<?php

    if($_POST['send']){
        extract($_POST);
        $tblquery = "INSERT INTO testimonies VALUES(:id, :postBy, :user, :content, :date, :status)";
        $tblvalue = array(
            ':id' => NULL,
            ':postBy' => '',
            ':user' => $_SESSION['myId'],
            ':content' => htmlspecialchars($testimony),
            ':date' => date("Y-m-d h:i:s"),
            ':status' => '0'
        );
        $insert = $connect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            $_SESSION['Message'] = 'Your testimony has been sent';
            echo "<script>  window.location='send_testimony' </script>";
        }
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Send Testimony</h5>
                <?php 
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: green;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                
                ?>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-12 pl-3">
                            <div class="form-group">
                                <!-- <label for="tes">Testimony</label> -->
                                <textarea id="tes" name="testimony" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <input type="submit" name="send" class="btn btn-success btn-round" value="Proceed">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../vendor/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('testimony');
</script>