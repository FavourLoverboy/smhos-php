<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="card-header">
                <h5 class="card-title"><?php echo $_SESSION['view_name']; ?></h5>
                <?php
                    if($_SESSION['Message']){
                        echo "
                            <label style='color: red;font-size:20px;'>$_SESSION[Message]</label>
                        ";
                    }
                ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 pl-3">
                        <div>
                            <img src="<?php echo '../uploads/' . $_SESSION['view_profile']; ?>" class="avatar border-gray" style="height:200px; width: 200px;"/>
                        </div>
                    </div>
                    <div class="col-md-12 pl-3">
                        <?php echo $_SESSION['view_content']; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>