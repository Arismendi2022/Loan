
$('.login-content [data-toggle="flip"]').click(function() {
  $('.login-box').toggleClass('flipped');
  return false;
});

document.addEventListener('DOMContentLoaded', function() {
  if (document.querySelector("#formLogin")) {

    let formLogin = document.querySelector("#formLogin");
    formLogin.onsubmit = function (e) {
      e.preventDefault();

      const strEmail = document.querySelector('#txtEmail').value;
      const strPassword = document.querySelector('#txtPassword').value;

      if (strEmail === "" || strPassword === "") {
        alerta("Por favor!", "Escribe usuario y contraseña.", "error");
        return false;
      } else {
        const request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        const ajaxUrl = base_url + '/Login/loginUser';
        const formData = new FormData(formLogin);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
          if (request.readyState !== 4) return;
          if (request.status === 200) {
            const objData = JSON.parse(request.responseText);
            if (objData.status) {
              window.location = base_url + '/dashboard';
            } else {
              alerta("Atención!", objData.msg, "error");
              document.querySelector('#txtPassword').value = "";
            }
          } else {
            swal.fire("Atención!", "Error en el proceso", "error");
          }
          return false;
        }
      }
    }
  }
}, false);