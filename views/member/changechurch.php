<?php
    $_SESSION['Message'] = '';
    $_SESSION['MessageOther'] = '';
    $_SESSION['cname'] = '';
    if($_POST['choose']){
        extract($_POST);

        if(!($_SESSION['church_id'] == $church)){

            $tblquery = "UPDATE members SET church_id = :church WHERE id = :id";
            $tblvalue = array(
                ':church' => $church,
                ':id' => $_SESSION['myId'],
            );
            $update = $connect->tbl_update($tblquery, $tblvalue);
            if($update){
                $_SESSION['MessageOther'] = "Request Sent";
                $findChurch = '';
                $_SESSION['church_id'] = $church;
            }
        }else{
            $_SESSION['MessageOther'] = "You are already a member of the church";
        }
    }

    if($_POST['proceed']){
        extract($_POST);
        $_SESSION['cname'] = $cname;

        $tblquery = "SELECT * FROM churches WHERE name LIKE :name";
        $tblvalue = array(
            ':name' => htmlspecialchars(ucwords($cname))
        );
        $findChurch = $connect->tbl_select($tblquery, $tblvalue);
        if(!$findChurch){
            $_SESSION['MessageOther'] = 'No match for the name';
        }
    }
?>

<?php 
    if($findChurch){
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
                                        <th>Church Name</th>
                                        <th>LGA</th>
                                        <th>State</th>
                                        <th>Select</th>
                                    </thead>
                                    <tbody>
        ";
        
        foreach($findChurch as $data){
            extract($data);
            echo "
                <tr>
                    <td>$name</td>
                    <td>$lga</td>
                    <td>$state</td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='church' value='$id'>
                            <input type='submit' name='choose' class='btn btn-info' value='choose'>
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
                            <h5 class='card-title'>Choose Church</h5>
                            <label style='color: red;font-size:20px;'>$_SESSION[MessageOther]</label>
                        </div>
                        <div class='card-body'>
                            <form action='' method='post'>
                                <div class='row'>
                                    <div class='col-md-6 pl-3'>
                                        <div class='form-group'>
                                            <label for='name'>Church Name</label>
                                            <input type='text' class='form-control' name='cname' placeholder='enter church name' value='$_SESSION[cname]' required>
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