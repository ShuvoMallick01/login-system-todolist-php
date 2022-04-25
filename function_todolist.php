<?php
    session_start();
    
    if(!isset($_SESSION['login_user_email'])){
        header('Location: index.php');
    }
    
    if(isset($_POST['logout'])){
        // session_destroy();
        // $_SESSION['loggedIn']= false;
        // header('Location: index.php');
        unset($_SESSION['login_user_email']);
        unset($_SESSION['$login_user_password']);
        header("Location:index.php");
    } 
        
    define('TodoDB', __DIR__ . "/todolistData.txt");
    // echo TodoDB;
    
    $error="";
    $category_title_error="";
    $task_id_error="";
    $task_name_error="";

    //get All Existing Data From TodoListData.txt
    function get_list(){
        $get_todo_data= file_get_contents(TodoDB)? json_decode(file_get_contents(TodoDB), true) : [];
        return $get_todo_data;
    }

    //get all existing data only current session user
    // function get_session_user_data(){
    //     $this_user_data= ;
    // }

    if(isset($_POST['submit'])){
        if(isset($_POST['category_title']) && !empty($_POST['category_title'])){
            $todo_category_title= htmlspecialchars($_POST['category_title']);
        } else{
            $category_title_error="Enter the Category Title";
        }
        
        if(isset($_POST['task_id']) && !empty($_POST['task_id'])){
            $todo_task_id= htmlspecialchars($_POST['task_id']);
        } else{
            $task_id_error="Enter the Task ID";
        }

        if(isset($_POST['task_name']) && !empty($_POST['task_name'])){
            $todo_task_name= htmlspecialchars($_POST['task_name']);
        } else{
            $task_name_error="Enter your Task";
        }

        if(isset($todo_category_title) && isset($todo_task_id) && isset($todo_task_name)){
            $get_todo_list= get_list();

            $new_todo_list= array(
                "id"=> count($get_todo_list),
                "userName" => $_SESSION['login_user_email'],
                "todoCategoryTitle" => $todo_category_title,
                "todoTaskId" => $todo_task_id,
                "todoTaskName" => $todo_task_name,
            );
            // print_r($new_todo_list);

            array_push($get_todo_list, $new_todo_list);
            file_put_contents(TodoDB, json_encode($get_todo_list));
            header('Location: todo_list.php');

        }else{
            $error="Data input Required!";
        }
        
    }


    //Dete Todo List
    if(isset($_GET['id'])){
        $get_todo= get_list();
        
        foreach($get_todo as $key => $data){
            if($data['id'] == $_GET['id']){
                unset($get_todo[$key]);
                break;
            }
        }
        // print_r($get_todo);

        file_put_contents(TodoDB, json_encode($get_todo));
        // header('Location: todo_list.php');

    }

    

?>