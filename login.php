<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/sessions.php"); ?>
<?php 
if(isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  
 if(empty($username) || empty($password)) {
    $_SESSION['error'] = "All field must be filled out!";
    redirect("login.php");
  } else {

    $found_Account = loginUser($username, $password);
    if($found_Account) {
        $_SESSION["user_id"] = $found_Account["id"];
        $_SESSION["Username"] = $found_Account["username"];
        $_SESSION["AdminName"] = $found_Account["aname"];
        $_SESSION['success'] = "Welcome ". $_SESSION["AdminName"]. "!";
        redirect("login.php"); 
    } else {
        $_SESSION['error'] = "Incorret user or password!";
    redirect("login.php");
    }
  }

}// send button end!


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <!-- NAVBAR-->
    <div class="line">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarscms"
                    aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarscms">


                    <ul class="navbar-nav ml-auto">
                        <li><a class="nav-link" href="logout.php"> <i class="fa fa-sign-out text-danger"></i> Logout</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </div>
    
    <!-- NAVBAR END-->

    <main role="main">



        <section class="container py-2 mb-4">
            <div class="row">
                <div class="offset-sm-3 col-sm-6 mt-4" style="min-height:660px;">
                    <?php echo message();   echo Successmessage(); ?>

                    <form action="login.php" class="" method="post">
                        <div class="card bg-secondary text-light mb-3">
                            <div class="card-header text-center">
                                <h4>Welcome to our login page</h4>
                            </div>
                            <div class="card-body bg-dark">
                                <div class="form-group">
                                    <label for="username"><span class="fieldinfo"> Username: </span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                        </div>
                                        <input class="form-control" type="text" name="username" id="username"
                                            placeholder="username" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password"><span class="fieldinfo"> Password: </span></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                        </div>
                                        <input class="form-control" type="password" name="password" id="password"
                                            placeholder="password" value="">
                                    </div>
                                </div>

                                <input type="submit" name="submit" class="btn btn-info btn-block" value="Login"></input>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </section>



    </main>

    <footer class="bg-dark text-white">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="lead text-center">
                        <span id="year"></span> &copy; MSZtesz
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div class="line">
        <div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
                integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
                crossorigin="anonymous"></script>
            <script src="js/bootstrap.min.js"></script>
            <script>
                window.jQuery || document.write(
                    '<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
            </script>
            <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf"
                crossorigin="anonymous"></script>

            <script>
                $('#year').text(new Date().getFullYear());
            </script>


</body>


</html>