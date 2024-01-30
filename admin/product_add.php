<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ajouter un produit</h1>
</div>

    <div class="col-lg-12">
        <form action="" name="product" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name">
            </div>
            <br>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" name="description">
            </div>
            <br>
            <div class="form-group">
                <label for="price">Prix</label>
                <input type="number" class="form-control" name="price">
            </div>
            <br>
            <div class="form-group">
                <label for="file">Fichier</label>
                <input type="file" class="form-control" name="file">
            </div>
            <br>
            <div class="form-group">
                <label for="category">Catégories</label>
                category
                <select name="category" class="form-control">
                    <?php foreach($categories as $c){
                        echo "<option value=". $c['id'] .">". $c['name'] ."</option>";
                    }
                    ?>
                </select>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>