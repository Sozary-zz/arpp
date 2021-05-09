<section class="py-0" id="subscribe">
    <div class="bg-holder"
        style="background-image:url(images/how-it-works.png);background-position:center bottom;background-size:cover;">
    </div>
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-9 col-xl-5 text-center pt-8">
                <h5 class="fw-bold fs-3 fs-xxl-5 lh-sm mb-3 text-white">S'inscrire à l'événement: <span jtext="payload.name"></span></h5>
            </div>

            <div class="col-sm-9 col-md-12 col-xxl-9">
                <form id="subscribe-form">
                    <div class="form-group mb-4">
                        <label for="name" class="text-white">Nom complet</label>
                        <input type="text" id="name" placeholder="Entrez votre nom complet" class="form-control">
                    </div>
                    <div class="form-group mb-4">
                        <label for="email" class="text-white">Email</label>
                        <input type="email" id="email" placeholder="Entrez votre email" class="form-control">
                    </div>
                    <div class="alert alert-danger" role="alert" style="display: none;" id="error-subscribe">
                        Impossible de s'inscrire à cet événement. Quelqu'un a peut-être été plus rapide!
                    </div>
                    <div class="alert alert-success" role="alert" style="display: none;" id="success-subscribe">
                        Vous vous êtes inscrit à l'événement!
                    </div>
                    <div class="form-group mb-4 text-center">
                        <button class="btn btn-lg btn-dark bg-gradient order-0" type="submit">S'inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    var payload = JSON.parse('<?=$context->payload;?>')
</script>

<script src="js/event/subscribe.js"></script>
