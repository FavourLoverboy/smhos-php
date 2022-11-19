<?php 
    $_SESSION['Message'] = '';
    $tblquery = "SELECT * FROM members WHERE id = :id";
    $tblvalue = array(
        ':id' => $_SESSION['view_member_id']
    );
    $view = $connect->tbl_select($tblquery, $tblvalue);
    foreach($view as $data){
        extract($data);
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        $_SESSION['username'] = $username;
        $_SESSION['profile'] = $profile;
        $_SESSION['church_id'] =$church_id;
        $_SESSION['homecell_id'] = $homecell_id;
    }

?>
<div class="row">
    <div class="col-md-4">
        <div class="card card-user">
            <div class="image">
                <img src="../assets/bg.jpg" alt="background image">
            </div>
            <div class="card-body">
                <div class="author">
                    <a href="#">
                    <img class="avatar border-gray" src="../uploads/<?php echo $_SESSION['profile']; ?>" alt="...">
                        <h5 class="title"><?php echo $_SESSION['username']; ?></h5>
                    </a>
                    <p class="description"><?php echo $_SESSION['email']; ?></p>
                </div>
                <p class="description text-center"><?php echo $_SESSION['address']; ?></p>
            </div>
            <div class="card-footer">
                <hr>
                <?php
                
                    $tblquery = "SELECT * FROM tbl_leaders WHERE user_id = :id AND status = :status";
                    $tblvalue = array(
                        ':id' => $_SESSION['view_member_id'],
                        ':status' => '1'
                    );
                    $lead = $connect->tbl_select($tblquery, $tblvalue);
                    foreach($lead as $data){
                        extract($data);
                        if($type == 'C'){
                            echo "
                                <h5 class='text-center bg-primary text-white p-2'>Church Leader</h5>
                            ";
                        }else{
                            echo "
                                <h5 class='text-center bg-primary text-white p-2'>Homecell Leader</h5>
                            ";
                        }
                    }
                
                ?>
                
                <div class="button-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-6 ml-auto">
                            <!-- <h5>12<br><small>Files</small></h5> -->
                        </div>
                        <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                            <!-- <h5>Leader</h5> -->
                        </div>
                        <div class="col-lg-3 mr-auto">
                            <!-- <h5>24,6$<br><small>Spent</small></h5> -->
                        </div>
                    </div>
                <!-- </div>    -->
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">More Info</h4>
        </div>
        <div class="card-body">
            <ul class="list-unstyled team-members">
                <li>
                    <div class="row">
                        <div class="col-md-2 col-2">
                            <div class="avatar">
                                
                                <?php 
                            
                                    $tblquery = "SELECT members.profile FROM members INNER JOIN tbl_leaders ON tbl_leaders.user_id = members.id WHERE tbl_leaders.lead_id = :id AND tbl_leaders.type = :type AND tbl_leaders.status = :status ORDER BY tbl_leaders.date LIMIT 1";
                                    $tblvalue = array(
                                        ':id' => $_SESSION['homecell_id'],
                                        ':type' => 'H',
                                        ':status' => '1'
                                    );
                                    $leader1 = $connect->tbl_select($tblquery, $tblvalue);
                                    if($leader1){
                                        foreach($leader1 as $data){
                                            extract($data);
                                            echo "
                                                <img src='../assets/$profile' alt='Circle Image' class='img-circle img-no-padding img-responsive'>
                                            ";
                                        }
                                    }else{
                                        echo "
                                            <img src='' alt='Circle Image' class='img-circle img-no-padding img-responsive'>
                                        ";
                                    }
                                
                                ?>
                            </div>
                        </div>
                        <div class="col-md-7 col-7">
                            <?php 
                            
                                $tblquery = "SELECT members.last_name, members.first_name FROM members INNER JOIN tbl_leaders ON tbl_leaders.user_id = members.id WHERE tbl_leaders.lead_id = :id AND tbl_leaders.type = :type AND tbl_leaders.status = :status ORDER BY tbl_leaders.date LIMIT 1";
                                $tblvalue = array(
                                    ':id' => $_SESSION['homecell_id'],
                                    ':type' => 'H',
                                    ':status' => '1'
                                );
                                $leader = $connect->tbl_select($tblquery, $tblvalue);
                                if($leader){
                                    foreach($leader as $data){
                                        extract($data);
                                        echo "$last_name $first_name";
                                    }
                                }else{
                                    echo "No Homecell Leader";
                                }
                            
                            ?>
                            <br />
                            <span class="text-muted"><small>Homecell Leader</small></span>
                        </div>
                        <div class="col-md-3 col-3 text-right">
                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-2 col-2">
                            <div class="avatar">
                                <img src="../assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                            </div>
                        </div>
                        <div class="col-md-7 col-7">
                            <?php
                            
                                $tblquery = "SELECT * FROM homecells WHERE id = :id";
                                $tblvalue = array(
                                    ':id' => $_SESSION['homecell_id']
                                );
                                $home = $connect->tbl_select($tblquery, $tblvalue);
                                if($home){
                                    foreach($home as $data){
                                        extract($data);
                                        echo "$name";
                                    }
                                }else{
                                    echo "No Homecell";
                                }
                            
                            ?>
                            <br >
                            <span class="text-success"><small>Homecell</small></span>
                        </div>
                        <div class="col-md-3 col-3 text-right">
                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="row">
                        <div class="col-md-2 col-2">
                            <div class="avatar">
                                <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                            </div>
                        </div>
                        <div class="col-ms-7 col-7">
                            <?php
                                
                                $tblquery = "SELECT * FROM churches WHERE id = :id";
                                $tblvalue = array(
                                    ':id' => $_SESSION['church_id']
                                );
                                $home = $connect->tbl_select($tblquery, $tblvalue);
                                if($home){
                                    foreach($home as $data){
                                        extract($data);
                                        echo "$name";
                                    }
                                }else{
                                    echo "No Church";
                                }
                            
                            ?>
                            <br>
                            <span class="text-danger"><small>Branch</small></span>
                        </div>
                        <div class="col-md-3 col-3 text-right">
                            <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="col-md-8">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Edit Profile</h5>
        </div>
        <div class="card-body">
            <form>
                <?php
                
                    $tblquery = "SELECT * FROM members WHERE id = :id";
                    $tblvalue = array(
                        ':id' => $_SESSION['view_member_id']
                    );
                    $view = $connect->tbl_select($tblquery, $tblvalue);
                    foreach($view as $data){
                        extract($data);
                        echo "
                            <div class='row'>
                                <div class='col-md-5 pr-1'>
                                    <div class='form-group'>
                                        <label>Last Name</label>
                                        <input type='text' class='form-control' value='$last_name' readonly>
                                    </div>
                                </div>
                                <div class='col-md-3 px-1'>
                                    <div class='form-group'>
                                        <label>First Name</label>
                                        <input type='text' class='form-control' value='$first_name' readonly>
                                    </div>
                                </div>
                                <div class='col-md-4 pl-1'>
                                    <div class='form-group'>
                                        <label>Other</label>
                                        <input type='text' class='form-control' value='$other_name' readonly>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                            <div class='col-md-6 pr-1'>
                                    <div class='form-group'>
                                        <label>Email</label>
                                        <input type='email' class='form-control' value='$email' readonly>
                                    </div>
                                </div>
                                <div class='col-md-6 pl-1'>
                                    <div class='form-group'>
                                        <label>Mobile Number</label>
                                        <input type='tel' class='form-control' value='$number' readonly>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='form-group'>
                                        <label>Address</label>
                                        <textarea class='form-control textarea' readonly>$address</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-3 pr-1'>
                                    <div class='form-group'>
                                        <label>Sex</label>
                                        <input type='text' class='form-control' value='$sex' readonly>
                                    </div>
                                </div>
                                <div class='col-md-3 px-1'>
                                    <div class='form-group'>
                                        <label>Marital Status</label>
                                        <input type='text' class='form-control' value='$marital_status' readonly>
                                    </div>
                                </div>
                                <div class='col-md-3 px-1'>
                                    <div class='form-group'>
                                        <label>DOB</label>
                                        <input type='date' class='form-control' value='$dob' readonly>
                                    </div>
                                </div>
                                <div class='col-md-3 pl-1'>
                                    <div class='form-group'>
                                        <label>Baptise</label>
                                        <input type='date' class='form-control' value='$baptise' readonly>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-5 pr-1'>
                                    <div class='form-group'>
                                        <label>LGA</label>
                                        <input type='text' class='form-control' value='$lga' readonly>
                                    </div>
                                </div>
                                <div class='col-md-3 px-1'>
                                    <div class='form-group'>
                                        <label>State</label>
                                        <input type='text' class='form-control' value='$state' readonly>
                                    </div>
                                </div>
                                <div class='col-md-4 pl-1'>
                                    <div class='form-group'>
                                        <label>Country</label>
                                        <input type='text' class='form-control' value='$country' readonly>
                                    </div>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col-md-5 pr-1'>
                                    <div class='form-group'>
                                        <label>Continent</label>
                                        <input type='text' class='form-control' value='$continent' readonly>
                                    </div>
                                </div>
                                <div class='col-md-3 px-1'>
                                    <div class='form-group'>
                                        <label>Last Login</label>
                                        <input type='text' class='form-control' value='$login' readonly>
                                    </div>
                                </div>
                                <div class='col-md-4 pl-1'>
                                    <div class='form-group'>
                                        <label>Reg Date</label>
                                        <input type='text' class='form-control' value='$date' readonly>
                                    </div>
                                </div>
                            </div>
                        ";
                    }
                
                ?>
            </form>
        </div>
    </div>
</div>