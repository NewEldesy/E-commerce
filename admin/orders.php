<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Commandes</h1>
</div>

<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Client</th>
        <th scope="col">Produits</th>
        <th scope="col">Total</th>
        <th scope="col">Statut</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $o) { ?>
      <tr>
        <th scope="row"><?= (int) $o['id'] ?></th>
        <td><?= htmlspecialchars($o['email']) ?></td>
        <td><?= htmlspecialchars($o['products']) ?></td>
        <td><?= number_format($o['total'], 2) ?> €</td>
        <td><span class="badge bg-<?= $o['statut'] === 'pending' ? 'warning' : 'success' ?>"><?= htmlspecialchars($o['statut']) ?></span></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
