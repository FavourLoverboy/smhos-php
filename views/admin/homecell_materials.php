<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <a href="add_homecell_material">
                        <button type="button" class="btn btn-info ml-2">Add Material</button>
                    </a>
                </div>
            </div>
            <div class="card-header">
                <h4 class="card-title">Materials</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table">
                        <thead class=" text-primary">
                            <th>Date</th>
                            <th>Post By</th>
                            <th>Topic</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT members.last_name, members.first_name, members.other_name, material.id as ids, material.topic, material.content, material.date FROM members INNER JOIN material ON members.id = material.user ORDER BY material.id DESC";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <tr>
                                                <td>$date</td>
                                                <td>$last_name $first_name $other_name</td>
                                                <td>$topic</td>
                                                <td class='text-right'>
                                                    <form method='post' action=''>
                                                        <input type='hidden' name='id' value='$ids'>
                                                        <input type='hidden' name='topic' value='$topic'>
                                                        <input type='hidden' name='content' value='$content'>
                                                        <input type='submit' class='btn btn-success btn-sm' value='view'>
                                                    </form>
                                                </td>
                                            </tr>
                                        ";
                                        
                                    }
                                }else{
                                    echo "
                                        <tr>
                                            <td colspan='6'>There is no Testimony</td>
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
        $_SESSION['view_id'] = $id;
        $_SESSION['view_topic'] = $topic;
        $_SESSION['view_content'] = $content;
        echo "<script>  window.location='view_prayer' </script>";
    }
?>