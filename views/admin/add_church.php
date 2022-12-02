<?php 

    if($_POST){
        $_SESSION['Message'] = '';
        extract($_POST);

        $tblquery = "SELECT * FROM churches WHERE name = :name";
        $tblvalue = array(
            ':name' => htmlspecialchars(ucwords($name))
        );
        $select = $connect->tbl_select($tblquery, $tblvalue);
        if(!$select){
            $tblquery = "INSERT INTO churches VALUES(:id, :user_id, :name, :lga, :state, :country, :continent, :date)";
            $tblvalue = array(
                ':id' => NULL,
                ':user_id' => '1',
                ':name' => htmlspecialchars(ucwords($name)),
                ':lga' => htmlspecialchars(ucwords($lga)),
                ':state' => htmlspecialchars(ucwords($state)),
                ':country' => htmlspecialchars(ucwords($country)),
                ':continent' => htmlspecialchars(ucwords($continent)),
                ':date' => date("Y-m-d h:i")
            );
            $insert =$connect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                $_SESSION['Message'] = 'Church has been added';
                echo "<script>  window.location='churches' </script>";
            }
        }else{
            $_SESSION['Message'] = 'Church Name already exits';
            echo "<script>  window.location='add_church' </script>";
        }
    }

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Add Church</h5>
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
                        <div class="col-md-6 pr-1">
                            <div class="form-group">                                
                                <label>Continent</label>
                                <select class="form-control continent" name="continent" required>
                                    <option value="<?php echo $continent; ?>"><?php echo $continent; ?></option>
                                    <option value="Africa">Africa</option>
                                    <option value="Asia">Asia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Europe">Europe</option>
                                    <option value="North America">North America</option>
                                    <option value="South America">South America</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input list="country" class="form-control country" name="country" placeholder="Country" value="" required>
                                <datalist id="country">
                                    <option value="Ghana">
                                    <option value="Nigeria">
                                    <option value="Togo">
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" id="state" name="state" class="form-control" placeholder="State" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label for="lga">LGA</label>
                                <input type="text" id="lga" name="lga" class="form-control" placeholder="LGA" value="" required>
                            </div>
                        </div>
                        <div class="col-md-12 pl-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" value="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-success btn-round">Add Church</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>