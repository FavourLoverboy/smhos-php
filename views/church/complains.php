<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Complains</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Date</th>
                            <th>Name</th>
                            <th>picture</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Sex</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT members.last_name, members.first_name, members.other_name, members.email, members.number, members.sex, members.profile, complain.id as ids, complain.content, complain.tag, complain.date FROM members INNER JOIN complain ON members.id = complain.user WHERE members.church_id = :c_id ORDER BY complain.id DESC";
                                $tblvalue = array(
                                    'c_id' => $_SESSION['church_id']
                                );
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        if($tag){
                                            echo "
                                                <tr>
                                                    <td>$date</td>
                                                    <td>$last_name $first_name</td>
                                                    <td>
                                                        <div class='avatar'>
                                                            <img src='../uploads/$profile' alt='Circle Image' class='avatar border-gray'>
                                                        </div>
                                                    </td>
                                                    <td>$email</td>
                                                    <td>$number</td>
                                                    <td>$sex</td>
                                                    <td class='text-right'>
                                                        <form method='post' action=''>
                                                            <input type='hidden' name='tes_id' value='$ids'>
                                                            <input type='hidden' name='profile' value='$profile'>
                                                            <input type='hidden' name='content' value='$content'>
                                                            <input type='hidden' name='name' value='$last_name $first_name $other_name'>
                                                            <input type='submit' class='btn btn-primay btn-sm' value='view'>
                                                        </form>
                                                    </td>
                                                </tr>
                                            ";
                                        }else{
                                            echo "
                                                <tr>
                                                    <td>$date</td>
                                                    <td>$last_name $first_name</td>
                                                    <td>
                                                        <div class='avatar'>
                                                            <img src='../uploads/$profile' alt='Circle Image' class='avatar border-gray'>
                                                        </div>
                                                    </td>
                                                    <td>$email</td>
                                                    <td>$number</td>
                                                    <td>$sex</td>
                                                    <td class='text-right'>
                                                        <form method='post' action=''>
                                                            <input type='hidden' name='tes_id' value='$ids'>
                                                            <input type='hidden' name='profile' value='$profile'>
                                                            <input type='hidden' name='content' value='$content'>
                                                            <input type='hidden' name='name' value='$last_name $first_name $other_name'>
                                                            <input type='submit' class='btn btn-success btn-sm' value='view'>
                                                        </form>
                                                    </td>
                                                </tr>
                                            ";
                                        }
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
<?php
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);
        $_SESSION['view_tes_id'] = $tes_id;
        $_SESSION['view_profile'] = $profile;
        $_SESSION['view_name'] = $name;
        $_SESSION['view_content'] = $content;
        echo "<script>  window.location='view_complains' </script>";
    }
?>