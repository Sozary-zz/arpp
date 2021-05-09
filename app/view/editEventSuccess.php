<section class="py-0">
  <div class="container-lg">
    <div class="row pt-8">
      <div class="col-lg-6 col-xl-6 col-12">
        <div class="card p-3">
          <div class="card-title"><h3 class="fw-semi-bold">Edition de: </h3><h3 class="fw-semi-bold" jtext="payload.name"></h3></div>
          <div class="card-body">
             <div class="col-sm-9 col-md-12 col-xxl-9">
                <div class="form-group mb-4">
                    <label for="name">Nom</label>
                    <input type="text" id="name" placeholder="Entrez votre nom" class="form-control" jvalue="payload.name">
                </div>
                <div class="form-group mb-4">
                    <label for="name">Nombre de places maximum</label>
                    <input type="number" id="max-places" placeholder="Entre le nombre de places maximum" class="form-control" jvalue="payload.max_places">
                </div>
                <div class="form-group mb-4">
                    <label for="name">Date de l'événement</label>
                    <input class="form-control" type="date" jvalue="payload.date" id="date">
                </div>
                 <div class="alert alert-warning" role="alert" style="display: none;" id="success-loading">
                    Mise à jour des données en cours...
                </div>
                 <div class="alert alert-success" role="alert" style="display: none;" id="success-updated">
                    Données mise à jour!
                </div>
                 <div class="alert alert-danger" role="alert" style="display: none;" id="error-updated">
                    Impossible de mettre les données à jour
                </div>
                <div class="form-group mb-4 text-center">
                    <button class="btn btn-lg btn-dark bg-gradient order-0" onclick="update()">Mettre à jour</button>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
    var payload = JSON.parse('<?=$context->payload;?>')
</script>

<script src="js/event/edit.js"></script>
