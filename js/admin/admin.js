window.addEventListener("loaded", () => {
  Promise.all([getFormations(), getColloquia()]).then((data) => {
    store["formations"] = data[0];
    store["colloquia"] = data[1];
    foreachGenerator();
    $(() => {
      $('[data-toggle="tooltip"]').tooltip();
    });
  });
});

function foreachGenerator() {
  $("*[foreach]").each((index, item) => {
    let variable = $(item).attr("foreach");
    let html = $(item).get();
    let parent = $(item).parent();

    if (variable in store) {
      variable = store[variable];
      variable.forEach((elem, index) => {
        let toInsert = $(html).clone();
        $(toInsert)
          .find("*[foreach-value]")
          .each((index, placeToInsertValue) => {
            let valueToInsert = $(placeToInsertValue).attr("foreach-value");
            if (typeof elem == "object") {
              if (valueToInsert in elem) {
                $(placeToInsertValue).text(elem[valueToInsert]);
              }
            } else if (typeof elem == "string") {
              $(placeToInsertValue).text(elem);
            }
          });
        $(parent).append(toInsert);
      });
    }
    $(html).remove();
  });
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
