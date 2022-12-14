<?php 
    $_SESSION['Message'] = '';

    if(date('l') != 'Tuesday'){
        echo "<script>  window.location='themes' </script>";
    }

    if($_POST){
        extract($_POST);

        // $day = date('l');
        $day = 'tuesday';
        if($day == 'tuesday'){
            $tblquery = "SELECT * FROM theme ORDER BY date DESC LIMIT 1";
            $tblvalue = array();
            $select = $connect->tbl_select($tblquery, $tblvalue);
            if($select){
                foreach($select as $data){
                    extract($data);
                    $themeDate = substr($date, 0, 10);
                    $currentDate = date("Y-m-d");
                    if(!($themeDate == $currentDate)){
                        $tblquery = "INSERT INTO theme VALUES(:id, :createdBy, :theme, :verse, :date)";
                        $tblvalue = array(
                            ':id' => NULL,
                            ':createdBy' => $_SESSION['myId'],
                            ':theme' => htmlspecialchars(ucwords($new_theme)),
                            ':verse' => htmlspecialchars(ucwords($new_verse)),
                            ':date' => date("Y-m-d h:i:s")
                        );
                        $insert = $connect->tbl_insert($tblquery, $tblvalue);
                        if($insert){
                            $_SESSION['Message'] = 'Theme has been added';
                            $added = true;
                            echo "<script>  window.location='themes' </script>";
                        }
                    }else{
                        $_SESSION['Message'] = 'Theme has already been added for the week';
                    }
                }
            }else{
                $tblquery = "INSERT INTO theme VALUES(:id, :createdBy, :theme, :verse, :date)";
                $tblvalue = array(
                    ':id' => NULL,
                    ':createdBy' => $_SESSION['myId'],
                    ':theme' => htmlspecialchars(ucwords($new_theme)),
                    ':verse' => htmlspecialchars(ucwords($new_verse)),
                    ':date' => date("Y-m-d h:i:s")
                );
                $insert = $connect->tbl_insert($tblquery, $tblvalue);
                if($insert){
                    $_SESSION['Message'] = 'Theme has been added';
                    $added = true;
                    echo "<script>  window.location='themes' </script>";
                }
            }

            if($added){
                $tblquery = "SELECT * FROM theme ORDER BY date DESC LIMIT 1";
                $tblvalue = array();
                $select = $connect->tbl_select($tblquery, $tblvalue);
                foreach($select as $data){
                    extract($data);
                    echo 'this is the theme id ', $id;

                    $tblquery = "SELECT id AS member_id, church_id AS c_id FROM members ORDER BY id";
                    $tblvalue = array();
                    $select = $connect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);

                        $tblquery = "INSERT INTO attendance VALUES(:id, :addedBy, :user, :c_id, :h_id, :theme_id, :date)";
                        $tblvalue = array(
                            ':id' => NULL,
                            ':addedBy' => '',
                            ':user' => $member_id,
                            ':c_id' => $c_id,
                            ':h_id' => '',
                            ':theme_id' => htmlspecialchars($id),
                            ':date' => ''
                        );
                        $insert = $connect->tbl_insert($tblquery, $tblvalue);
                    }
                }
            }
        }else{
            $_SESSION['Message'] = 'Theme can only be added on Tuesdays';
        }
    }

?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Add Theme</h5>
                <?php 
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: red;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                
                ?>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6 pl-3">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="new_theme" placeholder="enter theme name" value="<?php echo $_SESSION['theme']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 pl-3">
                            <div class="form-group">
                                <label for="averse">Bible Verse</label>
                                <textarea id="verse" name="new_verse" class="form-control" placeholder="enter bible verse" required><?php echo $_SESSION['verse']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <button type="submit" class="btn btn-success btn-round">Add Theme</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>