<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ajouter un utilisateur</h1>
</div>

    <div class="col-lg-12">
        <form action="" name="user" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="exemple@mail.com">
            </div>
            <br>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
            </div>
            <br>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="admin" id="admin">
                <label class="form-check-label" for="admin">Est admin ?</label>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>