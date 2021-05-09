window.addEventListener("loaded", () => {
  render();
  $(() => {
    $('[data-toggle="tooltip"]').tooltip();
  });
});

function render() {
  $("*[foreach]").each((i, e) => {
    $(e).css("display", "none");
  });
  Promise.all([getFormations(), getColloquia()]).then((data) => {
    store["formations"] = data[0].map((f) => {
      let availablePlaces = f.max_places - f.booked_places;
      return { ...f, availablePlaces };
    });
    store["colloquia"] = data[1].map((f) => {
      let availablePlaces = f.max_places - f.booked_places;
      return { ...f, availablePlaces };
    });
    foreachGenerator();
    $("*[foreach]").each((i, e) => {
      $(e).css("display", "block");
    });
  });
}

function deleteEvent(elem, type) {
  let id = $(elem).find(".edit-id").text();
  $(elem)
    .parent()
    .find("button")
    .each((i, e) => {
      $(e).attr("disabled", "true");
    });
  $.post(
    "?action=deleteEvent",
    { type, id },
    (response) => {
      if (response.status === 200) {
        window.location.reload();
      } else {
        alert("Impossible de supprimer cet événement");
      }
    },
    "json"
  );
}

function addEvent(type) {
  window.location.href =
    window.location.href.split("?action=")[0] +
    "?action=editEvent&type=" +
    type;
}

function editFormation(elem) {
  let formationId = $(elem).find(".edit-id").text();
  window.location.href =
    window.location.href.split("?action=")[0] +
    "?action=editEvent&type=formation&id=" +
    formationId;
}

function editColloquium(elem) {
  let colloquiumId = $(elem).find(".edit-id").text();
  window.location.href =
    window.location.href.split("?action=")[0] +
    "?action=editEvent&type=colloquium&id=" +
    colloquiumId;
}

function getFormations() {
  return new Promise((resolve, reject) => {
    $.get(
      "?action=getFormations",
      (response) => {
        if (response.status === 200) {
          resolve(response.formations);
        } else {
          reject();
        }
      },
      "json"
    );
  });
}

function getColloquia() {
  return new Promise((resolve, reject) => {
    $.get(
      "?action=getColloquia",
      (response) => {
        if (response.status === 200) {
          resolve(response.colloquia);
        } else {
          reject();
        }
      },
      "json"
    );
  });
}
