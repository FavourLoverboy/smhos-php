<?php
    if($_POST['delete']){
        extract($_POST);

        $tblquery = "DELETE FROM prayers WHERE id = :id";
        $tblvalue = array(
            ':id' => $_SESSION['view_id']
        );
        $update = $connect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo "<script>  window.location='all_prayers' </script>";
        }
    }
?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title"><?php echo$_SESSION['view_theme']; ?></h5>
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