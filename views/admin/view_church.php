<h4 class="card-title"><?php echo $_SESSION['view_church_name']; ?></h4>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-users text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Members</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS allMembers FROM members WHERE church_id = :church_id";
                                $tblvalue = array(
                                    ':church_id' => $_SESSION['view_church_id']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo "
                                        <p class='card-title'>$allMembers<p>
                                    ";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    All Members
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fa fa-home text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Homecells</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS allHomecells FROM homecells WHERE church_id = :church_id";
                                $tblvalue = array(
                                    ':church_id' => $_SESSION['view_church_id']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    echo "
                                        <p class='card-title'>$allHomecells<p>
                                    ";
                                }
                            
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    All Homecells
                </div>
            </div>
        </div>
    </div>
</div>
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
                            
                                $tblquery = "SELECT * FROM members WHERE church_id = :church_id";
                                $tblvalue = array(
                                    ':church_id' => $_SESSION['view_church_id']
                                );
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
                                                    <form method='post'>
                                                        <input type='hidden' name='member_id' value='$id'>
                                                        <input type='submit' name='view' class='btn btn-success btn-sm' value='view'>
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
                            <th>Members</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                            
                                $tblquery = "SELECT homecells.id, homecells.name, homecells.address, COUNT(members.id) AS members FROM homecells INNER JOIN members ON homecells.id = members.homecell_id  WHERE homecells.church_id = :church_id GROUP BY members.homecell_id ORDER BY members";
                                $tblvalue = array(
                                    ':church_id' => $_SESSION['view_church_id']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <tr>
                                                <td>$name</td>
                                                <td>$address</td>
                                                <td>$members</td>
                                                <td class='text-right'>
                                                    <form method='post'>
                                                        <input type='hidden' name='homecell_id' value='$id'>
                                                        <input type='hidden' name='homecell_name' value='$name'>
                                                        <input type='submit' name='view_homecell' class='btn btn-success btn-sm' value='view'>
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
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th class="text-right">View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $tblquery = "SELECT members.id, members.last_name, members.first_name, members.other_name, members.email, tbl_leaders.date FROM members INNER JOIN tbl_leaders ON members.id = tbl_leaders.user_id WHERE tbl_leaders.lead_id = :church_id && tbl_leaders.status = :status";
                                $tblvalue = array(
                                    ':church_id' => $_SESSION['view_church_id'],
                                    ':status' => '1'
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <tr>
                                                <td>$last_name $first_name $other_name</td>
                                                <td>$email</td>
                                                <td>$date</td>
                                                <td class='text-right'>
                                                    <form method='post'>
                                                        <input type='hidden' name='member_id' value='$id'>
                                                        <input type='submit' name='view' class='btn btn-success btn-sm' value='view'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='4'>There is no Leader for this Church</td>
                                        </tr>
                                    ";
                                }                              
                            
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-right">
                                    <a href="add_church_leader" class='btn btn-success btn-sm'>add</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <a href="change_church_name">
            <button type="button" class="btn btn-info ml-2">Change Name</button>
        </a>
    </div>
</div>
<?php 

    if($_POST['view']){
        extract($_POST);
        $_SESSION['view_member_id'] = $member_id;
        echo "<script>  window.location='view_member' </script>";
    }
    if($_POST['view_homecell']){
        extract($_POST);
        $_SESSION['view_homecell_id'] = $homecell_id;
        $_SESSION['view_homecell_name'] = $homecell_name;
        echo "<script>  window.location='view_homecell' </script>";
    }

?>
