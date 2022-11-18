<?php
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);

        $tblquery = "INSERT INTO attendance VALUES(:id, :addedBy, :user, :c_id, :h_id, :theme_id, :date)";
        $tblquery = "UPDATE attendance SET addedBy = :ad, h_id = :hi, date = :date WHERE user = :user AND theme_id = :theme_id";
        $tblvalue = array(
            ':ad' => $_SESSION['myId'],
            ':hi' => htmlspecialchars($homecell_id),
            ':date' => date("Y-m-d h:i:s"),
            ':user' => htmlspecialchars($member_id),
            ':theme_id' => htmlspecialchars($_SESSION['theme_id'])
        );
        $insert = $connect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            $_SESSION['Message'] = "$member_name just sign in";
            echo "<script>  window.location='attendance' </script>";
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
                                
                                $tblquery = "SELECT attendance.user, members.id, members.last_name, members.first_name, members.other_name, members.homecell_id FROM attendance INNER JOIN members ON attendance.user = members.id WHERE members.homecell_id = :id AND attendance.h_id = ''";
                                $tblvalue = array(
                                    ':id' => $_SESSION['homecell_id']
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
                                                        <input type='hidden' name='homecell_id' value='$homecell_id'>
                                                        <input type='submit' class='btn btn-success btn-sm' value='sign in'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='6'>No More request</td>
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