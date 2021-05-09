<section class="py-0">
  <div class="container-lg">
    <div class="row pt-8">
      <div class="col-lg-6 col-xl-6 col-12">
        <div class="card p-3 mb-3">
          <div class="card-title">
            <h3 class="fw-semi-bold">Formations</h3>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-outline-success me-2 mb-3" onclick="addEvent('formation')">Ajouter une
              formation</button>
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action" data-toggle="list" foreach="formations" href="#">
                <div class="row justify-content-between align-items-center">
                  <div class="col-12 align-items-center col-md-3 col-lg-3 col-xl-3" style="display: flex">
                    <span foreach-value="name" class="me-4 fw-semi-bold"></span>
                    <span foreach-value="date"  class="me-4 "></span>
                    <img src="images/user.svg" width="16"/>
                    <span foreach-value="availablePlaces"></span>
                  </div>
                  <div class="col-12 col-md-3 col-lg-3 col-xl-3" style="display: flex">
                    <button type="button" class="btn btn-outline-success me-2" data-toggle="tooltip"
                      data-placement="top" title="Editer" onclick="editFormation(this)">
                      <i class="fas fa-pencil-alt"></i>
                      <span foreach-value="id" class="edit-id" style="display: none"></span>
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top"
                      title="Supprimer" onclick="deleteEvent(this, 'formation')">
                      <i class="far fa-trash-alt"></i>
                      <span foreach-value="id" class="edit-id" style="display: none"></span>
                    </button>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-xl-6 col-12">
        <div class="card p-3">
          <div class="card-title">
            <h3 class="fw-semi-bold">Collaques</h3>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-outline-success me-2 mb-3" onclick="addEvent('colloquium')">Ajouter une
              collaque</button>
            <div class="list-group" id="list-tab" role="tablist">
              <a class="list-group-item list-group-item-action" data-toggle="list" foreach="colloquia" href="#">
                <div class="row justify-content-between align-items-center">
                  <div class="col-12 align-items-center col-md-3 col-lg-3 col-xl-3" style="display: flex">
                    <span foreach-value="name" class="me-4 fw-semi-bold"></span>
                    <span foreach-value="date"  class="me-4 "></span>
                    <img src="images/user.svg" width="16"/>
                    <span foreach-value="availablePlaces"></span>
                  </div>
                  <div class="col-12 col-md-3 col-lg-3 col-xl-3" style="display: flex">
                    <button type="button" class="btn btn-outline-success me-2" data-toggle="tooltip"
                      data-placement="top" title="Editer" onclick="editColloquium(this)">
                      <i class="fas fa-pencil-alt"></i>
                      <span foreach-value="id" class="edit-id" style="display: none"></span>
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="top"
                      title="Supprimer" onclick="deleteEvent(this,'colloquium')">
                      <i class="far fa-trash-alt"></i>
                      <span foreach-value="id" class="edit-id" style="display: none"></span>
                    </button>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="js/admin/admin.js"></script>
