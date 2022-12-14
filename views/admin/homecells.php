<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <a href="add_homecell">
                        <button type="button" class="btn btn-info ml-2">Add Homecell</button>
                    </a>
                </div>
            </div>

            <div class="card-header">
                <h4 class="card-title">Homecells</h4>
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
                            <th>Address</th>
                            <th>Members</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                                
                                $tblquery = "SELECT homecells.id, homecells.name, homecells.address, COUNT(members.id) AS members FROM homecells INNER JOIN members ON homecells.id = members.homecell_id GROUP BY members.homecell_id ORDER BY members";
                                $tblvalue = array();
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
                                                    <form method='post' action=''>
                                                        <input type='hidden' name='homecell_id' value='$id'>
                                                        <input type='hidden' name='homecell_name' value='$name'>
                                                        <input type='submit' class='btn btn-success btn-sm' value='view'>
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
<?php 
    $_SESSION['Message'] = '';
    $_SESSION['name'] = '';
    $_SESSION['church'] = '';
    $_SESSION['address'] = '';

    if($_POST){
        extract($_POST);
        $_SESSION['view_homecell_id'] = $homecell_id;
        $_SESSION['view_homecell_name'] = $homecell_name;
        echo "<script>  window.location='view_homecell' </script>";
    }
?>