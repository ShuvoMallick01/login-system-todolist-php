<?php 
   define('DB', __DIR__ . "/userData.txt");
   session_start();

   if(isset($_SESSION['login_user_email'])){
      header('Location: todo_list.php');
   }

   $login_email_error="";
   $login_password_error= "";
   $login_user_email="";
   $login_user_password= "";
   $success_alert= "";
   $error_login="";
    
   
   //get All existing Data From Database
   function get_user_list(){
    $get_user_data= file_get_contents(DB) ? json_decode(file_get_contents(DB), true) : [];
    return $get_user_data;
    
    }
    // print_r(Get_user_list());
    
    
    //Verify Login User Email & Password
    function check_login_info($Login_email, $login_pass){
        $user_list= get_user_list();
        
        foreach($user_list as $value){
            if($value['useremail'] == $Login_email && $value['userpassword'] == $login_pass){
                return true; 
                break;
            }
        }
        return false; 
    }


   if(isset($_POST['loggedIn'])){
        if(isset($_POST['loginEmail']) && !empty($_POST['loginEmail'])){
            $_SESSION['login_user_email']= htmlspecialchars($_POST['loginEmail']);
        } else{
            // $login_email_error="User Email is required";
        }
        
        if(isset($_POST['loginPassword']) && !empty($_POST['loginPassword'])){
            $_SESSION['login_user_password']= htmlspecialchars($_POST['loginPassword']);
        } else{
            // $login_password_error="User Password is required";
        }

        if(isset($_SESSION['login_user_email']) && isset($_SESSION['login_user_password'])){
            $login_user_email= $_SESSION['login_user_email'];
            $login_user_password= $_SESSION['login_user_password'];

            $user_is_exists= check_login_info($login_user_email, $login_user_password);
            if($user_is_exists){
                // $success_alert= "User is there";
                $_SESSION['loggedIn']= true;
                // echo "<script type='text/javascript'>alert('Login Successfully'); window.location.href='todo_list.php';</script>";
                header('Location:todo_list.php');
            }else{
                $error_login="Invalid Login"; 
            }
        }

        // header('Location: index.php');
   }

   if(isset($_POST['logout'])){
       session_destroy();
       $_SESSION['loggedIn']= false;
       header('Location: index.php');
   }

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Login System</title>
</head>

<body>
    <div class="container ">
        <div class="row justify-content-md-center">
            <div class=col-md-12>
                <!-- <h2 class="text-center">Login System</h2> -->
                <div class="alert alert-success text-center" role="alert">
                    <h2 class="alert-heading ">Login Here!</h2>
                    <h5 class="alert-heading">Welcome To Our App Login System</h5>
                    <p>Please enter your credentials to Login.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">

                <form class=" px-4 py-2" method="POST">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" name="loginEmail"
                            placeholder="email@example.com">
                        <?php echo "<p class='text-danger'>$login_email_error</p>"; ?>
                    </div>

                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword"
                            placeholder="Password">
                        <?php echo "<p class='text-danger'>$login_password_error</p>"; ?>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="dropdownCheck">
                            <label class="form-check-label" for="dropdownCheck">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="loggedIn">Sign in</button>
                </form>

                <?php echo "<p class='text-danger'>$error_login</p>"; ?>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="signup.php">New around here? Sign
                    up</a>
                <a class="dropdown-item" href="#">Forgot password?</a>

            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>