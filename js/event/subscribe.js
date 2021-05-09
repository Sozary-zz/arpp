window.addEventListener("loaded", () => {
  replaceVal();
});

$("#subscribe-form").submit(() => {
  let name = $("#name").val();
  let email = $("#email").val();
  $("#error-subscribe").css("display", "none");
  $.post(
    "?action=subscribeToEvent",
    {
      name,
      email,
      type: payload.type,
      event_id: payload.event_id,
      id: payload.id,
    },
    (response) => {
      if (response.status === 200) {
        $("#success-subscribe").css("display", "block");
        setTimeout(() => {
          window.location.href =
            window.location.href.split("?action=")[0] + "?action=home";
        }, 2000);
      } else {
        $("#error-subscribe").css("display", "block");
      }
    },
    "json"
  );
  return false;
});
