<div class="accordion" id="accordionExample">
    <div class="row mb-2">
        <div class="col-md-3 p-3 mr-2 accordion-item">
            <h3 class="accordion-header mb-0" id="headingOne">
                <button class="accordion-button btn-info border-0 btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Admin
                </button>
            </h3>
        </div>
        <div class="col-md-3 p-3 accordion-item">
            <h3 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed border-0 btn-warning btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Church
                </button>
            </h3>
        </div>
        <div class="col-md-3 p-3 ml-2 accordion-item">
            <h3 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed border-0 btn-primary btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Host/Hostess
                </button>
            </h3>
        </div>
    </div>

    <!-- Churches -->
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="row">
                            <div class="col-3">
                                <a href="add_admin">
                                    <button type="button" class="btn btn-info ml-2">Add Admin</button>
                                </a>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4 class="card-title">Admin</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Church</th>
                                        <th>Homecell</th>
                                        <th>View</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            $tblquery = "SELECT members.id AS m_id, members.last_name, members.first_name, members.other_name, members.email, members.church_id AS c_id, members.homecell_id AS h_id FROM members INNER JOIN tbl_login ON members.id = tbl_login.user_id WHERE tbl_login.level = 'A'";
                                            $tblvalue = array();
                                            $select =$connect->tbl_select($tblquery, $tblvalue);
                                            if($select){
                                                foreach($select as $data){
                                                    extract($data);

                                                    $tblquery = "SELECT name AS c_name FROM churches WHERE id = $c_id";
                                                    $tblvalue = array();
                                                    $select1 =$connect->tbl_select($tblquery, $tblvalue);
                                                    if($select1){
                                                        foreach($select1 as $data){
                                                            extract($data);
                                                            
                                                            $tblquery = "SELECT name AS h_name FROM homecells WHERE id = $h_id";
                                                            $tblvalue = array();
                                                            $select1 =$connect->tbl_select($tblquery, $tblvalue);
                                                            if($select1){
                                                                foreach($select1 as $data){
                                                                    extract($data);
                                                                    ?>
                                                                    <?php
                                                                        echo "
                                                                            <tr>
                                                                                <td>$last_name $first_name $other_name</td>
                                                                                <td>$email</td>
                                                                                <td>$c_name</td>
                                                                                <td>$h_name</td>
                                                                                <td>
                                                                                    <form action='' method='POST'>
                                                                                        <input type='hidden' name='member_id' value='$m_id'>
                                                                                        <input type='submit' name='view' class='btn btn-info' value='view'>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        ";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }else{
                                                echo "
                                                    <tr>
                                                        <td colspan='6'>There is no Admin</td>
                                                    </tr>
                                                ";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Homecells -->
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Church Leaders</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                    <thead class=" text-primary">
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Church</th>
                                        <th>Homecell</th>
                                        <th>View</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            $tblquery = "SELECT members.id AS m_id, members.last_name, members.first_name, members.other_name, members.email, members.church_id AS c_id, members.homecell_id AS h_id FROM members INNER JOIN tbl_login ON members.id = tbl_login.user_id WHERE tbl_login.level = 'C'";
                                            $tblvalue = array();
                                            $select =$connect->tbl_select($tblquery, $tblvalue);
                                            if($select){
                                                foreach($select as $data){
                                                    extract($data);

                                                    $tblquery = "SELECT name AS c_name FROM churches WHERE id = $c_id";
                                                    $tblvalue = array();
                                                    $select1 =$connect->tbl_select($tblquery, $tblvalue);
                                                    if($select1){
                                                        foreach($select1 as $data){
                                                            extract($data);
                                                            
                                                            $tblquery = "SELECT name AS h_name FROM homecells WHERE id = $h_id";
                                                            $tblvalue = array();
                                                            $select1 =$connect->tbl_select($tblquery, $tblvalue);
                                                            if($select1){
                                                                foreach($select1 as $data){
                                                                    extract($data);
                                                                    ?>
                                                                    <?php
                                                                        echo "
                                                                            <tr>
                                                                                <td>$last_name $first_name $other_name</td>
                                                                                <td>$email</td>
                                                                                <td>$c_name</td>
                                                                                <td>$h_name</td>
                                                                                <td>
                                                                                    <form action='' method='POST'>
                                                                                        <input type='hidden' name='member_id' value='$m_id'>
                                                                                        <input type='submit' name='view' class='btn btn-info' value='view'>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        ";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }else{
                                                echo "
                                                    <tr>
                                                        <td colspan='6'>There is no Church Leader</td>
                                                    </tr>
                                                ";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Members -->
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Host/Hostess</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table">
                                    <thead class=" text-primary">
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Church</th>
                                        <th>Homecell</th>
                                        <th>View</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            $tblquery = "SELECT members.id AS m_id, members.last_name, members.first_name, members.other_name, members.email, members.church_id AS c_id, members.homecell_id AS h_id FROM members INNER JOIN tbl_login ON members.id = tbl_login.user_id WHERE tbl_login.level = 'L'";
                                            $tblvalue = array();
                                            $select =$connect->tbl_select($tblquery, $tblvalue);
                                            if($select){
                                                foreach($select as $data){
                                                    extract($data);

                                                    $tblquery = "SELECT name AS c_name FROM churches WHERE id = $c_id";
                                                    $tblvalue = array();
                                                    $select1 =$connect->tbl_select($tblquery, $tblvalue);
                                                    if($select1){
                                                        foreach($select1 as $data){
                                                            extract($data);
                                                            
                                                            $tblquery = "SELECT name AS h_name FROM homecells WHERE id = $h_id";
                                                            $tblvalue = array();
                                                            $select1 =$connect->tbl_select($tblquery, $tblvalue);
                                                            if($select1){
                                                                foreach($select1 as $data){
                                                                    extract($data);
                                                                    ?>
                                                                    <?php
                                                                        echo "
                                                                            <tr>
                                                                                <td>$last_name $first_name $other_name</td>
                                                                                <td>$email</td>
                                                                                <td>$c_name</td>
                                                                                <td>$h_name</td>
                                                                                <td>
                                                                                    <form action='' method='POST'>
                                                                                        <input type='hidden' name='member_id' value='$m_id'>
                                                                                        <input type='submit' name='view' class='btn btn-info' value='view'>
                                                                                    </form>
                                                                                </td>
                                                                            </tr>
                                                                        ";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }else{
                                                echo "
                                                    <tr>
                                                        <td colspan='6'>There is no Host/Hostess</td>
                                                    </tr>
                                                ";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    if($_POST['view']){
        extract($_POST);
        $_SESSION['view_member_id'] = $member_id;
        echo "<script>  window.location='view_member' </script>";
    }
?>