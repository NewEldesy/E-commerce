<div class="album py-5 bg-light">
    <div class="container">
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col-lg-4">
                <img src="./uploads/<?= $product['filename'];?>" class="card-img-top">
            </div>
            <div class="col-lg-8">
                <h1><?= $product['name'];?><a href="index.php/panier/add?id=<?= $product['id'];?>" class="btn btn-primary m-3 text-white">Ajouter au panier</a></h1>

                <p><?= $product['price'];?>€</p>

                <p><?= $product['description'];?></p>
            </div>
        </div>
    </div>
</div>