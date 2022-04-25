<?php 
    require_once'./function_signup.php';
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
                    <h2 class="alert-heading ">Registration Here!</h2>
                    <p>Please enter your personal information for Resistration.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-8">

                <form class="row g-3" action="signup.php" method="POST">
                    <div class=" col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" placeholder="Type your Name" id="name" name="name">
                        <?php echo "<p class='text-danger'>$name_error</p>"; ?>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Type your Email. Ex.: name@domain.com"
                            id="email" name="email">
                        <?php echo "<p class='text-danger'>$email_error</p>"; ?>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Type your Password" id="password"
                            name="password">
                        <?php echo "<p class='text-danger'>$password_error</p>";?>
                    </div>

                    <div class="col-auto mt-4">
                        <label class="visually-hidden" for="userRole">User Role</label>
                        <select class="form-select" id="userRole" name="userRole">
                            <!-- <option selected>Choose...</option> -->
                            <option value="administration" id="userRole" name="administration">Administrator</option>
                            <option value="genderalUser" id="userRole" name="genderalUser">General User</option>
                        </select>
                        <?php echo "<p class='text-danger'>$role_error</p>"; ?>
                    </div>

                    <!-- <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address 2</label>
                        <input type="text" class="form-control" id="inputAddress2"
                            placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div> -->

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                    </div>
                </form>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php">Go to the Login Page</a>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>