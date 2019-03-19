<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Billet simple pour l'Alaska - Jean Forteroche</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <style type="text/css">
    
    a{
      text-decoration: none !important;
      font-weight: normal !important;

    }

  </style>
  <link href="../css/clean-blog.min.css" rel="stylesheet">

  <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=yz1dl2jhkmtb0ke23e6t7hbzz91j56ylmje1ow9b02jsm8ao'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'
  });
  </script>


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <?php
        if(isset($_SESSION['pseudo'])) {
          echo '<a class="nav-link" href="index.php?page=home">Bienvenue'  .  $_SESSION["pseudo"] . '</a>';
        }
      ?>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=subscribe">Inscription</a>
          </li>
          <li class="nav-item">
            <?php
              if(isset($_SESSION['pseudo']) && isset($_SESSION['password'])) {
                echo '<a class="nav-link" href="index.php?page=addArticles">Ajouter un Article</a>';
              }
              else{

                echo '<a class="nav-link" href="index.php?page=connectUser">Connexion</a>';
              } 
            ?>
          </li>
          <li class="nav-item">
             <?php
        if(isset($_SESSION['pseudo']) && isset($_SESSION['password']) && isset($_SESSION['level'])) {
          if($_SESSION['level'] == "2") {
            echo '<a class="nav-link" href="index.php?page=moderation">Admin</a>';
            }
          }
        ?>
          </li>
          <li class="nav-item">
            <?php
              if(isset($_SESSION['pseudo'])) {
                echo '<a class="nav-link" href="index.php?page=deconnexion"><img src="../img/exit.png"/></a>';
              }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Billet simple pour l'Alaska</h1>
            <span class="subheading">Un roman de Jean Forteroche</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <h1>Modifier l'article:</h1>

        <form method="POST" action="index.php?page=updatePost">
           <p> <label for="title">Titre: </label>
            <input type="text" name="title" value="<?=$article['title'] ?>"></p>

            <label for="content">Contenu:</label>
            <textarea id="mytextarea" name="content" value="<?=$article['content'] ?>"></textarea>
            <input type="submit">

        </form>

        <a href="index.php?page=deconnexion"><em>Déconnexion</em></a>
      
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script>

</body>

</html>
