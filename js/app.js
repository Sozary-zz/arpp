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
