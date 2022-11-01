<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-3">
                    <a href="add_church">
                        <button type="button" class="btn btn-info ml-2">Add Church</button>
                    </a>
                </div>
            </div>

            <div class="card-header">
                <h4 class="card-title">Churches</h4>
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
                            <th>S/N</th>
                            <th>Name</th>
                            <th>LGA</th>
                            <th>Country</th>
                            <th>Homecells</th>
                            <th class="text-right">View</th>
                        </thead>
                        <tbody>
                            <?php
                            
                                $tblquery = "SELECT churches.id, churches.name, churches.lga, churches.country, COUNT(homecells.church_id) AS homecells FROM churches INNER JOIN homecells ON churches.id = homecells.church_id GROUP BY homecells.church_id ORDER BY homecells";
                                $tblvalue = array();
                                $select =$connect->tbl_select($tblquery, $tblvalue);
                                $si = 1;
                                if($select){
                                    foreach($select as $data){
                                        extract($data);
                                        ?>
                                        <?php
                                            echo "
                                                <tr>
                                                    <td>$si</td>
                                                    <td>$name</td>
                                                    <td>$lga</td>
                                                    <td>$country</td>
                                                    <td>$homecells</td>
                                                    <td>
                                                        <form action='' method='POST'>
                                                            <input type='hidden' name='id' value='$id'>
                                                            <input type='hidden' name='name' value='$name'>
                                                            <button class='btn btn-info btn-sm'>view</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            ";
                                            $si++;
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

<?php
    $_SESSION['Message'] = '';
    if($_POST){
        extract($_POST);
        $_SESSION['view_church_id'] = $id;
        $_SESSION['view_church_name'] = $name;
        echo "<script>  window.location='view_church' </script>";
    }
?>