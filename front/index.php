    <div class="pricing-header p-5 pb-md-5 mx-auto text-center">
        <h1 class="display-4 fw-normal">Lorem ipsum dolor</h1>
        <p class="fs-5 text-muted">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ipsum, eius explicabo doloremque dignissimos adipisci? Unde suscipit eaque mollitia quia veniam assumenda animi numquam neque cum beatae. Nemo, sapiente iste!
        </p>
        <p>
            <a href="index.php/login" class="btn btn-primary my-2">Signin</a>
            <a href="index.php/register" class="btn btn-secondary my-2">Signup</a>
        </p>
    </div>
</header>

<main>
    <div class="album py-5 bg-light">
        <div class="container">

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