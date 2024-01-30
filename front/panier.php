<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col-lg-12">
                <h1>Panier</h1>
                <a href="" class="btn btn-primary">Valider mon panier</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Qté</th>
                            <th scope="col">Désignation</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php if(isset($_SESSION['cart'])) {?>
                            <?php foreach($_SESSION['cart'] as $key => $p) {?>
                        <tr>
                            <th scope="row"><?= $p['quantity'];?></th>
                            <th><?= $p['name'];?></th>
                            <th><a href="./index.php/panier/del?id=<?= $key;?>" class="btn btn-danger text-white"> Supprimer</a></th>
                        </tr>
                            <?php $total = $total + $p['quantity'] * 10;?>
                            <?php }?>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>