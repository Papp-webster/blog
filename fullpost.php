<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/sessions.php"); ?>
<?php $idForm = $_GET["id"]; ?>

<?php
 if(isset($_POST["comsend"])) {

$name = $_POST["commentName"];
$email = $_POST["commentEmail"];
$comment = $_POST["commentWrite"];
date_default_timezone_set("Europe/Budapest");
$currentTime = time();
$dateTime = strftime("%Y.%m.%d %H:%M", $currentTime);

if(empty($name) || empty($email) || empty($comment)) {
  $_SESSION['error'] = "all fields must be filled out!";
  redirect("fullpost.php?id={$idForm}");
} elseif(strlen($comment) > 500) {
  $_SESSION['error'] = "Your comment less than 500 karakter!";
  redirect("fullpost.php?id={$idForm}");
} else {

  global $db;
  
  $sql = "INSERT INTO comments(datetime, name, email, comment, approved, status, poszt_id) VALUES(:datetime, :name, :email, :comment, 'pending', 'off', :idFromUrl)";
  $stmt = $db->prepare($sql);

  $stmt->bindValue(':datetime', $dateTime);
  $stmt->bindValue(':name', $name);
  $stmt->bindValue(':email', $email);
  $stmt->bindValue(':comment', $comment);
  $stmt->bindValue(':idFromUrl', $idForm);
  $Execute=$stmt->execute();
   
  if($Execute){
    $_SESSION['success'] = "Comment submitted!";
    redirect("fullpost.php?id={$idForm}");
  } else {
    $_SESSION['error'] = "Something went wrong! Try again!";
    redirect("fullpost.php?id={$idForm}");
  }
}

}// comment button end!


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>blog page</title>
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
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="post.php">post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
          </ul>

          <ul class="navbar-nav ml-auto">
            <form class="example" action="index.php">

              <input type="text" placeholder="Search.." name="search">
              <button type="submit" name="searchbutton"><i class="fa fa-search"></i></button>
            </form>
          </ul>

        </div>
      </div>
    </nav>
  </div>
  <!-- NAVBAR END-->

  <!-- Main -->
  <div class="container">
    <div class="row mt-4">

      <div class="col-sm-8">
        <h1>This the Blog</h1>
        <h1 class="lead">Design by Papp László</h1>
        <?php echo message();   echo Successmessage(); ?>

        <?php
        global $db;
        if (isset($_GET["searchbutton"])) {
          $search = $_GET["search"];
          $sql = "SELECT * FROM post WHERE datetime LIKE :search OR post_title LIKE :search OR post_cat LIKE :search OR post_content LIKE :search";
          $stmt = $db->prepare($sql);
          $stmt->bindValue(':search', '%' . $search . '%');
          $stmt->execute();
        } else {
          $id = $_GET["id"];
          if (!isset($id)) {
            $_SESSION['error'] = "Nincs ilyen poszt!!";
            redirect("index.php");
          }
          $sql = "SELECT * FROM post WHERE post_id='$id'";
          $stmt = $db->query($sql);
        }


        while ($Rows = $stmt->fetch()) {
          $post_id = $Rows['post_id'];
          $datetime = $Rows['datetime'];
          $post_title = $Rows['post_title'];
          $post_cat = $Rows['post_cat'];
          $post_author = $Rows['post_author'];
          $post_img = $Rows['post_img'];
          $post_content = $Rows['post_content'];




        ?>
        <div class="card">
          <img src="img/<?php echo $post_img; ?>" style="max-height:450px; width:400px;" class="img-fluid card-img-top"
            alt="pic">
          <div class="card-body">
            <h4 class="card-title"><?php echo htmlentities($post_title); ?></h4>
            <small class="text-muted">Szerző: <?php echo htmlentities($post_author); ?> <i class="fa fa-clock-o"></i>
              <?php echo htmlentities($datetime); ?></small>
            <span style="float:right;" class="badge badge-dark text-light">Comments 13</span>
            <hr>
            <p class="card-text"><?php echo htmlentities($post_content); ?></p>
          </div>
        </div>
        <?php } ?>
        <!-- Fetching comment  -->
        <span class="fieldinfo mb-4"> Comments <i class="fa fa-comment"></i></span>
        <?php 
        global $db; 
        $sql = "SELECT * FROM comments WHERE poszt_id='$idForm' AND status='on'";
        $stmt = $db->query($sql);
        while($Rows = $stmt->fetch()) {
          $Commentdate = $Rows['datetime'];
          $Commentname = $Rows['name'];
          $Comment = $Rows['comment'];
        
        
        ?>
        <!-- comment show -->
        <div>
          <div class="media comment-block">
            <img class="d-block img-fluid" src="img/comment.png" width="80" alt="commenter">
            <div class="media-body ml-2">
              <h5 class="lead"><?php echo $Commentname; ?></h5>
              <p class="small"><?php echo $Commentdate; ?></p>
              <p><?php echo $Comment; ?></p>
            </div>
          </div>
        </div>

        <hr>

        <?php } ?>
        <!-- comment area -->
        <div class="comment-area mb-4">
          <form class="" action="fullpost.php?id=<?php echo $idForm; ?>" method="post">
            <div class="card mt-3">
              <div class="card-header">
                <h5 class="fieldinfo">Comment section</h5>
                <div class="card-body">
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                      </div>
                      <input class="form-control" type="text" name="commentName" placeholder="Name" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                      </div>
                      <input class="form-control" type="email" name="commentEmail" placeholder="Email" value="">
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea name="commentWrite" class="form-control" cols="80" rows="6"></textarea>
                  </div>
                  <div>
                    <button type="submit" name="comsend" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <!-- Side area -->
      <div class="col-sm-4">
        <h3>Ez itt a reklám helye!</h3>
        <img class="img-fluid" src="img/rek.jpg" alt="adv">
      </div>

    </div>

  </div> <!-- main area end-->

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