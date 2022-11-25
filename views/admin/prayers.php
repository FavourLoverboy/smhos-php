<?php

    if($_POST['send']){
        extract($_POST);
        $tblquery = "INSERT INTO prayers VALUES(:id, :postBy, :theme, :content, :date)";
        $tblvalue = array(
            ':id' => NULL,
            ':postBy' => $_SESSION['myId'],
            ':theme' => htmlspecialchars(ucwords($theme)),
            ':content' => htmlspecialchars($testimony),
            ':date' => date("Y-m-d h:i:s")
        );
        $insert = $connect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            $_SESSION['Message'] = 'prayer sent';
            echo "<script>  window.location='prayers' </script>";
        }
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Send Daily Prayers</h5>
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
                                <input type="text" name="theme" class="form-control" placeholder="enter prayer Topic" required>
                            </div>
                        </div>
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