<section class="py-0">
  <div class="container-lg">
    <div class="row pt-8">
      <div class="col-lg-6 col-xl-6 col-12">
        <div class="card p-3">
          <div class="card-title"><h3 class="fw-semi-bold">Formations</h3></div>
          <div class="card-body">
             <div class="col-sm-9 col-md-12 col-xxl-9">
                <div class="form-group mb-4">
                    <label for="name" class="text-white">Nom</label>
                    <input type="text" id="name" placeholder="Entrez votre nom" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="name" class="text-white">Email</label>
                    <input type="email" id="email" placeholder="Entrez votre email" class="form-control">
                </div>
                <div class="form-group mb-4">
                    <label for="name" class="text-white">Message</label>
                    <textarea id="content" placeholder="Votre message" class="form-control mb-5"></textarea>
                </div>
                <div class="alert alert-success" role="alert" style="display: none;" id="mail-sent-alert">
                    Message envoyé!
                </div>
                <div class="form-group mb-4 text-center">
                    <button class="btn btn-lg btn-dark bg-gradient order-0" onclick="sendMessage()">Envoyer mon
                        message</button>
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
