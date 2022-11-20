<?php
    $_SESSION['Message'] = '';
    $_SESSION['MessageOther'] = '';
    $_SESSION['hname'] = '';
    if($_POST['send']){
        extract($_POST);


        if(!($_SESSION['homecell_id'] == $homecell)){

            $tblquery = "UPDATE changehomecell SET status = :status WHERE user = :id AND status = '0'";
            $tblvalue = array(
                ':status' => '1',
                ':id' => $_SESSION['myId'],
            );
            $update = $connect->tbl_update($tblquery, $tblvalue);

            $tblquery = "INSERT INTO changehomecell VALUES(:id, :homcecell, :user, :date, :status)";
            $tblvalue = array(
                ':id' => NULL,
                ':homcecell' => $homecell,
                ':user' => $_SESSION['myId'],
                ':date' => date("Y-m-d h:i:s"),
                ':status' => '0'
            );
            $insert = $connect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                $_SESSION['MessageOther'] = "Request Sent";
                $findHomecell = '';
            }
        }else{
            $_SESSION['MessageOther'] = "You are already a member of the homecell";
        }
    }

    if($_POST['proceed']){
        extract($_POST);
        $_SESSION['hname'] = $hname;

        $tblquery = "SELECT * FROM homecells WHERE name LIKE :name";
        $tblvalue = array(
            ':name' => htmlspecialchars(ucwords($hname))
        );
        $findHomecell = $connect->tbl_select($tblquery, $tblvalue);
        if($findHomecell){
            foreach($findHomecell as $data){
                extract($data);
                $tblquery = "SELECT name FROM churches WHERE id = :id";
                $tblvalue = array(
                    ':id' => $church_id
                );
                $findChurch = $connect->tbl_select($tblquery, $tblvalue);
                foreach($findChurch as $data){
                    extract($data);
                    $_SESSION['church_name'] = $name;
                }
            }
        }else{
            $_SESSION['MessageOther'] = 'No match for the name';
        }
    }
?>

<?php 
    if($findHomecell){
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
                                        <th>Select</th>
                                    </thead>
                                    <tbody>
        ";
        
        foreach($findHomecell as $data){
            extract($data);
            echo "
                <tr>
                    <td>$name</td>
                    <td>$_SESSION[church_name]</td>
                    <td>
                        <form method='post' action=''>
                            <input type='hidden' name='homecell' value='$id'>
                            <input type='submit' name='send' class='btn btn-info' value='send request'>
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
                            <h5 class='card-title'>Choose Homecell</h5>
                            <label style='color: red;font-size:20px;'>$_SESSION[MessageOther]</label>
                        </div>
                        <div class='card-body'>
                            <form action='' method='post'>
                                <div class='row'>
                                    <div class='col-md-6 pl-3'>
                                        <div class='form-group'>
                                            <label for='name'>Homecell Name</label>
                                            <input type='text' class='form-control' name='hname' placeholder='enter homecell name' value='$_SESSION[hname]' required>
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