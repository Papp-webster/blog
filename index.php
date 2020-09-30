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
  <div class="container">
    <div class="row mt-4">

      <div class="col-sm-8">
        <h1>This the blog</h1>
        <h1 class="lead">Design by Papp László</h1>
      </div>

    </div>

  </div>
  <!-- NAVBAR END-->

  <main role="main">

    <section class="jumbotron text-center">
      <div class="container">

        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
          etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
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