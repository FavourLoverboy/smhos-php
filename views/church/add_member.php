<?php
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);
        $homecell_id = '';
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

        if($email){
            $tblquery = "SELECT * FROM members WHERE email = :email";
            $tblvalue = array(
                ':email' => htmlspecialchars($email)
            );
            $checkEmail = $connect->tbl_select($tblquery, $tblvalue);
        }
        
        if(!$checkEmail){
            if(!($errC || $errH)){

                $adults = array();

                $tblquery = "SELECT dob FROM members WHERE homecell_id = :h";
                $tblvalue = array(
                    ':h' => $homecell_id
                );
                $age = $connect->tbl_select($tblquery, $tblvalue);
                
                foreach($age as $data){
                    extract($data);
                    $bday = new DateTime($dob); // Your date of birth
                    $today = new Datetime(date('Y-m-d'));
                    $diff = $today->diff($bday);
                    
                    
                    if($diff->y >= 18){
                        array_push($adults, '1');
                    }
                }

                if(count($adults) < 10){
                    $month = substr($dob, -5, -3);

                    $tblquery = "INSERT INTO members VALUES(:id, :createdBy, :last_name, :first_name, :other_name, :email, :number, :address, :baptise, :sex, :dob, :month, :marital_status, :lga, :state, :country, :continent, :username, :password, :profile, :login, :homecell_id, :church_id, :date, :status)";
                    $tblvalue = array(
                        ':id' => NULL,
                        ':createdBy' => $_SESSION['myId'],
                        ':last_name' => htmlspecialchars(ucwords($lname)),
                        ':first_name' => htmlspecialchars(ucwords($fname)),
                        ':other_name' => htmlspecialchars(ucwords($other)),
                        ':email' => htmlspecialchars($email),
                        ':number' => htmlspecialchars($number),
                        ':address' => htmlspecialchars(ucwords($address)),
                        ':baptise' => htmlspecialchars($baptise),
                        ':sex' => htmlspecialchars(ucwords($sex)),
                        ':dob' => htmlspecialchars($dob),
                        ':month' => htmlspecialchars($month),
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
                        ':church_id' => $_SESSION['church_id'],
                        ':date' => date("Y-m-d h:i"),
                        ':status' => '1'
                    );
                    $insert = $connect->tbl_insert($tblquery, $tblvalue);
                    if($insert){
                        $_SESSION['Message'] = 'Member has been added';
                        echo "<script>  window.location='members' </script>";
                    }
                }else{
                    $_SESSION['Message'] = 'Homecell has reach it maximum adult limit';
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
                                <select class="form-control" name="continent" required>
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
                    </div>
                    <div class="row">
                        <div class="col-md-3 pr-1">
                            <div class="form-group">
                                <label>Sex</label>
                                <select class="form-control" name="sex" required>
                                    <option value="<?php echo $sex; ?>"><?php echo $sex; ?></option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 px-1">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select class="form-control" name="marital_status" required>
                                    <option value="<?php echo $marital_status; ?>"><?php echo $marital_status; ?></option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Married">Married</option>
                                    <option value="Single">Single</option>
                                    <option value="Widowed">Widowed</option>
                                </select>
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
                                <input list="homecell" class="form-control" name="homecell" placeholder="Homecell" value="<?php echo $_SESSION['homecell']; ?>" required>
                                <datalist id="homecell">
                                    <?php
                                
                                        $tblquery = "SELECT name FROM homecells WHERE church_id = :id";
                                        $tblvalue = array(
                                            ':id' => $_SESSION['church_id']
                                        );
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
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">add member</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>