<?php
    $_SESSION['Message'] = '';
    $_SESSION['MessageOther'] = '';
    $_SESSION['lname'] = '';
    $_SESSION['fname'] =  '';

    if(date('l') != 'Tuesday'){
        echo "<script>  window.location='dashboard' </script>";
    }

    if($_POST['sign']){
        extract($_POST);

        $tblquery = "UPDATE attendance SET addedBy = :ad, h_id = :hi, date = :date WHERE user = :user AND theme_id = :theme_id";
        $tblvalue = array(
            ':ad' => $_SESSION['myId'],
            ':hi' => htmlspecialchars($_SESSION['homecell_id']),
            ':date' => date("Y-m-d h:i:s"),
            ':user' => htmlspecialchars($member_id),
            ':theme_id' => htmlspecialchars($_SESSION['theme_id'])
        );
        $update = $connect->tbl_update($tblquery, $tblvalue);
        if($update){
            $_SESSION['Message'] = "$member_name just sign in";
            $select123 = '';
            // echo "<script>  window.location='attendance' </script>";
        }
    }

    if($_POST['proceed']){
        extract($_POST);

        $_SESSION['lname'] = $lname;
        $_SESSION['fname'] =  $fname;

        $tblquery = "SELECT * FROM members WHERE last_name = :ln AND first_name = :fn ORDER BY last_name";
        $tblvalue = array(
            ':ln' => htmlspecialchars(ucwords($lname)),
            ':fn' => htmlspecialchars(ucwords($fname))
        );
        $select123 = $connect->tbl_select($tblquery, $tblvalue);
        if($select123){
            foreach($select123 as $data){
                extract($data);
                $tblquery = "SELECT * FROM churches WHERE id = :id";
                $tblvalue = array(
                    ':id' => $church_id
                );
                $church = $connect->tbl_select($tblquery, $tblvalue);
                foreach($church as $data){
                    extract($data);
                    $_SESSION['church_name'] = $name;
                }

                $tblquery = "SELECT * FROM homecells WHERE id = :id";
                $tblvalue = array(
                    ':id' => $homecell_id
                );
                $homecell = $connect->tbl_select($tblquery, $tblvalue);
                foreach($homecell as $data){
                    extract($data);
                    $_SESSION['homecell_name'] = $name;
                }
            }
        }else{
            $_SESSION['MessageOther'] = 'No match for the name';
        }
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <?php
                    
                        $tblquery = "SELECT * FROM theme ORDER BY id DESC LIMIT 1";
                        $tblvalue = array();
                        $select = $connect->tbl_select($tblquery, $tblvalue);
                        foreach($select as $data){
                            extract($data);
                            $_SESSION['theme_id'] = $id;
                            echo 'Theme: ' . $theme;
                        }
                    
                    ?>
                </h4>
                <?php 
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: green;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                
                ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Name</th>
                            <th>Sign In</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT attendance.user, members.id, members.last_name, members.first_name, members.other_name, members.homecell_id FROM attendance INNER JOIN members ON attendance.user = members.id WHERE members.homecell_id = :id AND attendance.h_id = '' AND attendance.theme_id = :t_id";
                                $tblvalue = array(
                                    ':id' => $_SESSION['homecell_id'],
                                    ':t_id' => $_SESSION['theme_id']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <tr>
                                                <td>$last_name $first_name $other_name</td>
                                                <td>
                                                    <form method='post' action=''>
                                                        <input type='hidden' name='member_id' value='$id'>
                                                        <input type='hidden' name='member_name' value='$last_name $first_name $other_name'>
                                                        <input type='submit' name='sign' class='btn btn-success btn-sm' value='sign in'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='6'>All signed in</td>
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

<?php 

    if($select123){
        echo "
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='card-header'>
                            <h5 class='card-title'>Best Match</h5>
                        </div>
                        <div class='card-body'>
                            <div class='table-responsive'>
                                <table class='table'>
                                    <thead class=' text-primary'>
                                        <th>Name</th>
                                        <th>Church</th>
                                        <th>Homecell</th>
                                        <th>Sign In</th>
                                    </thead>
                                    <tbody>
        ";
        
        foreach($select123 as $data){
            extract($data);
            echo "
                <tr>
                    <td>$last_name $first_name $other_name</td>
                    <td>$_SESSION[church_name]</td>
                    <td>$_SESSION[homecell_name]</td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='member_id' value='$id'>
                            <input type='hidden' name='member_name' value='$last_name $first_name $other_name'>
                            <input type='submit' name='sign' class='btn btn-success btn-sm' value='sign in'>
                        </form>
                    </td>
                </tr>
            ";
        }
        echo "
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }else{
        echo "
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card card-user'>
                        <div class='card-header'>
                            <h5 class='card-title'>Other attendance</h5>
                            <label style='color: red;font-size:20px;'>$_SESSION[MessageOther]</label>
                        </div>
                        <div class='card-body'>
                            <form action='' method='post'>
                                <div class='row'>
                                    <div class='col-md-6 pl-3'>
                                        <div class='form-group'>
                                            <label for='name'>Last Name</label>
                                            <input type='text' class='form-control' name='lname' placeholder='enter last name' value='$_SESSION[lname]' required>
                                        </div>
                                    </div>
                                    <div class='col-md-6 pr-3'>
                                        <div class='form-group'>
                                            <label for='name'>First Name</label>
                                            <input type='text' class='form-control' name='fname' placeholder='enter first name' value='$_SESSION[fname]' required>
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='update ml-auto mr-auto'>
                                        <input type='submit' name='proceed' class='btn btn-success btn-round' value='Proceed'>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }

?>