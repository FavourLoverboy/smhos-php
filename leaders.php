<?php include('includes/authenticate/header.php');?>
    <div class="col-lg-6 d-none d-lg-block bg-login-image2"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-left">
                <h1 class="h4 text-gray-900 mb-4">Login For Leaders</h1>
            </div>   
            <form class="user" method="POST" action="">

                <?php 
                
                    if($errMessage){
                        echo "
                            <div class='row mb-4'>
                                <div class='col-md'></div>
                                <div class='col-md-10'>
                                    <div class='card border-left-danger shadow'>
                                        <div class='card-body'>
                                            <div class='row no-gutters align-items-center'>
                                                <div class='col-auto'>
                                                    $errMessage
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md'></div>
                            </div>
                        ";
                    }
                
                ?>
                
                <div class="form-group">
                    <input type="type" class="form-control form-control-user"
                        id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Your Email..." name="email" value="<?php echo $email; ?>">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password" name="password">
                </div>
        
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                    </div>
                </div>
                <button type="submit" style="font-size:1rem;" class="btn btn-primary btn-user btn-block btn-color-black">
                    Login <i class="fas fa-key"></i>
                </button>
            </form> 
        </div>
    </div>

<?php include('includes/authenticate/footer.php');?>