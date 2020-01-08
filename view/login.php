<!doctype html>
<?php
// error_reporting(0);
    session_start();
    if(!empty($_SESSION['user_id']))
    {
        if($_SESSION['level'] == 'operator'){
            header("Location: ../user/operator/dashboard-operator.php");
        }
        elseif($_SESSION['level'] == 'peminjam'){
            header("Location: ../user/peminjam/dashboard-peminjam.php");
        }
        else{
            $login_error_message = 'Password Atau Username salah';
        }
    }

    $login_error_message = "";
    // Application library ( with DemoLib class )
    require_once("loginClass.php");
        $app = new Validations();

    if (!empty($_POST['Login'])) {
 
        $username = ($_POST['username']);
        $password = ($_POST['password']);
     
        if ($username == "") {
            $login_error_message = 'Kolom username harus diisi!';
        } else if ($password == "") {
            $login_error_message = 'Kolom password harus diisi!';
        } else {
            $user = $app->Login($username, $password); // check user login
            if($user !== NULL)
            {
                $_SESSION['user_id'] = $user->id_user;
                $_SESSION['level'] = $user->nama_level;
                if($user->nama_level == "operator"){
                    header("Location: ../user/operator/dashboard-operator.php");
                }
                elseif($user->nama_level == 'peminjam'){
                    header("Location: ../user/peminjam/dashboard-peminjam.php");
                }
                else{
                    $login_error_message = 'Password Atau Username salah';
                }
            }
        }
    }
?>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>

        <link rel="stylesheet" href="../assets/argon/assets/css/argon.css">
        <link rel="stylesheet" href="../assets/css/login.css">
        <link rel="shortcut icon" type="image/x-icon" href="../assets/icon/logo.png">
        <script src="../assets/argon/assets/js/argon.js"></script>
        <script src="../assets/argon/assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/argon/assets/vendor/popper/popper.min.js"></script>
        <script src="../assets/argon/assets/vendor/bootstrap/bootstrap.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col" style="height:70vh;background-color: whitesmoke;">
                    <img src="../assets/img/icon-login.svg" alt="icon-login" class="icon-login">
                </div>
                
            </div>
            <div class="row">
                <div class="col" style="height:30vh;background-color: #e4e4e4; z-index: -10;">
                    
                </div>
            </div>
            <div class="row">
                <div class="container log-form form-group">
                    <div class="row">
                        <div class="col">
                            <h1 class="display-1 myFormHead">Login</h1>
                        </div>
                    </div>
                    <form class="box" action="login.php" method="POST">
                        <div class="form-group">
                            <label for="usernameId">Username</label>
                            <input type="text" name="username" class="form-control" id="usernameId" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" class="form-control" id="pass" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary" name="Login" value="Login">Submit</button><button type="submit" class="btn btn-primary" value="Login"><a style="color: white;" href="../index.php">Kembali</a></button>
                        <?php
                            if ($login_error_message != "") {
                                echo '<div class="alert"><strong>Error: </strong> ' . $login_error_message . '</div>';
                            }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>