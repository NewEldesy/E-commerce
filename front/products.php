<div class="album py-5 bg-light">
    <div class="container">
        
        <?php
            $cat = get_categories_by_id($_GET['id']);
        ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <h1><?= $cat['name'];?></h1>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            

            <?php
                foreach($products as $p){
            ?>
            <div class="col">
                <div class="card shadow-sm">
                    <img class="card-img-top" src="./uploads/<?= $p['filename'];?>">

                    <div class="card-body">
                        <p><?= $p['name'];?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="index.php/product?id=<?= $p['id'];?>" class="btn btn-sm btn-outline-secondary">Voir</a>
                            </div>
                            <small class="text-muted"><?= $p['price'];?>€</small>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>