<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Catégories</h1>
</div>

  <a href="index.php/admin/categories/add" class="btn btn-primary mb-3">Ajouter</a>
  <a href="index.php/admin/categories/import" class="btn btn-primary mb-3">Import</a>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Désignation</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($categories as $c){ ?>
        <tr>
            <th scope="row"><?= $c['id'] ?></th>
            <th><?= $c['name'] ?></th>
            <th>
              <a href="index.php/admin/categories/del?id=<?= $c['id'] ?>" class="btn btn-danger text-white"> Supprimer</a>
            </th>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>