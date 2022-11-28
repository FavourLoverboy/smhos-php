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
                                        <th>LGA</th>
                                        <th>Country</th>
                                        <th>View</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                            $tblquery = "SELECT * FROM churches ORDER BY name";
                                            $tblvalue = array();
                                            $select =$connect->tbl_select($tblquery, $tblvalue);
                                            if($select){
                                                foreach($select as $data){
                                                    extract($data);
                                                    ?>
                                                    <?php
                                                        echo "
                                                            <tr>
                                                                <td>$name</td>
                                                                <td>$lga</td>
                                                                <td>$country</td>
                                                                <td>
                                                                    <form action='' method='POST'>
                                                                        <input type='hidden' name='church_id' value='$id'>
                                                                        <input type='hidden' name='church_name' value='$name'>
                                                                        <input type='submit' name='view_church' class='btn btn-info' value='view'>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        ";
                                                }
                                            }else{
                                                echo "
                                                    <tr>
                                                        <td colspan='6'>There is no Church</td>
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
                            <h4 class="card-title">Homecells</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th class="text-right">View</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            $tblquery = "SELECT * FROM homecells ORDER BY name";
                                            $tblvalue = array();
                                            $select = $connect->tbl_select($tblquery, $tblvalue);
                                            if($select){
                                                foreach($select as $data){
                                                    extract($data);
                                                    echo "
                                                        <tr>
                                                            <td>$name</td>
                                                            <td>$address</td>
                                                            <td class='text-right'>
                                                                <form method='post' action=''>
                                                                    <input type='hidden' name='homecell_id' value='$id'>
                                                                    <input type='hidden' name='homecell_name' value='$name'>
                                                                    <input type='submit' name='view_homecell' class='btn btn-warning' value='view'>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    ";
                                                }
                                            }else{
                                                echo "
                                                    <tr>
                                                        <td colspan='6'>There is no Homecell</td>
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
                            <h4 class="card-title">Members</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Sex</th>
                                        <th>Number</th>
                                        <th>Marital Status</th>
                                        <th class="text-right">View</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            $tblquery = "SELECT * FROM members ORDER BY last_name";
                                            $tblvalue = array();
                                            $select = $connect->tbl_select($tblquery, $tblvalue);
                                            if($select){
                                                foreach($select as $data){
                                                    extract($data);
                                                    echo "
                                                        <tr>
                                                            <td>$last_name $first_name $other_name</td>
                                                            <td>$email</td>
                                                            <td>$sex</td>
                                                            <td>$number</td>
                                                            <td>$marital_status</td>
                                                            <td class='text-right'>
                                                                <form method='post' action=''>
                                                                    <input type='hidden' name='member_id' value='$id'>
                                                                    <input type='hidden' name='member_name' value='$last_name $first_name $other_name'>
                                                                    <input type='submit' name='view_member' class='btn btn-primary' value='view'>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    ";
                                                }
                                            }else{
                                                echo "
                                                    <tr>
                                                        <td colspan='6'>There is no Member</td>
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
    if($_POST['view_church']){
        extract($_POST);
        $_SESSION['view_church_att_id'] = $church_id;
        $_SESSION['view_church_att_name'] = $church_name;
        echo "<script>  window.location='view_church_attendance' </script>";
    }

    if($_POST['view_homecell']){
        extract($_POST);
        $_SESSION['view_homecell_att_id'] = $homecell_id;
        $_SESSION['view_homecell_att_name'] = $homecell_name;
        echo "<script>  window.location='view_homecell_attendance' </script>";
    }

    if($_POST['view_member']){
        extract($_POST);
        $_SESSION['view_member_att_id'] = $member_id;
        $_SESSION['view_member_att_name'] = $member_name;
        echo "<script>  window.location='view_member_attendance' </script>";
    }
?>