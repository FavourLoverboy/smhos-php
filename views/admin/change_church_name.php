<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Change Church Name</h5>
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
                        <div class="col-md-6 pl-3">
                            <div class="form-group">
                                <label for="name">Current Name</label>
                                <input type="text" class="form-control" value="<?php echo $_SESSION['view_church_name']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6 pr-3">
                            <div class="form-group">
                                <label for="name">New Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter new name" value="<?php echo $_SESSION['namess']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-success btn-round">Change</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php 
    $_SESSION['Message'] = '';
    if($_POST){
        
        extract($_POST);

        $_SESSION['namess'] = $name;

        $tblquery = "SELECT * FROM churches WHERE name = :name";
        $tblvalue = array(
            ':name' => htmlspecialchars(ucwords($name))
        );
        $churchName = $connect->tbl_select($tblquery, $tblvalue);
        if(!$churchName){
            $tblquery = "UPDATE churches SET name = :name WHERE id = :id";
            $tblvalue = array(
                ':name' =>  htmlspecialchars(ucwords($name)),
                ':id' => $_SESSION['view_church_id']
            );
            $update = $connect->tbl_update($tblquery, $tblvalue);
            if($update){
                $_SESSION['view_church_name'] = htmlspecialchars(ucwords($name));
                $_SESSION['Message'] = 'Church name has been changed';
                echo "<script>  window.location='change_church_name' </script>";
            }
        }else{
            echo 'found';
            $_SESSION['Message'] = 'Church Name already exits';
            echo "<script>  window.location='change_church_name' </script>";
        }
    }

?>