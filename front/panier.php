<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col-lg-12">
                <h1>Panier</h1>
                <a href="/E-commerce/index.php/panier/checkout" class="btn btn-primary">Valider mon panier</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Qté</th>
                            <th scope="col">Désignation</th>
                            <th scope="col">Prix unitaire</th>
                            <th scope="col">Sous-total</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php if(isset($_SESSION['cart'])) {?>
                            <?php foreach($_SESSION['cart'] as $key => $p) { if ($p['quantity'] <= 0) continue; ?>
                        <tr>
                            <td><?= htmlspecialchars($p['quantity']);?></td>
                            <td><?= htmlspecialchars($p['name']);?></td>
                            <td><?= number_format($p['price'], 2);?> €</td>
                            <td><?= number_format($p['quantity'] * $p['price'], 2);?> €</td>
                            <td><a href="/E-commerce/index.php/panier/del?id=<?= (int)$key;?>" class="btn btn-danger text-white">Supprimer</a></td>
                        </tr>
                            <?php $total += $p['quantity'] * $p['price'];?>
                            <?php }?>
                        <?php }?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total :</th>
                            <th><?= number_format($total, 2); ?> €</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>