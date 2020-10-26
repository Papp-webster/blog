<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/sessions.php"); ?>
<?php

$updateId = $_GET['id'];
if (isset($_POST['send'])) {

  $post_title = $_POST['post_title'];
  $category = $_POST['category'];
  $post_img = $_FILES['image']['name'];
  $location = "img/" . basename($_FILES['image']['name']);
  $post_desc = $_POST['postdesc'];
  $admin = "Zoe";

  date_default_timezone_set("Europe/Budapest");
  $currentTime = time();
  $dateTime = strftime("%Y.%m.%d %H:%M", $currentTime);




  if (empty($post_title)) {
    $_SESSION['error'] = "title must be filled out!";
    redirect("edit.php");
  } elseif (strlen($post_title) < 5) {
    $_SESSION['error'] = "You have less than 5 karakter!";
    redirect("edit.php");
  } elseif (strlen($post_desc) > 9999) {

    $_SESSION['error'] = "You have two much karater more than(1000)!";
    redirect("edit.php");
  } else {
    global $db;
    if (!empty($_FILES['image']['name'])) {
      $sql = "UPDATE post SET post_title ='$post_title', post_cat ='$category', post_img='$post_img', post_content='$post_desc' WHERE post_id='$updateId'";
    } else {
      $sql = "UPDATE post SET post_title ='$post_title', post_cat ='$category', post_content='$post_desc' WHERE post_id='$updateId'";
    }

    

    
    $runSql = $db->query($sql);
    
    move_uploaded_file($_FILES['image']['tmp_name'], $location);

    if ($runSql) {
      $_SESSION['success'] = "Post updated!!";
      redirect("posts.php");
    } else {
      $_SESSION['error'] = "Something went wrong! Try again!";
      redirect("posts.php");
    }
  }
} // submit button end!


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit</title>
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
          <h1><i class="fa fa-edit" style="color:#26aae1"></i> Edit Post</h1>
        </div>

      </div>

    </div>

  </header>

  <!-- NAVBAR END-->

  <main role="main">



    <section class="container py-2 mb-4">
      <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
          <?php echo message();
          echo Successmessage();
          global $db;
          $sql = "SELECT * FROM post WHERE post_id='$updateId'";
          $stmt = $db->query($sql);
          while ($DateRow = $stmt->fetch()) {
            $titleUpdate = $DateRow['post_title'];
            $catUpdate = $DateRow['post_cat'];
            $imgUpdate = $DateRow['post_img'];
            $postUpdate = $DateRow['post_content'];
          }
          ?>

          <form action="edit.php?id=<?php echo $updateId; ?>" method="post" enctype="multipart/form-data">
            <div class="card bg-secondary text-light mb-3">

              <div class="card-body bg-dark">
                <div class="form-group">
                  <label for="title"><span class="fieldinfo"> Post Title: </span></label>
                  <input type="text" name="post_title" id="title" placeholder="Írd be a címet.." value="<?php echo $titleUpdate ?>">
                </div>

                <div class="form-group">
                  <span class="fieldinfo">Current Category:</span>
                  <?php echo $catUpdate; ?>
                  <br>
                  <label for="cat-title"><span class="fieldinfo"> Choose Category:</span></label>
                  <select name="category" id="cat-title" class="form-control" name="category">
                    <?php
                    global $db;
                    $sql = "SELECT * FROM category";
                    $stmt = $db->query($sql);
                    while ($DateRow = $stmt->fetch()) {
                      $id = $DateRow["cat_id"];
                      $category_title = $DateRow["cat_title"];

                    ?>

                      <option> <?php echo $category_title; ?></option>
                    <?php } ?>
                  </select>
                </div>


                <div class="form-group">
                  <span class="fieldinfo">Current Image:</span>
                  <br>
                  <img src="img/<?php echo $imgUpdate; ?>" width="150">
                  <br>
                  <div class="custom-file mt-2">
                    <input class="custom-file-input" type="File" name="image" id="imageSelect" value="">
                    <label for="imageSelect" class="custom-file-label">Select image</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="post"><span class="fieldinfo"> Post:</span></label>
                  <textarea class="form-control" id="post" name="postdesc" id="" cols="30" rows="10"><?php echo $postUpdate; ?></textarea>

                </div>


                <div class="row">
                  <div class="col-lg-6 mb-2">
                    <a href="dashboard.php" class="btn btn-warning btn-block"><i class="fa fa-arrow-left"></i> Back to
                      dashboard </a>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <button type="submit" name="send" class="btn btn-success btn-block"><i class="fa fa-check"></i>
                      Publish </button>
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
  <div class="line">
    <div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
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