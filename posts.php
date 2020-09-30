<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/sessions.php"); ?>

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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarscms"
          aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
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

  <!-- Main -->

  <main role="main">

    <section class="container py-2 mb-4">
      <div class="row">
        <div class="col-lg-12">
          <table class="table table-striped table-dark table-hover">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Category</th>
              <th>Date</th>
              <th>Author</th>
              <th>Picture</th>
              <th>Comments</th>
              <th>Action</th>
              <th>Delete</th>
              <th>Live Preview</th>
            </tr>
            <?php 
     global $db;
     $sql = "SELECT * FROM post";
     $stmt = $db->query($sql);
     $sr = 0;
     while ($DateRows = $stmt->fetch()) {
       $post_id = $DateRows["post_id"];
       $dateTime = $DateRows["datetime"];
       $post_title = $DateRows["post_title"];
       $post_cat = $DateRows["post_cat"];
       $admin = $DateRows["post_author"];
       $post_img = $DateRows["post_img"];
       $post_content = $DateRows["post_content"];
       $sr++;
     
     ?>
            <tr>
              <td><?php echo $sr; ?></td>
              <td><?php if(strlen($post_title)> 20){
       $post_title = substr($post_title,0,20). '..';
     }  
      echo $post_title; ?></td>
              <td><?php if(strlen($post_cat)> 20){
       $post_title = substr($post_cat,0,20). '..';
     }  
      echo $post_cat; ?></td>
              <td><span class="d-inline-block text-truncate" style="max-width: 100px;">
                  <?php echo $dateTime; ?></span></td>
              <td class="table-primary"><?php echo $admin; ?></td>
              <td><img src="img/<?php echo $post_img; ?>" width="100" alt="pic"></td>
              <td>comments</td>
              <td><a href="#"><span class="btn btn-warning">Edit</span></a></td>
              <td><a href="#"><span class="btn btn-danger">Delete</span></a></td>
              <td><a href="#"><span class="btn btn-primary">Live</span></a></td>
            </tr>
            <?php } ?>
          </table>
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
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
      </script>
      <script src="js/bootstrap.min.js"></script>
      <script>
        window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
      </script>
      

      <script>
        $('#year').text(new Date().getFullYear());
      </script>


</body>


</html>