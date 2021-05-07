function sendMessage() {
  $.post(
    "?action=sendMessage",
    { content: $("#content").val() },
    (data) => {
      if (data.status === 200) {
        $("#mail-sent-alert").css("display", "block");
      }
    },
    "json"
  );
}

window.addEventListener("loaded", () => {
  setTimeout(() => {
    let splitted = window.location.href.split("?action=home#")[1];
    if (["contact", "who", "header"].includes(splitted)) {
      $([document.documentElement, document.body]).animate(
        {
          scrollTop: $("#" + splitted).offset().top,
        },
        200
      );
    }
  }, 200);
});
