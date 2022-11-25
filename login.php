<?php include('includes/authenticate/header.php');?>
<?php 
$errMessage = "";
    if($_POST){
        extract($_POST);
        $encryptPassword = $connect->epass($password);

        // Validating Email
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['validate_email'] = true;
        }

        if($_SESSION['validate_email'] == true){
            // Checking for email or username
            $tblquery = "SELECT * FROM members WHERE (email = :login || username = :login)";
            $tblvalue = array(
                ':login' => htmlspecialchars($email)
            );
            $emailCheck = $connect->tbl_select($tblquery, $tblvalue);
            if($emailCheck){
                $tblquery = "SELECT * FROM members WHERE (email = :login || username = :login) && password = :password";
                $tblvalue = array(
                    ':login' => htmlspecialchars($email),
                    ':password' => htmlspecialchars($encryptPassword)
                );
                // print_r($tblvalue);
                $login = $connect->tbl_select($tblquery, $tblvalue);
                if($login){
                    $tblquery = "SELECT * FROM members WHERE (email = :login || username = :login) AND status = :status";
                    $tblvalue = array(
                        ':login' => htmlspecialchars($email),
                        ':status' => '1'
                    );
                    // print_r($tblvalue);
                    $statusCheck = $connect->tbl_select($tblquery, $tblvalue);
                    if($statusCheck){
                        $tblquery = "UPDATE members SET login = :date WHERE email = :email";
                        $tblvalue = array(
                            ':date' => date("Y-m-d h:i:s"),
                            ':email' => htmlspecialchars($email)
                        );
                        $update = $connect->tbl_update($tblquery, $tblvalue);

                        foreach($statusCheck as $data){
                            extract($data);
                            $_SESSION['myId'] = $id;
                            $_SESSION['email'] = $email;
                            $_SESSION['username'] = $username;
                            $_SESSION['password'] = $password;
                            $_SESSION['homecell_id'] = $homecell_id;
                            $_SESSION['church_id'] = $church_id;
    
                            echo "<script>  window.location='member/dashboard' </script>";
                        }
                    }else{
                        $errMessage = "you account has been disabled, meet any of the admintratives for further information.";
                    }
                }else{
                    $errMessage = "wrong login credentials";
                }
            }else{
                $errMessage = "email or username don't exist";
            }
        }else{
            $errMessage = 'invalid email';
        }
    }
?>
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image2"></div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-left">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
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
    </div>

<?php include('includes/authenticate/footer.php');?>