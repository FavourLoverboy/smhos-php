<?php
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);
        $homecell_id = '';
        $church_id = '';
        $errC = '';
        $errH = '';
        $encryptPassword = $connect->epass('123');
        $username = $lname . '.' . $fname;

        // input fields
        $_SESSION['church'] = $church;
        $_SESSION['homecell'] = $homecell;

        if($homecell){
            $tblquery = "SELECT id FROM homecells WHERE name = :name";
            $tblvalue = array(
                ':name' => htmlspecialchars(ucwords($homecell))
            );
            $homecellName = $connect->tbl_select($tblquery, $tblvalue);
            if($homecellName){
                foreach($homecellName as $data){
                    extract($data);
                    $homecell_id = $id;
                }
            }else{
                $_SESSION['Message'] = 'Homecell don\'t exits, ';
                $errH = 'error';
            }
        }

        if($church){
            $tblquery = "SELECT id FROM churches WHERE name = :name";
            $tblvalue = array(
                ':name' => htmlspecialchars(ucwords($church))
            );
            $churchName = $connect->tbl_select($tblquery, $tblvalue);
            if($churchName){
                foreach($churchName as $data){
                    extract($data);
                    $church_id = $id;
                }
            }else{
                $_SESSION['Message'] = 'Church don\'t exits, ';
                $errC = 'error';
            }
        }

        $tblquery = "SELECT * FROM members WHERE email = :email";
        $tblvalue = array(
            ':email' => htmlspecialchars($email)
        );
        $checkEmail = $connect->tbl_select($tblquery, $tblvalue);
        if(!$checkEmail){
            if(!($errC || $errH)){
                $tblquery = "INSERT INTO members VALUES(:id, :last_name, :first_name, :other_name, :email, :number, :address, :baptise, :sex, :dob, :marital_status, :lga, :state, :country, :continent, :username, :password, :profile, :login, :homecell_id, :church_id, :date, :status)";
                $tblvalue = array(
                    ':id' => NULL,
                    ':last_name' => htmlspecialchars(ucwords($lname)),
                    ':first_name' => htmlspecialchars(ucwords($fname)),
                    ':other_name' => htmlspecialchars(ucwords($other)),
                    ':email' => htmlspecialchars($email),
                    ':number' => htmlspecialchars($number),
                    ':address' => htmlspecialchars(ucwords($address)),
                    ':baptise' => htmlspecialchars($baptise),
                    ':sex' => htmlspecialchars(ucwords($sex)),
                    ':dob' => htmlspecialchars($dob),
                    ':marital_status' => htmlspecialchars(ucwords($marital_status)),
                    ':lga' => htmlspecialchars(ucwords($lga)),
                    ':state' => htmlspecialchars(ucwords($state)),
                    ':country' => htmlspecialchars(ucwords($country)),
                    ':continent' => htmlspecialchars(ucwords($continent)),
                    ':username' => htmlspecialchars(ucwords($username)),
                    ':password' => $encryptPassword,
                    ':profile' => 'profile.png',
                    ':login' => '',
                    ':homecell_id' => $homecell_id,
                    ':church_id' => $church_id,
                    ':date' => date("Y-m-d h:i"),
                    ':status' => '1'
                );
                $insert = $connect->tbl_insert($tblquery, $tblvalue);
                if($insert){
                    $_SESSION['Message'] = 'Member has been added';
                    echo "<script>  window.location='members' </script>";
                }          
            }
        }else{
            $_SESSION['Message'] = 'email already taking';
        }
    }

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Add Member</h5>
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
                    <row class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="lname" placeholder="enter lastname" value="<?php echo $lname; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="fname" placeholder="enter firstname" value="<?php echo $fname; ?>" required>
                            </div>
                        </div>
                    </row>
                    <div class="row">
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Other Name</label>
                                <input type="text" class="form-control" name="other" placeholder="enter othername" value="<?php echo $other; ?>">
                            </div>
                        </div>
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="enter email" value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label>Number</label>
                                <input type="tel" class="form-control" name="number" placeholder="enter mobile numner" value="<?php echo $number; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>LGA</label>
                                <input type="text" class="form-control" name="lga" placeholder="enter lga" value="<?php echo $lga; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" name="state" placeholder="enter state" value="<?php echo $state; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Nationality</label>
                                <input type="text" class="form-control" name="country" placeholder="enter country" value="<?php echo $country; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Continent</label>
                                <input type="text" class="form-control" name="continent" placeholder="enter continent" value="<?php echo $continent; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 pr-1">
                            <div class="form-group">
                                <label>Sex</label>
                                <input list="sex" class="form-control" name="sex" placeholder="sex" value="<?php echo $sex; ?>" required>
                                <datalist id="sex">
                                    <option value="M">
                                    <option value="F">
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <input list="marital-status" class="form-control" name="marital_status" placeholder="marital status" value="<?php echo $marital_status; ?>" required>
                                <datalist id="marital-status">
                                    <option value="Divorced">
                                    <option value="Married">
                                    <option value="Registered Partnership">
                                    <option value="Separated">
                                    <option value="Single">
                                    <option value="Widowed">
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>DOB</label>
                                <input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-3 pl-1">
                            <div class="form-group">
                                <label>Baptise</label>
                                <input type="date" class="form-control" name="baptise" value="<?php echo $baptise; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control textarea" name="address" required><?php echo $address; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>Homecell</label>
                                <input list="homecell" class="form-control" name="homecell" placeholder="Homecell" value="<?php echo $_SESSION['homecell']; ?>">
                                <datalist id="homecell">
                                    <?php
                                
                                        $tblquery = "SELECT name FROM homecells";
                                        $tblvalue = array();
                                        $select = $connect->tbl_select($tblquery, $tblvalue);
                                        foreach($select as $data){
                                            extract($data);
                                            echo "
                                                <option value='$name'>
                                            ";
                                        }
                                    
                                    ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Church</label>
                                <input list="church" class="form-control" name="church" placeholder="Church" value="<?php echo $_SESSION['church']; ?>">
                                <datalist id="church">
                                    <?php
                                
                                        $tblquery = "SELECT name FROM churches";
                                        $tblvalue = array();
                                        $select = $connect->tbl_select($tblquery, $tblvalue);
                                        foreach($select as $data){
                                            extract($data);
                                            echo "
                                                <option value='$name'>
                                            ";
                                        }
                                    
                                    ?>
                                </datalist>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">add member</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>