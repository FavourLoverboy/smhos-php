<?php
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);

        $tblquery = "INSERT INTO attendance VALUES(:id, :addedBy, :user, :c_id, :h_id, :theme_id, :date)";
        $tblvalue = array(
            ':id' => NULL,
            ':addedBy' => $_SESSION['myId'],
            ':user' => htmlspecialchars($member_id),
            ':c_id' => htmlspecialchars($church_id),
            ':h_id' => htmlspecialchars($homecell_id),
            ':theme_id' => htmlspecialchars($_SESSION['theme_id']),
            ':date' => date("Y-m-d h:i:s")
        );
        $insert = $connect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            array_push($_SESSION['signedIn'], $member_id);
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
                                
                                $tblquery = "SELECT * FROM members WHERE homecell_id = :id";
                                $tblvalue = array(
                                    ':id' => $_SESSION['homecell_id']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        if(!(in_array($id, $_SESSION['signedIn']))){
                                            echo "
                                                <tr>
                                                    <td>$last_name $first_name $other_name</td>
                                                    <td>
                                                        <form method='post' action=''>
                                                            <input type='hidden' name='member_id' value='$id'>
                                                            <input type='hidden' name='member_name' value='$last_name $first_name $other_name'>
                                                            <input type='hidden' name='church_id' value='$church_id'>
                                                            <input type='hidden' name='homecell_id' value='$homecell_id'>
                                                            <input type='submit' class='btn btn-success btn-sm' value='sign in'>
                                                        </form>
                                                    </td>
                                                </tr>
                                            ";
                                        }
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='6'>There is no Theme</td>
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