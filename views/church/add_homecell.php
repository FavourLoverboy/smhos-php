<?php 
   
    if($_POST){
        $_SESSION['Message'] = '';
        extract($_POST);

        $_SESSION['name'] = $name;
        $_SESSION['church'] = $church;
        $_SESSION['address'] = $address;

        $tblquery = "SELECT * FROM homecells WHERE name = :name";
        $tblvalue = array(
            ':name' => htmlspecialchars(ucwords($name))
        );
        $homecellName = $connect->tbl_select($tblquery, $tblvalue);
        if(!$homecellName){
            $tblquery = "INSERT INTO homecells VALUES(:id, :user_id, :church_id, :name, :address, :date)";
            $tblvalue = array(
                ':id' => NULL,
                ':user_id' => htmlspecialchars($_SESSION['myId']),
                ':church_id' => htmlspecialchars($_SESSION['church_id']),
                ':name' => htmlspecialchars(ucwords($name)),
                ':address' => htmlspecialchars(ucwords($address)),
                ':date' => date("Y-m-d h:i")
            );
            $insert = $connect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                $_SESSION['Message'] = 'Homecell has been added';
                echo "<script>  window.location='homecells' </script>";
            }
    
        }else{
            $_SESSION['Message'] = 'Homecell Name already exits';
            echo "<script>  window.location='add_homecell' </script>";
        }
    }

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Add Homecell</h5>
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
                        <div class="col-md-6 pl-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $_SESSION['name']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 pr-3">
                            <div class="form-group">
                                <label for="continent">Church</label>
                                <?php
                            
                                    $tblquery = "SELECT name FROM churches WHERE id = :id";
                                    $tblvalue = array(
                                        ':id' => $_SESSION['church_id']
                                    );
                                    $select = $connect->tbl_select($tblquery, $tblvalue);
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <input list='church' class='form-control' value='$name' readonly>
                                        ";
                                    }
                                
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pl-3">
                            <div class="form-group">
                                <label for="adddress">Address</label>
                                <textarea id="address" name="address" class="form-control" placeholder="Address" required><?php echo $_SESSION['address']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-success btn-round">Add Homecell</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>