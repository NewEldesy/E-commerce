<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TWO TREES</title>

    <base href="http://localhost/E-commerce/">

    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/bootstrap.style.min.css">
    <link rel="stylesheet" href="./assets/css/style_front.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Favicons -->
      <link rel="icon" href="./assets/img/favicon.ico">
      <meta name="theme-color" content="#712cf9">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

  </head>
  <body>
    <div class="container py-3">
      <header>
        <div class="d-flex align-items-center text-dark text-decoration-none p-2">
          <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
            <span class="fs-4">TWO TREES</span>
          </a>

          <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
            <a class="me-3 py-2 text-dark text-decoration-none" href="#cat">Catégories</a>
            <?php if(!isset($_SESSION['logged'])){ ?>
            <a class="me-3 py-2 text-dark text-decoration-none" href="index.php/login">Connexion</a>
            <a class="me-3 py-2 text-dark text-decoration-none" href="index.php/register">Créer un compte</a>
            <?php } ?>
            <a class="me-3 py-2 text-dark text-decoration-none" href="index.php/panier">Panier</a>
            <?php if(isset($_SESSION['logged'])){ ?>
            <a class="py-2 text-dark text-decoration-none" href="index.php/logout">
              <i class="fa-solid fa-right-from-bracket"></i>
            </a>
            <?php } ?>
          </nav>
        </div>