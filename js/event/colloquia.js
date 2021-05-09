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
  getColloquia().then((colloquia) => {
    store["colloquia"] = colloquia.map((f) => {
      let availablePlaces = f.max_places - f.booked_places;
      return { ...f, availablePlaces };
    });
    foreachGenerator();
    $("*[foreach]").each((i, e) => {
      $(e).css("display", "block");
    });
  });
}

function subscribe(elem) {
  let id = $(elem).find(".subscribe-id").text();
  let checkPlaces = parseInt($(elem).find(".available-places").text());
  if (checkPlaces > 0) {
    window.location.href =
      window.location.href.split("?action=")[0] +
      "?action=subscribe&type=colloquium&id=" +
      id;
  } else {
    alert("Plus de places pour cet événement!");
  }
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
