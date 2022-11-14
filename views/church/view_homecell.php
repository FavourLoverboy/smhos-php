<h4 class="card-title"><?php echo $_SESSION['view_homecell_name']; ?></h4>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="nc-icon nc-globe text-warning"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Members</p>
                            <?php
                            
                                $tblquery = "SELECT COUNT(id) AS allMembers FROM members WHERE homecell_id = :homecell_id";
                                $tblvalue = array(
                                    ':homecell_id' => $_SESSION['view_homecell_id']
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
                    <i class="fa fa-refresh"></i>
                    Update Now
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
                            <i class="nc-icon nc-money-coins text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Homecells</p>
                            <p class="card-title"><p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-calendar-o"></i>
                    Last day
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
                            <i class="nc-icon nc-vector text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Errors</p>
                            <p class="card-title">23<p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-clock-o"></i>
                    In the last hour
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
                            <i class="nc-icon nc-favourite-28 text-primary"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Followers</p>
                            <p class="card-title">+45K<p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i>
                    Update now
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
                            
                            $tblquery = "SELECT * FROM members WHERE homecell_id = :homecell_id";
                            $tblvalue = array(
                                ':homecell_id' => $_SESSION['view_homecell_id']
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
                <h4 class="card-title">Homecell Leaders</h4>
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
                                
                                $tblquery = "SELECT members.id, members.last_name, members.first_name, members.other_name, members.email, tbl_leaders.date FROM members INNER JOIN tbl_leaders ON members.id = tbl_leaders.user_id WHERE tbl_leaders.lead_id = :homecell_id && tbl_leaders.status = :status";
                                $tblvalue = array(
                                    ':homecell_id' => $_SESSION['view_homecell_id'],
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
                                            <td colspan='4'>There is no Homecell Leader</td>
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
                                <a href="add_homecell_leader" class='btn btn-success btn-sm'>add</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
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