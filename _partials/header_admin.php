<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E commerce</title>

    <base href="http://localhost/E-commerce/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/bootstrap.style.min.css">
    <link rel="stylesheet" href="./assets/css/style_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Favicons -->
      <link rel="icon" href="./assets/img/favicon.ico">
      <meta name="theme-color" content="#712cf9">

  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-4 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-8" href="index.php/admin/index">TWO TREES</a>
      <div class="navbar-nav">
        <div class="nav-item text-nowrap">
          <a href="#" class="nav-link px-3">
            <?php if(isset($_SESSION['logged'])){echo $_SESSION['email'];} ?>
          </a>
        </div>
      </div>
    </header>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php/admin/index">
                  <i class="fa-solid fa-house"></i>
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php/admin/products">
                  <i class="fa-solid fa-cart-plus"></i>
                  Produits
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php/admin/users">
                  <i class="fa-solid fa-users-gear"></i>
                  Utilisateurs
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php/admin/admins">
                  <i class="fa-solid fa-lock"></i>
                  Administrateurs
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php/admin/categories">
                  <i class="fa-solid fa-list"></i>
                  Catégories
                </a>
              </li>
              <?php if(isset($_SESSION['logged'])){ ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php/logout">
                  <i class="fa-solid fa-right-from-bracket"></i>
                  Déconnexion
                </a>
              </li>
              <?php } ?>
            </ul>
          </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">