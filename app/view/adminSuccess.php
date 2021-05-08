<section class="py-0">
  <div class="container-lg">
    <div class="row pt-8">
      <div class="col-lg-6 col-xl-6 col-12">
        <div class="card p-3">
          <div class="card-title"><h3 class="fw-semi-bold">Formations</h3></div>
          <div class="card-body">
            <div class="list-group" id="list-tab" role="tablist">
              <a
                class="list-group-item list-group-item-action"
                data-toggle="list"
                foreach="formations"
                href="#"
              >
                <div class="row justify-content-between align-items-center">
                  <div class="col-3 align-items-center" style="display: flex">
                    <span foreach-value="name" class="me-4 fw-semi-bold"></span>
                    <span foreach-value="date"></span>
                  </div>
                  <div class="col-3" style="display: flex">
                    <button
                      type="button"
                      class="btn btn-outline-success me-2"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Editer"
                      onclick="editFormation(this)"
                    >
                      <i class="fas fa-pencil-alt"></i>
                      <span
                        foreach-value="id"
                        class="edit-id"
                        style="display: none"
                      ></span>
                    </button>
                    <button
                      type="button"
                      class="btn btn-outline-danger"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Supprimer"
                    >
                      <i class="far fa-trash-alt"></i>
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
          <div class="card-title"><h3 class="fw-semi-bold">Collaques</h3></div>
          <div class="card-body">
            <div class="list-group" id="list-tab" role="tablist">
              <a
                class="list-group-item list-group-item-action"
                data-toggle="list"
                foreach="colloquia"
                href="#"
              >
                <div class="row justify-content-between align-items-center">
                  <div class="col-3 align-items-center" style="display: flex">
                    <span foreach-value="name" class="me-4 fw-semi-bold"></span>
                    <span foreach-value="date"></span>
                  </div>
                  <div class="col-3" style="display: flex">
                    <button
                      type="button"
                      class="btn btn-outline-success me-2"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Editer"
                    >
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button
                      type="button"
                      class="btn btn-outline-danger"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Supprimer"
                    >
                      <i class="far fa-trash-alt"></i>
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
