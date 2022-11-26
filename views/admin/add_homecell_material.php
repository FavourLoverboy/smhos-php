<?php
    if($_POST['send']){
        extract($_POST);
        $tblquery = "INSERT INTO material VALUES(:id, :user, :topic, :content, :date)";
        $tblvalue = array(
            ':id' => NULL,
            ':user' => $_SESSION['myId'],
            ':topic' => htmlspecialchars(ucwords($topic)),
            ':content' => htmlspecialchars($content),
            ':date' => date("Y-m-d h:i:s")
        );
        $insert = $connect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            $_SESSION['Message'] = 'Material has been added';
            echo "<script>  window.location='homecell_materials' </script>";
        }
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Homecell Material</h5>
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
                                <input type="text" name="topic" class="form-control" placeholder="enter Topic" required>
                            </div>
                        </div>
                        <div class="col-md-12 pl-3">
                            <div class="form-group">
                                <textarea id="tes" name="content" class="form-control" required></textarea>
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
    CKEDITOR.replace('content');
</script>