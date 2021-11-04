<?php
    session_start();
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: admin.php");
        exit;
    }
    
    require_once "config.php";
    
    $username = $password = "";
    $username_err = $password_err = $login_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(empty(trim($_POST["username"]))){
            $username_err = "Please enter username.";
        } else{
            $username = trim($_POST["username"]);
        }
        
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter your password.";
        } else{
            $password = trim($_POST["password"]);
        }
        
        if(empty($username_err) && empty($password_err)){
            $sql = "SELECT id, username, password FROM users WHERE username = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = $username;
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){                    
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if(mysqli_stmt_fetch($stmt)){
                            if(password_verify($password, $hashed_password)){
                                session_start();
                                
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            
                                
                                header("location: admin.php");
                            } else{
                                $login_err = "Invalid username or password.";
                            }
                        }
                    } else{
                        $login_err = "Invalid username or password.";
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                mysqli_stmt_close($stmt);
            }
        }
        
        mysqli_close($link);
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php  include 'head.php'; ?>
<link rel="stylesheet" href="login.css">
<body>
    <?php  include 'navbar.php'; ?>  
    <div class="transparan">
        <div class="container">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="mylogin">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
                    <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" placeholder="Username...">
                </div>
                <div class="input-group">
                    <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password...">
                </div>
                <div class="input-group">
                    <button name="submit" class="btn-form">Login</button>
                </div>
                <?php 
                    if(!empty($login_err)){
                ?>        
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong><?php echo $login_err ?></strong>
                    </div>         
                <?php  } ?>
                <br>
                <?php if (!empty($username_err)) { ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong><?php echo $username_err ?></strong>
                        </div>
                <?php } ?>
                <br>
                <?php if(!empty($password_err)) { ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong><?php echo $password_err ?></strong>
                        </div>
                <?php } ?>
                <br>
            </form>
        </div>
    </div>

    <?php  include 'footer.php'; ?>
    <?php  include 'script.php'; ?>
</body>
</html>