window.addEventListener("loaded", () => {
  replaceVal();
});
function replaceVal() {
  $("*[jtext]").each((index, item) => {
    try {
      let variable = eval($(item).attr("jtext"));
      $(item).text(variable);
    } catch (e) {
      $(item).text("{{" + $(item).attr("jtext") + "}}");
    }
  });
  $("*[jvalue]").each((index, item) => {
    try {
      let variable = eval($(item).attr("jvalue"));
      $(item).val(variable);
    } catch (e) {
      $(item).val("{{" + $(item).attr("jvalue") + "}}");
    }
  });
}

function update() {
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
