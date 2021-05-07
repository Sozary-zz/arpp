<section class="py-0" id="contact">
    <div class="bg-holder"
        style="background-image:url(images/how-it-works.png);background-position:center bottom;background-size:cover;">
    </div>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-9 col-xl-5 text-center pt-8">
                <h5 class="fw-bold fs-3 fs-xxl-5 lh-sm mb-3 text-white">Se connecter</h5>
            </div>

            <div class="col-sm-9 col-md-12 col-xxl-9">
                <form id="login-form">
                    <!-- Identification début du formulaire  -->
                    <div class="form-group mb-4">
                        <label for="login" class="text-white">Identifiant</label>
                        <input type="text" id="login" placeholder="Entrez votre identifiant" class="form-control">
                    </div>
                    <!-- Partie du formulaire où on renseigne le mot de passe -->
                    <div class="form-group mb-4">
                        <label for="password" class="text-white">Mot de passe</label>
                        <input type="password" id="password" placeholder="Entrez votre mot de passe" class="form-control">
                    </div>
                    <!-- Message d'erreur en cas d'échec de connexion -->
                    <div class="alert alert-danger" role="alert" style="display: none;" id="error-connect">
                        Votre identifiant ou mot de passe est incorrect. Veuillez réessayer
                    </div>
                    <div class="alert alert-success" role="alert" style="display: none;" id="success-connect">
                        Vous êtes connecté
                    </div>
                    <!-- Bouton de connexion -->
                    <div class="form-group mb-4 text-center">
                        <button class="btn btn-lg btn-dark bg-gradient order-0" type="submit">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="js/login/login.js"></script>
