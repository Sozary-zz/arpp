window.addEventListener("loaded", () => {
  replaceVal();
});

function update() {
  $("#update").css("disabled", "true");
  $("#success-updated").css("display", "none");
  $("#error-updated").css("display", "none");
  let max_places = $("#max-places").val();
  let name = $("#name").val();
  let date = $("#date").val();
  let type = payload.type;
  let id = payload.id;
  $("#success-loading").css("display", "block");
  $.post(
    "?action=updateEvent",
    { id, type, name, max_places, date },
    (response) => {
      $("#update").css("disabled", "false");
      $("#success-loading").css("display", "none");
      if (response.status === 200) {
        $("#success-updated").css("display", "block");
      } else {
        $("#error-updated").css("display", "block");
      }
    },
    "json"
  );
}
