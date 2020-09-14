<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
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
<h1><i class="fa fa-newspaper-o" style="color:#26aae1"></i> Blog Posts</h1>
</div>

<div class="col-lg-3 mb-2">
<a href="add_post.php" class="btn btn-primary btn-block">
<i class="fa fa-edit"></i> Add New Post</a>
</div>
<div class="col-lg-3 mb-2">
<a href="categories.php" class="btn btn-info btn-block">
<i class="fa fa-folder"></i> Add New Category</a>
</div>
<div class="col-lg-3 mb-2">
<a href="admin.php" class="btn btn-warning btn-block">
<i class="fa fa-user-plus"></i> Add New Admin</a>
</div>

<div class="col-lg-3">
<a href="comments.php" class="btn btn-success btn-block">
<i class="fa fa-check"></i> Approve Comments</a>
</div>
</div>

</div>
  
</header>

<!-- NAVBAR END-->

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
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