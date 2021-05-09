var event = document.createEvent("Event");
event.initEvent("loaded", true, true);
$.get(
  "?action=getCurrentUser",
  (response) => {
    if (response.status === 200) {
      if (response.user) {
        $("#admin-link").attr("href", "?action=admin");
        $("#admin-link").text("Espace admin");
        $("#disconnect").css("display", "block");
      } else {
      }
    } else {
    }

    window.dispatchEvent(event);
    $("#top").css("display", "block");
  },
  "json"
);

function disconnect() {
  $.get(
    "?action=disconnect",
    (response) => {
      if (response.status === 200) {
        window.location.href =
          window.location.href.split("?action=")[0] + "?action=home";
      } else {
      }
    },
    "json"
  );
}

var store = {};
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
