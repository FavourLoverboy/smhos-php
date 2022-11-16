<?php
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);
        $proceed = true;

        $tblquery = "SELECT * FROM members WHERE email = :email";
        $tblvalue = array(
            ':email' => htmlspecialchars($email)
        );
        $checkEmail = $connect->tbl_select($tblquery, $tblvalue);
        if($checkEmail){
            foreach($checkEmail as $data){
                extract($data);
                if(!($email == $_SESSION['email'])){
                    $proceed = false;
                    $_SESSION['Message'] = 'email already taking';
                }
            }
        }

        if($proceed){
            $tblquery = "UPDATE members SET last_name = :ln, first_name = :fn, other_name = :other, email = :email, number = :num, address = :ads, baptise = :bap, sex = :sex, dob = :dob, marital_status = :ms, lga = :lga, state = :state, country = :con, continent = :conti WHERE id = :id";
            $tblvalue = array(
                ':ln' => htmlspecialchars(ucwords($lname)),
                ':fn' => htmlspecialchars(ucwords($fname)),
                ':other' => htmlspecialchars(ucwords($other)),
                ':email' => htmlspecialchars($email),
                ':num' => htmlspecialchars($number),
                ':ads' => htmlspecialchars(ucwords($address)),
                ':bap' => htmlspecialchars($baptise),
                ':sex' => htmlspecialchars(ucwords($sex)),
                ':dob' => htmlspecialchars($dob),
                ':ms' => htmlspecialchars(ucwords($marital_status)),
                ':lga' => htmlspecialchars(ucwords($local)),
                ':state' => htmlspecialchars(ucwords($states)),
                ':con' => htmlspecialchars(ucwords($member_country)),
                ':conti' => htmlspecialchars(ucwords($continents)),
                ':id' => $_SESSION['myId']
            );
            $update = $connect->tbl_update($tblquery, $tblvalue);
            if($update){

                $tblquery = "UPDATE tbl_login SET email = :e WHERE user_id = :id";
                $tblvalue = array(
                    ':e' => htmlspecialchars(ucwords($email)),
                    ':id' => $_SESSION['myId']
                );
                $tbl_update = $connect->tbl_update($tblquery, $tblvalue);

                $_SESSION['Message'] = 'Profile has been updated';
                echo "<script>  window.location='profile' </script>";
            }          
        }
    }

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Update</h5>
                <?php 
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: green;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                
                ?>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <?php
                    
                        $tblquery = "SELECT * FROM members WHERE id = :id";
                        $tblvalue = array(
                            ':id' => $_SESSION['myId']
                        );
                        $view = $connect->tbl_select($tblquery, $tblvalue);
                        foreach($view as $data){
                            extract($data);
                            echo "
                                <div class='row'>
                                    <div class='col-md-5 pr-1'>
                                        <div class='form-group'>
                                            <label>Last Name</label>
                                            <input type='text' class='form-control' name='lname' value='$last_name' required>
                                        </div>
                                    </div>
                                    <div class='col-md-3 px-1'>
                                        <div class='form-group'>
                                            <label>First Name</label>
                                            <input type='text' class='form-control' name='fname' value='$first_name' required>
                                        </div>
                                    </div>
                                    <div class='col-md-4 pl-1'>
                                        <div class='form-group'>
                                            <label>Other</label>
                                            <input type='text' class='form-control' name='other' value='$other_name'>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                <div class='col-md-6 pr-1'>
                                        <div class='form-group'>
                                            <label>Email</label>
                                            <input type='email' class='form-control' name='email' value='$email' required>
                                        </div>
                                    </div>
                                    <div class='col-md-6 pl-1'>
                                        <div class='form-group'>
                                            <label>Mobile Number</label>
                                            <input type='tel' class='form-control' name='number' value='$number' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <label>Address</label>
                                            <textarea class='form-control textarea' name='address' required>$address</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-3 pr-1'>
                                        <div class='form-group'>
                                            <label>Sex</label>
                                            <input type='text' class='form-control' name='sex' value='$sex' required>
                                        </div>
                                    </div>
                                    <div class='col-md-3 px-1'>
                                        <div class='form-group'>
                                            <label>Marital Status</label>
                                            <input type='text' class='form-control' name='marital_status' value='$marital_status' required>
                                        </div>
                                    </div>
                                    <div class='col-md-3 px-1'>
                                        <div class='form-group'>
                                            <label>DOB</label>
                                            <input type='date' class='form-control' name='dob' value='$dob' required>
                                        </div>
                                    </div>
                                    <div class='col-md-3 pl-1'>
                                        <div class='form-group'>
                                            <label>Baptise</label>
                                            <input type='date' class='form-control' name='baptise' value='$baptise'>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-5 pr-1'>
                                        <div class='form-group'>
                                            <label>LGA</label>
                                            <input type='text' class='form-control' name='local' value='$lga' required>
                                        </div>
                                    </div>
                                    <div class='col-md-3 px-1'>
                                        <div class='form-group'>
                                            <label>State</label>
                                            <input type='text' class='form-control' name='states' value='$state' required>
                                        </div>
                                    </div>
                                    <div class='col-md-4 pl-1'>
                                        <div class='form-group'>
                                            <label>Country</label>
                                            <input type='text' class='form-control' name='member_country' value='$country' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-5 pr-1'>
                                        <div class='form-group'>
                                            <label>Continent</label>
                                            <input type='text' class='form-control' name='continents' value='$continent' required>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    
                    ?>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary btn-round">
                                Update Profile
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>