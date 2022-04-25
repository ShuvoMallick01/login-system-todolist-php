<?php 
    require_once'./function_todolist.php';
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

    <title>Hello, world!</title>
</head>

<body>
    <div class="container ">
        <div class="row justify-content-md-center">
            <div class=col-md-12>
                <!-- <h2 class="text-center">Login System</h2> -->
                <div class="alert alert-success text-center" role="alert">
                    <h2 class="alert-heading ">WELCOME TO TODO APP</h2>
                    <h5>User ID: <?php echo $_SESSION['login_user_email'] ?></h5>
                    <h5 class="alert-heading">Welcome To Todo List Page </h5>
                    <!-- <p>Please enter your todo list</p> -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <form class="px-4 py-2 align-left" method="POST">
                    <button type="submit" class="btn btn-danger float-right" name="logout">Logout</button>
                </form>

                <header class="px-4 py-2">
                    <h2>Todo App</h2>
                </header>

                <form class="px-4 py-2" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="category_title" name="category_title"
                            placeholder="Add your category title">
                        <?php echo "<p class='text-danger'>$category_title_error</p>"; ?>
                    </div>

                    <div class="mb-3">
                        <input type="number" class="form-control" id="task_id" name="task_id"
                            placeholder="Add your task ID">
                        <?php echo "<p class='text-danger'>$task_id_error</p>"; ?>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="task_name" name="task_name"
                            placeholder="Add your Task">
                        <?php echo "<p class='text-danger'>$task_name_error</p>"; ?>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Add Todo</button>
                </form>

                <?php echo "<p class='text-danger px-4 py-2'>$error</p>"; ?>

                <div class="dropdown-divider"></div>

                <div class="mb-2 px-4 py-2">
                    <!-- <h3>Todo List</h3> -->
                    <?php foreach(get_list() as $get_todo_Data): ?>
                    <?php if($get_todo_Data['userName'] == $_SESSION['login_user_email']): ?>

                    <div class="card card-body bg-light mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5><?php echo $get_todo_Data['todoCategoryTitle']. "<br>" . $get_todo_Data['todoTaskId']. "<br>" .$get_todo_Data['todoTaskName']; ?>
                            </h5>

                            <a href="?id=<?php echo $get_todo_Data['id']; ?>">
                                <i class="bi bi-x-lg text-danger"> X </i>
                            </a>


                        </div>
                    </div>

                    <?php endif; ?>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>