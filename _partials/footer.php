<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-12 col-md">
        TWO TREES
        <small class="d-block mb-3 text-muted">&copy; 2023</small>
      </div>
      <div class="col-4 col-md">
        <h5>Menu</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="index.php/panier">Home</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="index.php/panier">Panier</a></li>
        </ul>
      </div>
      <div class="col-4 col-md">
        <h5>Catégories</h5>
        <ul class="list-unstyled text-small" id="cat">
          <?php 
          $categories = get_categories();
          foreach($categories as $hc){ ?>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="index.php/products?id=<?= $hc['id'];?>"><?= $hc['name'];?></a></li>
          <?php } ?>
        </ul>
      </div>
      <?php if(!isset($_SESSION['logged'])){ ?>
      <div class="col-4 col-md">
        <h5>Sign</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="index.php/login">Connexion</a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="index.php/register">Créer un compte</a></li>
        </ul>
      </div>
      <?php } ?>
    </div>
  </footer>