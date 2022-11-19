<?php

    $tblquery = "SELECT profile FROM members WHERE id = :id";
    $tblvalue = array(
        ':id' => $_SESSION['myId']
    );
    $select = $connect->tbl_select($tblquery, $tblvalue);
    foreach($select as $data){
        extract($data);
        $_SESSION['profilePicture'] = $profile;
    }

    if($_POST['change']){
        extract($_POST);

        //Get the Name of the Uploaded File
        $fileName = $_FILES['img']['name'];

        // Choose where to save the Upload File
        $location = "uploads/".$fileName;

        // Save the uploaded File to the local file system
        if(move_uploaded_file($_FILES['img']['tmp_name'], $location)){
        
        }

        $tblquery = "UPDATE members SET profile = :profile WHERE id = :id";
        $tblvalue = array(
            ':profile' => $fileName,
            ':id' => $_SESSION['myId'],
        );
        $update = $connect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo "<script>  window.location='photo' </script>";
        }
    }

?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title">Profile Picture</h5>
                <?php
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: red;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                ?>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 pl-3">
                            <div>
                                <img src="<?php echo '../uploads/' . $_SESSION['profilePicture']; ?>" class="avatar border-gray" style="height:200px; width: 200px;"  id="output"/>
                                <br>
                                <br>
                                <input type="file" class="form-control" name="img" accept="image/*" onchange="loadFile(event)"  style="color:red;" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                            <input type="submit" name="change" class="btn btn-success btn-round" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script >
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>