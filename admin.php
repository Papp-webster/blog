<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/sessions.php"); ?>
<?php 
if(isset($_POST['send'])) {

  $username = $_POST['username'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $confpass = $_POST['confirmpass'];
  $admin = "valuk";
  date_default_timezone_set("Europe/Budapest");
  $currentTime = time();
  $dateTime = strftime("%Y.%m.%d %H:%M", $currentTime);

  
  if(empty($username) || empty($password) || empty($confpass)) {
    $_SESSION['error'] = "all field must be filled out!";
    redirect("admin.php");
  } elseif(strlen($password) < 4) {
    $_SESSION['error'] = "You have less than 3 karakter!";
    redirect("admin.php");
  } elseif($password !== $confpass) {
    $_SESSION['error'] = "Password not the same!";
    redirect("admin.php");
  } elseif(checkuser($username)) {
    $_SESSION['error'] = "Username exist try another one!";
    redirect("admin.php");
  } else {

    global $db;
    
    $sql = "INSERT INTO admins(datetime, username, password, aname, added) VALUES (:dateTime, :username, :password, :aname, :adminName);";
    $stmt = $db->prepare($sql);

    
    $stmt->bindValue(':dateTime', $dateTime);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->bindValue(':aname', $name);
    $stmt->bindValue(':adminName', $admin);
    $Execute=$stmt->execute();

    if($Execute){
      $_SESSION['success'] = "new admin {$name} added!!";
      redirect("admin.php");
    } else {
      $_SESSION['error'] = "Something went wrong! Try again!";
      redirect("admin.php");
    }
  }

}// send button end!


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarscms" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarscms">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="profile.php"><i class="fa fa-user-plus text-success"></i> Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="posts.php">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categories.php">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admins</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comments.php">Comments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="blog.php?page=1">Live blog</a>
      </li>
      
    </ul>
   
    <ul class="navbar-nav ml-auto">
    <li><a class="nav-link" href="logout.php"> <i class="fa fa-sign-out text-danger"></i> Logout</a></li>
    </ul>

  </div>
  </div>
</nav>
</div>
<header class="bg-dark text-white py-3">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1><i class="fa fa-user" style="color:#26aae1"></i> Manage Admins</h1>
</div>

</div>

</div>
  
</header>

<!-- NAVBAR END-->

<main role="main">



  <section class="container py-2 mb-4">
    <div class="row">
      <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
      <?php echo message();   echo Successmessage(); ?>
      
      <form action="admin.php" class="" method="post">
      <div class="card bg-secondary text-light mb-3">
      <div class="card-header">
      <h1>Add new Admin</h1>
      </div>
      <div class="card-body bg-dark">
       <div class="form-group">
       <label for="username"><span class="fieldinfo"> Username: </span></label>
       <input class="form-control" type="text" name="username" id="username" value="">
       </div>
      <div class="form-group">
       <label for="name"><span class="fieldinfo"> Name: </span></label>
       <input class="form-control" type="text" name="name" id="name" value="">
       <small class="text-muted">Optional</small>
       </div>
       <div class="form-group">
       <label for="password"><span class="fieldinfo"> Password: </span></label>
       <input class="form-control" type="password" name="password" id="password" value="">
       </div>
       <div class="form-group">
       <label for="confirmpass"><span class="fieldinfo"> Confirm password: </span></label>
       <input class="form-control" type="password" name="confirmpass" id="confirmpass" value="">
       </div>
       <div class="row">
       <div class="col-lg-6 mb-2">
       <a href="dashboard.php" class="btn btn-warning btn-block"><i class="fa fa-arrow-left"></i> Back to dashboard  </a>
       </div>
        <div class="col-lg-6 mb-2">
       <button type="submit" name="send" class="btn btn-success btn-block"><i class="fa fa-check"></i> Publish  </button>
       </div>
       </div>
      
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
<div class="line"><div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>

<script>
$('#year').text(new Date().getFullYear());
</script>


</body>


</html>