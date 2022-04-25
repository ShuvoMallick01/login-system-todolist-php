<?php 
   define('DB', __DIR__ . "/userData.txt");
//    session_start();

   $error="";
   $name_error="";
   $email_error="";
   $password_error="";
   $role_error= "";
   $get_user_data=[];

   function get_user_list(){
       $get_user_data= file_get_contents(DB) ? json_decode(file_get_contents(DB), true) : [];
       return $get_user_data;
   }

   if(isset($_POST['submit'])){
        if(isset($_POST['name']) && !empty($_POST['name'])){
            $user_name= htmlspecialchars($_POST['name']);
        } else{
            $name_error="Name is required";
        }

        if(isset($_POST['email']) && !empty($_POST['email'])){
            $user_email= filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        } else{
            $email_error="Email is required";
        }

        if(isset($_REQUEST['password']) && !empty($_POST['password'])){
            $user_password= $_REQUEST['password'];
        } else{
            $password_error="Password is required";
        }

        if(isset($_POST['userRole']) && !empty($_POST['userRole'])){
            $user_roll= filter_input(INPUT_POST, 'userRole');
        } else{
            $role_error="User Role is required";
        }
        
        if(isset($user_name) && isset($user_email) && isset($user_password) && isset($user_roll)){
            $get_userdata_list= get_user_list();

            $new_user= array(
                "id"    => count($get_userdata_list),
                "username" => $user_name,
                "useremail" => $user_email,
                "userpassword" => $user_password,
                "userrole" => $user_roll,
            );
            
            // print_r($new_user);
            
            array_push($get_userdata_list, $new_user);
            file_put_contents(DB, json_encode($get_userdata_list));
            
            echo "<script type='text/javascript'>alert('Signup Successfully Completed!'); window.location.href='index.php';</script>";

            // header('location: signup.php');
        }
        
        
   }



   
?>