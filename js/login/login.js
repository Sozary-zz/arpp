// 1ere étape, j'envoie une demande au serveur avec les identifiants/mot de passe pour savoir si ils sont correct

// 2eme étape, le serveur me renvois oui, ou non

// 3eme étape, si la réponse est non, on affiche le message d'erreur

// 3eme étape bis, si la réponse est oui, on affiche le message de succès, et on redirige 2 secondes après

$("#login-form").submit(() => {
  let login = $("#login").val();
  let password = $("#password").val();
  $("#error-connect").css("display", "none");
  $.post(
    "?action=connect",
    { login, password },
    (response) => {
      if (response.status === 200) {
        if (response.user) {
          $("#success-connect").css("display", "block");
          setTimeout(() => {
            window.location.href =
              window.location.href.split("?action=")[0] + "?action=admin";
          }, 2000);
        } else {
          $("#error-connect").css("display", "block");
        }
      } else {
        $("#error-connect").css("display", "block");
      }
    },
    "json"
  );
  return false;
});
