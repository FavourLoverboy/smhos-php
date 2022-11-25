<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Prayers</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>Date</th>
                            <th>Theme</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT prayers.id as ids, prayers.theme, prayers.content, prayers.date FROM members INNER JOIN prayers ON members.id = prayers.postBy ORDER BY prayers.id DESC";
                                $tblvalue = array();
                                $select = $connect->tbl_select($tblquery, $tblvalue);
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        echo "
                                            <tr>
                                                <td>$date</td>
                                                <td>$theme</td>
                                                <td class='text-right'>
                                                    <form method='post' action=''>
                                                        <input type='hidden' name='id' value='$ids'>
                                                        <input type='hidden' name='theme' value='$theme'>
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
        $_SESSION['view_theme'] = $theme;
        $_SESSION['view_content'] = $content;
        echo "<script>  window.location='view_prayer' </script>";
    }
?>