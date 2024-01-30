<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Utilisateurs</h1>
</div>

  <a href="index.php/admin/users/add" class="btn btn-primary mb-3">Ajouter</a>
  <a href="index.php/admin/users/import" class="btn btn-primary mb-3">Import</a>
  <div class="table-responsive">
    <table class="table table-striped table-sm ">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $u){ ?>
        <tr>
            <th scope="row"><?= $u['id'] ?></th>
            <td><?= $u['email'] ?></td>
            <td>
              <a href="index.php/admin/users/del?id=<?= $u['id'] ?>" class="btn btn-danger text-white"> Supprimer</a>
            </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>